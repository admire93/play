<?php
class TagModel extends Model
{
  public function TagModel()
  {
    parent::Model();
  }
  public function get_tags($post_id)
  {
    $query = $this->db->get_where('play_tag',array('post_id'=>$post_id));
    return $query->result(); 
  }

}
?>
