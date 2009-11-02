<?php
class HitModel extends Model
{
  public function HitModel()
  {
    parent::Model();
  }
  public function get_hit_post($board_title = '')
  {
    if(empty($board_title)) {
      $query = $this->db->get('play_hit');
      $query = $query->result();
    } else {
      $query = $this->db->get_where('play_hit',array('title'=>$board_title));
      if(empty($query)) {
        $query = '';
      } else {
        $query = $query->result();
      }
    }
    return $query;
  }
}
?>
