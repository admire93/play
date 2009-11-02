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
  public function create_tag($post_tag,$post_id)
  {
    if(!empty()) {
      $tags = explode(' ',$post_tag);
      foreach($tags as $tag) {
        try {
          $this->db->insert('play_tag',array('post_id'=>$post_id,'body'=>$tag));
        } catch(Exception $e){
          return false;
        }
      }
      return true;
    }
    return false;
  }
}
?>
