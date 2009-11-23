<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />

  <title>top-board</title>
</head>
<body>
  <h1>top-board</h1>
  <?php foreach($tops as $music): ?>
    <?=$music->name?>
  <?php endforeach; ?>
</body>
</html>
