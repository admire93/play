<?php
class Post extends Controller
{
  private $user_id;
  public function Post()
  {
    parent::Controller();
    $this->load->helper(array('form','html','url'));
    $this->load->model('PostModel','post_model');
    $this->load->model('TagModel','tag_model');

    $this->user_id = $this->get_user_id();
    if(empty($this->user_id)) {
      redirect('/error/login_require');
    }
  }
  public function write($preposition = '')
  {
    $board_title = $this->uri->segment(4);
    if($preposition == 'on') {
      $this->load->model('PlayModel','play_model');
      if($this->play_model->find_by_title($board_title)) {
        $data = array('title' => 'New-Posting','where'=>$board_title);
        $this->load->view('post/new.php',$data);
      } else {
        echo 'board-error';
      }
    } else {
      echo 'error';
    }
  }
  public function create($board_name)
  {
    if(empty($_POST)) {
      return;
    } else {
      if($this->post_model->new_post($_POST,$board_name,$this->user_id)){
        $config['upload_path'] = BASEPATH . 'upload/';
        $config['allowed_types'] = 'mp3|wma';
        $config['max_size'] ='90000';
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload())
        {
          $error = array('error'=>$this->upload->display_errors());
          $this->load->view('error/upload',$error);
        }
        echo "post create succesfully";
      } else {
        echo "post failed";
      }
    }
  }
  public function view($alias)
  {
    $posts = $this->post_model->get_user_posts($alias);  
    $data = array('posts' => $posts,'title'=> 'Post :: View');
    $this->load->view('post/view',$data);
  }
  public function test($board_name)
  {
    var_dump($_POST);
  }
}
?>
