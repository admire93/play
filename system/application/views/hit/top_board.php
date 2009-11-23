<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />

  <title>top-board</title>
</head>
<body>
  <h1>top-board</h1>
  <?php foreach($tops as $board): ?>
    <?=anchor('/play/board/'.$board->url_name,$board->title)?>
  <?php endforeach; ?>
</body>
</html>
