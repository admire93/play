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
  public function create($board_name)
  {
    
    if(empty($_POST)) {
      $data=array('error'=>$this->upload->display_errors());
      $this->load->view('/error/upload',$data);
    } else {
      $config['upload_path'] = BASEPATH . 'upload/';
      $config['allowed_types'] = 'wma|mp3|jpg';
      $config['max_size'] ='9000';
      $this->load->library('upload',$config);
      $this->upload->do_upload();

      $this->load->model('musicmodel','music');
      $file = $this->upload->data();
      if($this->post_model->new_post($_POST,$board_name,$this->user_id) 
         &&$this->music->create($_POST['file_name'],$file['file_name'])){
        redirect('/play/board/'.$board_name);
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
