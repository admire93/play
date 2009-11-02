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
        $this->parser->parse('post/new.php',$data);
      } else {
        echo 'board-error';
      }
    } else {
      echo 'error';
    }
  }
  public function create($board_title)
  {
    if($this->post_model->new_post($_POST,$board_title,$this->user_id)){
      echo "post create succesfully";
    } else {
      echo "post failed";
    }
  }
  public function view($alias)
  {
    $posts = $this->post_model->get_user_posts($alias);  
    $data = array('posts' => $posts,'title'=> 'Post :: View');
    $this->load->view('post/view',$data);
  }
}
?>
