<?php
class Comment extends Controller
{
  public function Comment()
  {
    parent::Controller();
    $user_id = $this->get_user_id(); 

    $this->load->helper(array('html','form','url','asset'));

    if(empty($user_id)) {
      redirect('/');
    }

    $this->load->model('commentmodel','comment');    
  }
  public function write($post_id) {
    $this->load->view('comment/write'); }
  public function create($post_id)
  {
    if(!empty($_POST)) {
      if($this->comment->create($post_id,$_POST['body'],$this->get_user_id())) {
        echo 'create success!';
      }
    }
  }
  public function view($post_id)
  {
    if(empty($_POST)) {
      $comments = $this->comment->find_by_post_id($post_id);
      $this->load->view('comment/view',array('comments'=>$comments));
    } else {
      redirect('/'); 
    }
  }
  public function get_comment()
  {
  }
}
?>
