<?php
class DiaryTagModel extends Model
{
  public function DiaryTagModel()
  {
    parent::Model();
  }
  public function get_tags($post_id)
  {
    $query = $this->db->get_where('play_diary_tag',array('diary_id'=>$post_id));
    return $query->result(); 
  }
}
?>
