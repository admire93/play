<?php
class User extends Controller
{
  public function User()
  {
    parent::Controller();
    $this->load->helper(array('html','form','url'));
    $this->load->library(array('form_validation'));
    $this->load->model('validationticketmodel','ticket'); 
    $this->load->model('UserModel','user_model');     
  }
  public function sign_up($ticket='')
  {
    $valid_ticket = $this->ticket->find_by_ticket($ticket);
    if(empty($valid_ticket)) {
      $this->load->view('user/send_mail');
    } else {
      $data = array('title' => '로그인좀해주세요',
                    'email' => $valid_ticket->email,
                    'ticket'    => $valid_ticket->validation_ticket);
      $this->load->view('user/sign_up',$data);
    }
  }
  public function create($valid_ticket)
  {
    $ticket = $this->ticket->find_by_ticket($valid_ticket);
    $valid_ticket_id = $ticket->id;
    #validation  
    $this->form_validation->set_rules('alias','alias','required|callback_useralias_check');
    $this->form_validation->set_rules('email','email','required|valid_email');
    $this->form_validation->set_rules('password','password',
                                      'required|matches[password_confirm]');
    $this->form_validation->set_rules('password_confirm',
                                      'password-confrim','required');
    if(!$this->form_validation->run()) {
      redirect('/user/sign_up/'.$valid_ticket);
    }
    if($this->user_model->new_user($_POST) && $this->ticket->destroy($valid_ticket_id)) {
      redirect('/');
    } else {
      echo 'error';
    }
  }
  public function send_email()
  {
    $this->form_validation->set_rules('email','email','required|valid_email|callback_email_check');
    if(!$this->form_validation->run()) {
      echo 'error';
    }
    $this->load->library(array('email'));
    $ticket = $this->ticket->new_ticket($_POST['email']);
    $src = $this->config->config['base_url'];
    $src .= 'user/sign_up/'.$ticket;

    $this->email->from('noreplay@play.0pen.us','noreply');
    $this->email->to($_POST['email']);
    $this->email->subject('play.0pen.us :: Validation Email');
    $this->email->message($src);
    if(!$this->email->send()) {
      echo 'some error occured';#$this->email->print_debugger();
    } else {
      echo 'email was succesfuly sent your email account';
    }
  }

  # user validation callback function 
  public function useralias_check($alias)
  {
    $this->db->select('alias');
    $query = $this->db->get('play_user');
    foreach($query->result() as $query_alias) {
      if($query_alias->alias == $alias) {
        $this->form_validation->set_message('useralias_check',
                                            '%s is already exists');
        return false;
      } 
    }
    return true;
  }
  # user email validation callback function
  public function email_check($email)
  {
    $this->db->select('email');
    $query = $this->db->get_where('play_user',array('email'=>$email));
    $query = $query->result();
    if(!empty($query)) {
      $this->form_validation->set_message('email is unavaliable');
      return false;
    }
    return true;
  }
  public function my($alias)
  {
    $user_id = $this->get_user_id();
    $user = $this->user_model->find($user_id);

    

    $this->load->library('hash');

    if(!empty($_POST) && $user->password_hash == $this->hash->convert(array($_POST['password'],$alias))) {
      $this->load->view('user/preference',array('user'=>$user)); 
    } else if(!empty($user) && $user->alias == $alias) {
      $this->load->view('user/password_confirm'); 
    } else {
      redirect('/');
    }
  }
  public function update()
  {
    if(!empty($_POST)) {
      $this->form_validation->set_rules('password','password',
                                        'required|matches[password_confirm]');
      $this->form_validation->set_rules('password_confirm',
                                        'password-confrim','required');

      if(!$this->user_model->update($_POST['password'],$_POST['alias'])) {
        redirect('/error'); 
      } else {
        redirect('/login/out');
      }
    }
  }
}
?>
