<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('create_xml')) 
{
  function create_xml($querys,$user) {
    $xml_source = '<?xml version="1.0" encoding="euc-kr" ?><mp3>';
    $private_path = '/home/admire/play/public/xml/'.$user;
    foreach($querys as $query) {
      $xml_source .= '<mp3_list>';
      $xml_source .= '<노래URL>'.$query->real_path.'</노래URL>';
      $xml_source .= '<가사URL>'.$query->name.'</가사URL>';
      $xml_source .= '<노래이름>'.$query->name.'</노래이름>';
      $xml_source .= '<노래시간></노래시간>';
      $xml_source .= '<노래색깔>0xffffff</노래색깔>';
      $xml_source .= '</mp3_list>';
    }
    $xml_source .="</mp3>";
    if(!file_exists($private_path)) {
      mkdir($private_path,0707);
    }
    try {
      $fp = fopen($private_path.'/playlist.xml','w+');
      fwrite($fp,$xml_source);
      fclose($fp);
    } catch(Exception $e) {
      return false;
    }
    return true;
  }
}
?>
