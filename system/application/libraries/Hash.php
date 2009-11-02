<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hash
{
  public function convert($val)
  {
    if(is_array($val)) {
      return sha1(
               strrev(
                 sha1(
                   sha1($val[0])+"\n"+$val[1]
                 )
               )
             );
    } else {
      return sha1($val);
    }
  }
}
?>
