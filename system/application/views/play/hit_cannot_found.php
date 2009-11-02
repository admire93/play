<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />
  <title>hit-board :: cannot-found</title>
</head>
<body>
  <h1><?=$notice?></h1>
  <?=anchor('/play/write/'.$this->uri->segment(3),$this->uri->segment(3).'-board 만들러가기')?>
</body>
</html>


