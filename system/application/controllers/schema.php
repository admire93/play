<?php
class Schema extends Controller
{
  public function Schema()
  {
    parent::Controller();
  }
  public function run()
  {
    $this->load->model('schemamodel','schema');
    $this->schema->run();
  }
}
?>
