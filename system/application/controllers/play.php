<?php
class Play extends Controller
{
  private $user_id;
  public function Play()
  {
    parent::Controller();
    $this->user_id = $this->get_user_id();

    if(empty($this->user_id)) {
      redirect('/');
    }

    $this->load->helper(array('form','url','html'));
    $this->load->model('hitmodel','hit');
  }
  public function index()
  {
    $this->hit();
  }
  public function board($board_title)
  {
    $this->load->model('playmodel','play_model');
    $this->load->model('tagmodel','tag_model');
    $this->load->helper(array('playmarkdown'));
    $posts = $this->play_model->get_board_posts($board_title);
    $data = array('board_title'=>$board_title,'title'=>'Board-view',
                  'posts' => $posts);
    $this->load->view('play/board.php',$data);
  }
  public function hit($board_title = '')
  {
    $hit = $this->hit->get_hit_post($board_title);

    if(empty($board_title)) {
      $this->load->view('play/hit_board_list',array('hit'=>$hit));
    } else if(!empty($board_title) && empty($hit)) {
      $data = array('notice' => '찾을 수없는 hit-board 입니다');
      $this->load->view('play/hit_cannot_found',$data); 
    } else {
      $this->load->view('play/hit_post',array('hit'=>$hit));
    }
  }
  public function write($board_title = '') 
  {
    $data = array('hit'=> '');

    if(!empty($board_title)) {
      $hit = $this->hit->get_hit_post($board_title);
      $data['hit'] = $hit;
    }

    $this->load->view('play/hit_board_write',$data);
  }
  public function music($alias)
  {
    echo $alias . '`s music-list';
  }
}
?>
