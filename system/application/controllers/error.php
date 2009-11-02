<?php
class Error extends Controller
{
  public function Error()
  {
    parent::Controller();
  }
  public function index()
  {
    echo "Error Occured";
  }
  public function wrong()
  {
    echo "wrong input";
  }
}
?>
