<?php
class Main extends Controller
{
  public function Main()
  {
    parent::Controller();
    $this->load->helper(array('html','form','url','asset'));
  }
  public function index() 
  { 
    $user_id = $this->get_user_id();
    $this->load->model('UserModel','user_model');
    if(empty($user_id)) {
      $this->load->view('main/index',array("header" => "로그인좀해주세요",
                                             "title" => "Main::Login"));
    } else {
      $user = $this->user_model->find($user_id); 
      $data = array("title"=>"hello","user"=>$user);
      $this->load->view('login/success',$data);
    }
  }
  public function test($alias)
  {
    $this->load->model('UserModel','user_model');
    $this->user_model->find_by_alias($alias);
  }
}
?>
