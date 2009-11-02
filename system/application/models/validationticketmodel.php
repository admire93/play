<?php
class ValidationTicketModel extends Model
{
  public function ValidationTicketModel()
  {
    parent::Model();
  }
  public function find_by_ticket($ticket)
  {
    $query = $this->db->get_where('play_validation_ticket',
                                   array('validation_ticket' =>$ticket)
                                 );
    $query = $query->result();
    if(!$query) {
      return FALSE;
    }
    return $query[0];
  }
  public function find_by_email($email)
  {
    $query = $this->db->get_where('play_validation_ticket',
                                  array('email' => $email)
                                 );
    $query = $query->result();
    if(!$query) {
      return FALSE;
    }
    return $query[0];
  }
  public function new_ticket($email)
  {
    $this->load->library('hash');
    $this->load->helper('date');
    $exists = $this->find_by_email($email);
    if(!empty($exists)) {
      $ticket = $exists->validation_ticket;
    } else {
      $ticket = $this->hash->convert(array($email,now())); 
      $data = array('email'=>$email,'validation_ticket'=>$ticket);
      if(!$this->db->insert('play_validation_ticket',$data)){
        return false;
      }
    }
    return $ticket;
  }
  public function destroy($id)
  {
    if($this->db->delete('play_validation_ticket',array('id'=>$id))) {
      return TRUE;
    }
    return FALSE;
  }
}
?>
