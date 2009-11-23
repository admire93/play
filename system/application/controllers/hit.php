<?php
class Hit extends Controller
{
  private $user_id;

  public function Hit()
  {
    parent::Controller();
    $this->user_id = $this->get_user_id();
    $this->load->helper('url');

    if(empty($this->user_id)) {
      redirect('/');
    }
    $this->load->helper(array('form','url','html'));
    $this->load->model('hitmodel','hit');
  }

  public function index()
  {
    $this->view();
  }

  public function view($board_url = '')
  {
    $this->load->model('usermodel','user');
    $hit = $this->hit->get_hit_post_by_name($board_url);

    if(empty($board_url)) {
      $this->load->view('hit/view',array('hits'=>$hit));
    } else if(!empty($board_title) && empty($hit)) {
      $data = array('notice' => '찾을 수없는 hit-board 입니다');
      $this->load->view('hit/cannot_found',$data); 
    } else {
      $hit = $hit[0];
      $this->load->view('hit/post',array('hit'=>$hit));
    }
  }

  public function write($name = '') 
  {
    $data = array();
    if(!empty($name)) {
      $data['name'] = $name;
    }
    $this->load->view('hit/write',$data);
  }

  public function create()
  {
    if(!empty($_POST)) {
      if($this->hit->create_hit_post($_POST)) {
        redirect('/hit/view/'.$_POST['url_name']);
      } else {
        redirect('/error/board_error');
      }
    } else { 
      echo 'error';
    }
  }
  public function idea_create()
  {
    $idea_create = $this->hit->create_idea_post($_POST,$this->user_id);
    if(is_string($idea_create)) {
      $data = array('title'=>$_POST['title'],'url_name'=>$_POST['board']);
      $this->db->insert('play_board',$data);
    }
    redirect('/hit/view/'.$_POST['board']);
  }
  public function top_board()
  {
    $tops = $this->hit->find_top_board();
    $data = array('tops'=>$tops);
    $this->load->view('hit/top_board',$data);
  }
  public function top_music()
  {
    $this->load->model('musicmodel','music');
    $tops = $this->music->find_top_music();
    $this->load->view('hit/top_music',array('tops'=>$tops));
  }
}
?>
