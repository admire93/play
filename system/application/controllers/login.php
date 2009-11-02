<?php
class Login extends Controller
{
  public function Login()
  {
    parent::Controller();
    $this->load->model('usermodel','user_model');
    $this->load->library(array('hash'));
    $this->load->helper('url');
  }
  public function index()
  {
    if(!empty($_POST)) {
      $password_hash = $this->hash->convert(array($_POST['password'],$_POST['alias']));

      $user_info = $this->user_model->find_by_alias($_POST['alias']);
      if($user_info->password_hash == $password_hash) {
        $this->session->set_userdata('user_id',$user_info->id);
        redirect('/main');
      } else {
        $this->recheck();
      }
    } else {
      redirect('/error/wrong');
    }
  }
  public function recheck()
  {
    echo "recheck";
  }
  public function out()
  {
    $this->session->unset_userdata('user_id'); 
    redirect('/main');
  }
}
?>
