<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />

  <title><?=$title?></title>
</head>
<body>
  <?=anchor('/login/out','log-out')?>
  <?=anchor('/post/view/'.$user->alias,'my-post')?>
  <?=anchor('/play/music/'.$user->alias,'my-list')?>
</body>
</head>
