<?php
class PlayModel extends Model
{
  public function PlayModel()
  {
    parent::Model();
  }
  public function find_by_title($board_name)
  {
    $query = $this->db->get_where('play_board',array('url_name'=>$board_name));
    if(empty($query)) {
      return false;
    } else {
      return $query->result();
    }
  }
  public function get_board_posts($board_title)
  {
    $board = $this->find_by_title($board_title);
    $query=$this->db->get_where('play_post',array('board_id' => $board[0]->id));
    return $query->result();
  }
}
?>
