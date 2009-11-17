<?php
class Play extends Controller
{
  private $user_id;
  public function Play()
  {
    parent::Controller();
    $this->user_id = $this->get_user_id();
    $this->load->helper('url');

    if(empty($this->user_id)) {
      redirect('/');
    }

    $this->load->helper(array('form','url','html'));
  }
  public function index()
  {
    echo 'index';
  }
  public function board($board_title)
  {
    $this->load->model('playmodel','play_model');
    $this->load->model('tagmodel','tag_model');
    $this->load->helper('playmarkdown');
    $posts = $this->play_model->get_board_posts($board_title);
    $data = array('board_title'=>$board_title,'title'=>'Board-view',
                  'posts' => $posts);
    $this->load->view('play/board.php',$data);
  }
  public function music($alias)
  {
    echo $alias . '`s music-list';
  }
}
?>
