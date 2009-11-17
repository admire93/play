<?php
class SchemaModel extends Model 
{
  private $table_prefix='play_';
  public function Schema()
  {
    parent::Model();
  }
  public function run()
  {
    $this->load->dbforge();
    $this->create_user_table();
    $this->create_board_table();
    $this->create_post_table();
    $this->create_tag_table();
    $this->create_hit_table();
    $this->create_validation_ticket_table();
    $this->create_hit_post_table();
  }
  private function create_user_table()
  {
    $user_field = array(
                  'alias'=>array(
                           'type'=>'varchar',
                           'constraint'=>10,
                           'null'=>FALSE
                          ),
                  'password_hash'=>array(
                                   'type'=>'varchar',
                                   'constraint'=>50,
                                   'null'=>FALSE
                                   ),
                  'email'=>array(
                           'type'=>'varchar',
                           'constraint'=>40,
                           'null'=>FALSE
                           )
                  );
    $this->dbforge->add_field('id');
    $this->dbforge->add_field($user_field);
    $this->dbforge->create_table($this->table_prefix.'user',TRUE);
  }
  private function create_board_table()
  {
    $board_field = array(
                   'title'=>array(
                            'type'=>'varchar',
                            'constraint'=>20,
                            'null'=>FALSE
                            ),
                   'url_name'=>array(
                           'type'=>'varchar',
                           'constraint'=>20,
                           'null'=>FALSE
                           )
                   );
    $this->dbforge->add_field('id');
    $this->dbforge->add_field($board_field);
    $this->dbforge->create_table($this->table_prefix.'board',TRUE);
  }
  private function create_post_table()
  {
    $post_field = array(
                  'body'=>array(
                          'type'=>'text',
                          'null'=>FALSE
                          ),
                  'music_id'=>array(
                              'type'=>'int',
                              'constraint'=>10,
                              'null'=>TRUE
                              ),
                  'board_id'=>array(
                              'type'=>'int',
                              'constraint'=>10,
                              'null'=>FALSE
                              ),
                  'user_id'=>array(
                             'type'=>'int',
                             'constraint'=>10,
                             'null'=>FALSE
                             )
                  );
    $this->dbforge->add_field('id');
    $this->dbforge->add_field($post_field);
    $this->dbforge->create_table($this->table_prefix.'post',TRUE);
  }
  private function create_tag_table() 
  {
    $tag_field = array(
                 'post_id'=>array(  
                            'type'=>'int',
                            'constraint'=>10,
                            'null'=>FALSE
                            ),
                 'body'=>array(
                         'type'=>'varchar',
                         'constraint'=>50,
                         'null'=>FALSE
                         )
                 );
    $this->dbforge->add_field('id');
    $this->dbforge->add_field($tag_field);
    $this->dbforge->create_table($this->table_prefix.'tag',TRUE);
  }
  private function create_hit_table()
  {
    $hit_field = array(
                   'title'=>array(
                            'type'=>'varchar',
                            'constraint'=>20,
                            'null'=>FALSE
                            ),
                   'url_name'=>array(
                           'type'=>'varchar',
                           'constraint'=>20,
                           'null'=>FALSE
                           ),
                   'body'=>array(
                           'type'=>'text',
                           'null'=>FALSE
                           )
                  );
    $this->dbforge->add_field('id');
    $this->dbforge->add_field($hit_field);
    $this->dbforge->create_table($this->table_prefix.'hit',TRUE);
  }
  private function create_validation_ticket_table()
  {
    $ticket_field = array(
                    'email'=>array(
                             'type'=>'varchar',
                             'constraint'=>40,
                             'null'=>FALSE
                             ),              
                    'validation_ticket'=>array(
                                         'type'=>'varchar',
                                         'constraint'=>50,
                                         'null'=>FALSE
                                         )
                    );
    $this->dbforge->add_field('id');
    $this->dbforge->add_field($ticket_field);
    $this->dbforge->create_table($this->table_prefix.'validation_ticket',TRUE);
  }
  private function create_hit_post_table()
  {
    $hit_post_field = array(
                      'user_id'=>array(
                              'type'=>'int',
                              'constraint'=>9,
                              'null'=>FALSE
                              ),
                      'hit_id'=>array(
                                   'type'=>'int',
                                   'constraint'=>9,
                                   'null'=>FALSE
                                   ),
                      'body'=>array(
                              'type'=>'text',
                              'null'=>FALSE
                              ),
                      'agree'=>array(
                               'type'=>'boolean',
                               'default'=>FALSE
                               'null'=>FALSE
                               )
                      );
    $this->dbforge->add_field('id');
    $this->dbforge->add_field($hit_post_field);
    $this->dbforge->create_table($this->table_prefix.'hit_post',TRUE);
  }
}
?>
