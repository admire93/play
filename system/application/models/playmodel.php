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
  public function get_board_posts($board_title,$limit = '',$offset=0)
  {
    $board = $this->find_by_title($board_title);
    $this->db->order_by('created_at','desc');
    if(empty($limit)) {
      $query=$this->db->get_where('play_post',array('board_id'=>$board[0]->id));
    } else {
      $query=$this->db->get_where('play_post',array('board_id'=>$board[0]->id),$limit,$offset);
    }
    return $query->result();
  }
  public function get_new($limit = 5)
  {
    $query = $this->db->query('select *
                               from play_board
                               order by created_at desc
                               limit 0,'.$limit
                             );
    $query = $query ? $query->result() : '';
    return $query;
  }
  public function get_post_size($board_name)
  {
    $board = $this->find_by_title($board_name);

    $this->db->where('board_id',$board[0]->id);
    $this->db->from('play_post');
    $count_post = $this->db->count_all_results();
    return $count_post;
  }
}
?>
