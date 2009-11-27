<?php
class TagModel extends Model
{
  public function TagModel()
  {
    parent::Model();
  }
  public function get_tags($post_id)
  {
    $query = $this->db->query('select * 
                               from play_tag
                               where post_id ='.$post_id);
    return $query->result(); 
  }

}
?>
