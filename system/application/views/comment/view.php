<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />

  <title>comment-view</title>
</head>
<body>
  <h1>comment-view</h1>
  <?php if(!empty($comments)): ?>
    <?php foreach($comments as $comment):?>
      <div class="comment">
        <strong><?=$comment->author?></strong>
        <?=$comment->body?>
        <?=$comment->created_at?>
      </div>
    <?php endforeach;?>
  <?php endif;?>
</body>
</html>

