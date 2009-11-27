<?php
class UserModel extends Model
{
  public function UserModel()
  {
    parent::Model();
  }
  public function new_user($post)
  {
    $this->load->library('hash');
    $password_submit = array($post['password'],$post['submit']);
    $post = array_diff($post,$password_submit);

    $post['password_hash']=$this->hash->convert(array($password_submit[0],$post['alias'])); 

    if($this->db->insert('play_user',$post)) {
      return true;
    } else {
      return false;
    }
  }
  public function find_by_alias($alias)
  {
    $query =  $this->db->get_where('play_user',array('alias' => $alias));
    $r_query = $query->result();
    if(empty($r_query)) {
      return false;
    }
    return $r_query[0];
  }
  public function find_by_email($alias)
  {
    $query =  $this->db->get_where('play_user',array('email' => $email));
    $r_query = $query->result();
    if(empty($r_query)) {
      return false;
    }
    return $r_query[0];
  }
  public function find($id)
  {
    $query = $this->db->get_where('play_user',array('id' => $id));
    $r_query = $query->result();
    if(empty($r_query)) {
      return;
    }
    return $r_query[0];
  }
  public function update($change_password,$alias)
  {
    $this->load->library('hash');
    $password_hash = $this->hash->convert(array($change_password,$alias));
    $data = array('password_hash'=>$password_hash);
    $where = array('alias'=>$alias);
    
    if(!$this->db->update('play_user',$data,$where)) {
      return false;
    }
    return true;
  }
}
?>
