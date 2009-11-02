<?php
class Diary extends Controller 
{
  public function Diary()
  {
    parent::Controller();
    $this->load->helper(array('html','form','url','asset'));
  }
  public function index()
  {
    if(empty($this->session->userdata['admin'])) {
      $this->login_require();
    } else {
      $this->diary_list();
    }
  }
  public function login_require()
  {
    $this->load->view('main/admin',array('title'=>'diary','header'=>'diary'));
  }
  public function login()
  {
    $this->load->library('hash');
    if(!empty($_POST)) {
      $password_hash = $this->hash->convert(array($_POST['password'],$_POST['alias']));

      $query = $this->db->get_where('play_admin',array('alias'=>$_POST['alias']));
      $query = $query->result();
      $admin = $query[0];

      if($admin->password_hash == $password_hash) {
        $this->session->set_userdata('admin',$admin->id);
        $this->index();
      } else {
        $this->error();
      }
    } else {
      $this->error();
    }
  }
  public function diary_list()
  {
    $this->load->helper(array('asset','playmarkdown'));
    $diaries = $this->get_diaries(20);
    $this->load->model('diarytagmodel','tag');
    $this->load->view('diary/list',array('diaries'=>$diaries));
  }
  public function write()
  {
    $this->load->view('diary/write');
  }
  public function view()
  {
    if(!empty($_POST)) {
      var_dump($_POST); 
    }
  }
  public function logout()
  {
    $this->session->unset_userdata('admin'); 
    redirect('/diary');
  }
  public function create()
  {
    $admin = $this->session->userdata['admin'];
    $this->load->helper('date');
    $content = array('body' =>$_POST['body'],'admin_id' => $admin);
    $posting = $this->create_diary($content,now());
    $tag = $this->create_diary_tag($_POST['tag'],$posting[0]->id);

    if($posting && $tag) {
      redirect('/diary'); 
    } else {
      echo 'error';
    }
  }
  public function create_diary($post,$diary)
  {
    if($this->db->insert('play_diary',$post)) {
      $this->db->select('id');
      $query = $this->db->get_where('play_diary',array('body'=>$post['body']));
      return $query->result();
    } else {
      return false;
    }
  }
  public function create_diary_tag($post_tag,$post_id)
  {
    $tags = explode(' ',$post_tag);
    foreach($tags as $tag) {
      try {
        $this->db->insert('play_diary_tag',array('diary_id'=>$post_id,'body' => $tag));
      } catch(Exception $e){
        return false;
      }
    }
    return true;
  }
  private function get_diaries($limit,$option = array())
  {
    $query=$this->db->query('
                             select p.*,u.alias 
                             from play_diary p 
                             inner join play_admin u
                             on p.admin_id = u.id
                             order by created_at desc
                             limit 0,'.$limit.'
                           ');
    $r_query = $query->result();
    if(empty($r_query)) {
      return;
    }
    return $r_query;
  }
  public function error()
  {
    echo "error";
  }
  /* diary schema
  public function run_schema()
  {
    
    $this->load->dbforge();
    ######## play_admin table ######################################
    $admin_field = array(
                  'alias'=>array(
                           'type'=>'varchar',
                           'constraint'=>10,
                           'null'=>FALSE
                          ),
                  'password_hash'=>array(
                                   'type'=>'varchar',
                                   'constraint'=>50,
                                   'null'=>FALSE
                                   ),
                  'email'=>array(
                           'type'=>'varchar',
                           'constraint'=>40,
                           'null'=>FALSE
                           )
                  );
    $this->dbforge->add_field('id');
    $this->dbforge->add_field($admin_field);
    $this->dbforge->create_table('play_admin',TRUE);
    ######## play_admin table ######################################
    

    ######## play_diary table ######################################
    $diary_field = array(
                  'body'=>array(
                          'type'=>'text',
                          'null'=>FALSE
                          ),
                  'admin_id'=>array(
                             'type'=>'int',
                             'constraint'=>9,
                             'null'=>FALSE
                             ),
                  'created_at'=>array(
                                'type'=>'int',
                                'constraint'=>10,
                                'null'=>FALSE
                                )
                  );
    $this->dbforge->add_field($diary_field);
    $this->dbforge->add_field('id');
    $this->dbforge->create_table('play_diary',TRUE);
    ######## play_diary table ######################################


    ######## play_diary_tag table ######################################
    $diary_tag_field = array(
                 'diary_id'=>array(  
                            'type'=>'int',
                            'constraint'=>10,
                            'null'=>FALSE
                            ),
                 'body'=>array(
                         'type'=>'varchar',
                         'constraint'=>50,
                         'null'=>FALSE
                         )
                 );
    $this->dbforge->add_field('id');
    $this->dbforge->add_field($diary_tag_field);
    $this->dbforge->create_table('play_diary_tag',TRUE);
    ######## play_diary_tag table ######################################
  }
  */
}
?>
