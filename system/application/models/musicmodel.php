<?php
class MusicModel extends Model
{
  public function MusicModel()
  {
    parent::Model();
  }
  public function find($id)
  {  
    $query=$this->db->get_where('play_music',array('id'=>$id));
    $query=$query->result();

    if(!empty($query)) {
      return $query[0];
    }
    return false;

  }
  public function find_by_post_id($post_id)
  {
    $query=$this->db->query('select * 
                             from play_music
                             where post_id ='.$post_id
                            );
    
    $query=$query->result();

    if(!empty($query)) {
      return $query[0];
    }
    return;
  }
  public function create_list($user_id,$music_id)
  {
    $data = array('user_id'=>$user_id,
                  'music_id'=>$music_id); 
    if(!$this->db->insert('play_my_list',$data)) {
      return false;
    } 
    return true;
  }
  public function find_top_music()
  {
    $query = 'select * 
              from play_music m
              inner join play_my_list l
              on m.id = l.music_id
              group by l.music_id
              having count(*) >= '.TOP_MUSIC_LIMIT;

    $query = $this->db->query($query);
    $query = $query->result();
    if(empty($query)) {
      return array();
    }

    return $query;
  }
  public function find_user_list_by_alias($alias)
  {
    $query = $this->db->query('select * 
                               from play_music m
                               inner join (select l.*,u.alias 
                                           from play_my_list l
                                           inner join play_user u
                                           on l.user_id = u.id
                                           where u.alias = \''.$alias.'\'
                                           ) l
                               on m.id = l.music_id
                               ');
    $query = $query->result();
    if(empty($query)) {
      return;
    }
    return $query;
  }
}
?>
