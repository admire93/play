<?php 
class Test extends Controller
{
  private $valid_ticket;
  public function Test()
  {
    parent::Controller();
  }
  public function index()
  {
    $this->load->model('validationticketmodel','ticket');
    $this->valid_ticket = $this->ticket->find_by_ticket('591a817d68522f2687547c19e50be355b9904837');
  }
  public function hello()
  {
    var_dump($this->valid_ticket);
  }
}
?>
