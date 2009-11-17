<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <meta http-equiv="Content-Type"
         content="application/xhtml+xml;charset=UTF-8" />

  <title>play-board</title>
</head>
<body>
  <?php foreach($posts as $post): ?>
    <div class="posts" style="border:solid 1px #EEE; margin: 10px">
      <div class="author"></div>
      <p class="body">Body:<?=markdown($post->body)?></p>
      <div class="tag">
        Tag:
        <?php foreach($this->tag_model->get_tags($post->id) as $tag):?>
          <?=$tag->body?>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endforeach; ?>
</body>
</html>
