<?php
class Play extends Controller
{
  public function Play()
  {
    parent::Controller();
    $user_id = $this->get_user_id();
    $this->load->helper(array('html','form','url','asset'));
    $func = $this->uri->segment(2) ? $this->uri->segment(2) : 'index';

    if(empty($user_id) && $func != 'index') {
      redirect('/');
    }
    $this->load->helper('playmarkdown');
    $this->load->model('tagmodel','tag');
  }
  public function index()
  {
    $user_id = $this->get_user_id();
    $this->load->model('UserModel','user_model');
    if(empty($user_id)) {
      $this->load->view('play/index',array("header" => "login required",
                                             "title" => "Play-Login Required"));
    } else {
      $user = $this->user_model->find($user_id); 
      $data = array("title"=>"hello","user"=>$user);
      $this->load->view('play/icon_index',$data);
    }
  }
  public function board($board_name = '')
  {
    $this->load->model('playmodel','play');

    if(!empty($board_name)) {
      $this->load->library('paging');
      $post_size = $this->play->get_post_size($board_name);

      $total_page = (int)(ceil($post_size/POST_PER_PAGE));
      $page = $this->uri->segment(4);
      if(!is_integer($page)) {
        $pabe = 1;
      }
      $selection = min(max(1,$page),$total_page);

      $offset = $selection * POST_PER_PAGE;
      $posts = $this->play->get_board_posts($board_name,POST_PER_PAGE,$offset);

      $data = array('board_title'=>$board_name,'title'=>'Board-view',
                    'posts' => $posts,
                    'board_name' => $board_name,
                    'total_page' => $total_page,
                    'selection' => $selection);
      $this->load->view('play/board',$data);
    } else {
      $data = array('new_boards'=>$this->play->get_new());
      $this->load->view('play/board_index',$data);
    }
  }
  public function search($search='')
  {
    if(!empty($_POST)) {
      redirect('/play/search/'.$search);
    } else {
      echo 'search the thing';
    }
  }
  public function random()
  {
    $this->load->model('postmodel','post');
    $this->load->view('play/random',array('posts'=>$this->post->random()));
  }
  public function music($alias)
  {
    echo $alias . '`s music-list';
  }
  public function test()
  {
  }
}
?>
