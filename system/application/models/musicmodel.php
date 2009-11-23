<?php
class MusicModel extends Model
{
  public function MusicModel()
  {
    parent::Model();
  }
  public function find($id)
  {  
    $query=$this->db->get_where('play_music',array('id'=>$id));
    $query=$query->result();

    if(!empty($query)) {
      return $query[0];
    }
    return false;

  }
  public function find_by_post_id($post_id)
  {
    $query=$this->db->get_where('play_music',array('post_id'=>$post_id));
    
    $query=$query->result();

    if(!empty($query)) {
      return $query[0];
    }
    return false;
  }
  public function create_list($user_id,$music_id)
  {
    $data = array('user_id'=>$user_id,
                  'music_id'=>$music_id); 
    if(!$this->db->insert('play_my_list',$data)) {
      return false;
    } 
    return true;
  }
}
?>
