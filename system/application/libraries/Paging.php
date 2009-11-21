<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paging
{
  public function pager($length, $selection=1, $step = 9)
  {
    $page = array();
    $half = (int)($step/2);

    if($length > $step && $selection > $half +2) {
      array_push($page,array('first'=>1));
      $start = $selection+$half>=$length ? $length-$step+1 : $selection-$half;
    } else {
      $start = 1;
    }

    $to = min($start+$step,1+$length);

    for($i = $start; $i < $to; $i++) {
      if($i == $selection) {
        array_push($page,array('selected'=>$i));
      } else {
        array_push($page,$i);
      }
    }

    if(max($selection,$to)+1<$length) {
      array_push($page,array('last'=>$length));
    }

    return $page;
  }
}
?>
