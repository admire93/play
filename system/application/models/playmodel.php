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
  public function get_board_posts($board_title,$limit = 0,$offset=0)
  {
    $offset = $offset <= 5 ? 0 : $offset;
    $board = $this->find_by_title($board_title);
    if(!$limit) {
      $query=$this->db->query('
                             select p.*,u.alias as author
                             from play_post p 
                             inner join play_user u
                             on p.user_id = u.id
                             where p.board_id = '.$board[0]->id.'
                             order by created_at desc
                            ');
      #$this->db->get_where('play_post',array('board_id'=>$board[0]->id));
    } else {
      $query=$this->db->query('
                               select p.*,u.alias as author
                               from play_post p 
                               inner join play_user u
                               on p.user_id = u.id
                               where p.board_id = '.$board[0]->id.'
                               order by created_at desc
                               limit '.$offset.','.$limit
                              );
      #$query=$this->db->get_where('play_post',array('board_id'=>$board[0]->id),$limit,$offset);
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
    if(!empty($query)) {
      $query = $query->result();
    } else {
      $query = '';
    }
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
  public function search_by_title($title) 
  {
    $query = $this->db->query('select *
                               from play_board
                               where title like \'%'.$title.'%\' 
                                     or
                                     url_name like \'%'.$title.'%\'');
    $query = $query->result();
    if(empty($query)) {
      return; 
    }
    return $query;
  }
}
?>
