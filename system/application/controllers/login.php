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
      if(!empty($user_info)&&$user_info->password_hash == $password_hash) {
        $this->session->set_userdata('user_id',$user_info->id);
        $this->session->set_userdata('alias',$user_info->alias);
        redirect('/play/');
      } else {
        $this->load->helper(array('html','form','url','asset'));
        $this->load->view('login/recheck');
      }
    } else {
      redirect('/error/wrong');
    }
  }
  public function out()
  {
    $this->session->unset_userdata('user_id'); 
    $this->session->unset_userdata('alias');
    redirect('/play');
  }
  public function who_am_i()
  {
    $user = $this->user_model->find($this->get_user_id());
    echo $user->alias;
  }
}
?>
