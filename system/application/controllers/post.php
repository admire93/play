<?php
class Post extends Controller
{
  private $user_id;
  public function Post()
  {
    parent::Controller();
    $this->load->helper(array('form','html','url','asset'));
    $this->load->model('PostModel','post_model');
    $this->load->model('TagModel','tag_model');

    $this->user_id = $this->get_user_id();
    if(empty($this->user_id)) {
      redirect('/error/login_require');
    }
  }
  public function index()
  {
    $this->top_music();
  }
  public function create($board_name)
  {
    
    if(empty($_POST)) {
      $data=array('error'=>$this->upload->display_errors());
      $this->load->view('/error/upload',$data);
    } else {
      if(!empty($_FILES)) {
        $config['upload_path'] = BASEPATH . 'upload/';
        $config['allowed_types'] = 'wma|mp3|png|gif|swf|zip';
        $config['max_size'] ='9000';
        $this->load->library('upload',$config);
        $this->upload->do_upload();
        $file = $this->upload->data();
      } else {
        $file['file_name'] = ''; 
      }
      if($this->post_model->new_post($_POST,$board_name,$file['file_name'],$this->user_id)) {
        redirect('/play/board/'.$board_name);
      } else {
        redirect('/error/upload/');
      }
    }
  }
  public function view($param)
  {
    if(!empty($param)) {
      $data = array('posts' => $posts,'title'=> 'Post :: View');
      $posts = $this->post_model->get_user_posts($param);  
      if(empty($param)) {
        $posts = $this->post_model->find_by_created_at($param);
      }
      $this->load->view('post/view',$data);
    }
  }
  public function top_music()
  {
    $this->load->model('musicmodel','music');
    $tops = $this->music->find_top_music();
    $this->load->view('post/top_music',array('tops'=>$tops));
  }
  public function find_user()
  {
    echo 'abc';
  }
  public function tag($tag='')
  {
    if(!empty($tag)) {
      $posts = $this->post->search_by_tag($tag);
    } else if(!empty($_POST)) {
      redirect('/post/tag/'.$_POST['search']);
    } else {
      echo 'abc';
    }
  }
}
?>
