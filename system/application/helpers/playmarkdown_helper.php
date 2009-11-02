<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('markdown')) 
{
  function markdown($text)
  {
    $text = htmlspecialchars($text);
    $patterns = array(
                'strong' => '/(\*{2}|_{2})(.*)(\*{2}|_{2})/',
                'link' => '/(\[)(.*)(\])(\[)(.*)(\])/');
    $replace = array(
                'strong' => '<strong>\2</strong>',
                'link' => '<a href="\5">\2</a>');

    $markdown = preg_replace($patterns,$replace,$text);
    return $markdown;
  }
}
?>
