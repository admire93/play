<?=doctype()?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type"
          content="application/xhtml+xml;charset=UTF-8" />
    <title>Play::Random</title>
  </head>
  <body>
    <div class="posts"> 
      <?php foreach($posts as $post): ?>
        <div class="post <?=$post->created_at?>">
          <div class="author"><strong><?=$post->alias?></strong></div>
          <p class="body">Body:<?=markdown($post->body)?></p>
          <div class="tag">
            Tag:
            <?php foreach($this->tag->get_tags($post->id) as $tag):?>
              <?=$tag->body?>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </body>
</html>
