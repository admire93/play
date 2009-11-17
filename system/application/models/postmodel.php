<?php
class PostModel extends Model
{
  public function PostModel()
  {
    parent::Model();
  }
  public function new_post($post,$board_name,$user_id)
  {
    $this->db->select('id');
    $board = $this->db->get_where('play_board',array('url_name'=>$board_name));
    $board = $board->result();

    $content = array('body' =>$post['body'],'board_id' => $board[0]->id,
                     'user_id' => $user_id);
    $posting = $this->create_post($content);
    $tag = $this->create_tag($post['tag'],$posting[0]->id);
    
    if($posting && $tag) {
      return true;
    } else {
      return false;
    }
  }
  public function create_post($post)
  {
    if($this->db->insert('play_post',$post)) {
      $this->db->select('id');
      $query = $this->db->get_where('play_post',array('body'=>$post['body']));
      return $query->result();
    } else {
      return false;
    }
  }
 
  public function get_user_posts($alias)
  {
    $query=$this->db->query('
                             select p.*,u.alias 
                             from play_post p 
                             inner join play_user u
                             on p.user_id = u.id
                             where u.alias = '.'\''.$alias.'\''
                           );
    $r_query = $query->result();
    if(empty($r_query)) {
      return;
    }
    return $r_query;
  }

  public function create_tag($post_tag,$post_id)
  {
    if(!empty($post_tag)) {
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
