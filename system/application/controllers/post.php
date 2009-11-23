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
      $config['allowed_types'] = 'wma|mp3|png|gif';
      $config['max_size'] ='9000';
      $this->load->library('upload',$config);
      $this->upload->do_upload();

      $file = $this->upload->data();
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
}
?>
