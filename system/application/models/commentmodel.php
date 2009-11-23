<?php
class CommentModel extends Model
{
  public function CommentModel()
  {
    parent::Model();
  }
  public function create($post_id,$body,$user_id)
  {
    $data = array('user_id'=>$user_id,'post_id'=>$post_id,'body'=>$body);
    
    if(!$this->db->insert('play_comment',$data)) {
      return false;
    }
    return true;
  }
  public function find_by_post_id($post_id)
  {
     $query=$this->db->query('
                             select c.*,u.alias as author 
                             from play_comment c 
                             inner join play_user u
                             on c.user_id = u.id
                             where c.post_id = \''.$post_id.'\'
                             order by created_at desc
                            '
                           );
    $r_query = $query->result();
    if(empty($r_query)) {
      return;
    }
    return $r_query;
  }
}
?>


