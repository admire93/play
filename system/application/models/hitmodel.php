<?php
class HitModel extends Model
{
  public function HitModel()
  {
    parent::Model();
  }

  public function get_hit_post_by_name($board_name = '')
  {
    $query = array();
    if(empty($board_name)) {
      $query = $this->db->get('play_hit');
      $query = $query->result();
    } else {
      $query = $this->db->get_where('play_hit',array('url_name'=>$board_name));
      if(empty($query)) {
        $query = '';
      } else {
        $query = $query->result();
      }
    }
    return $query;
  }

  public function create_hit_post($post)
  {
    $data = array(
            'title' => $post['title'],
            'url_name' => $post['url_name'],
            'body' => $post['body']
            );
    if(!$this->db->insert('play_hit', $data)) {
      return false;
    }
    return true;
  }

  public function create_idea_post($post,$user_id)
  {
    try {
      if($post['idea'] == 'agree') {
        $agree = true;
      } else if($post['idea'] == 'disagree') {
        $agree = false;
      }

      $hit_boards = $this->get_hit_post_by_name($post['board']);
      $hit_board = $hit_boards[0];
      $idea_posts=$this->get_idea_posts($hit_board->id,array('user_id'=>$user_id));
      $idea_post = $idea_posts[0];
      $data = array('body'=>$post['body']); 

      if(!empty($idea_post)) {
        if($idea_post->agree == $agree) {
          $this->db->update('play_hit_post', $data, array('id'=>$idea_post->id));
        } else {
          $data['agree'] = $agree; 
          $this->db->update('play_hit_post', $data, array('id'=>$idea_post->id));
        }
      } else {
        $data['agree'] = $agree;
        $data['hit_id'] = $hit_board->id;
        $data['user_id'] = $user_id; 
        $this->db->insert('play_hit_post',$data);
      }

      if($this->count_post($hit_board->id)) {
        $data = array('title'=>$post['title'],'url_name'=>$post['board']);
        $this->db->insert('play_board',$data);
        $this->db->delete('play_hit',array('id'=>$hit_board->id));
        $this->db->delete('play_hit_post',array('hit_id'=>$hit_board->id));
      }
    } catch(Exception $e) {
      return false;
    }
    return true;
  }

  public function count_post($hit_id) 
  {
    $this->db->where('hit_id',$hit_id);
    $this->db->from('play_hit_post');
    $count_post = $this->db->count_all_results();

    $this->db->where('hit_id',$hit_id);
    $this->db->where('agree',TRUE);
    $this->db->from('play_hit_post');
    $agree_post = $this->db->count_all_results();
    $proportion = round(($agree_post / $count_post) * 100);
    if($count_post >= 2 && $proportion > 50) {
      return true;
    }
    return false;
  }

  public function get_idea_posts($hit_id,$option = array()) 
  {
    $_query = 'select a.* 
               from (select p.*,u.alias,u.email 
                     from play_hit_post p  
                     inner join play_user u
                     on p.user_id = u.id
                    ) a
               inner join play_hit h
               on a.hit_id = h.id
               where h.id = \''.$hit_id.'\'';
    if(!empty($option)) {
      if(array_key_exists('user_id',$option)) {
        $_query .= ' and a.user_id='.$option['user_id']; 
      }
    }
    $query = $this->db->query($_query);
    if(!$query) {
      return false;
    }
    return $query->result();
  }
}
?>
