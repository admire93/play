<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <meta http-equiv="Content-Type"
         content="application/xhtml+xml;charset=UTF-8" />
  <script type="text/javascript" 
          src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js">
  </script> 
  <title></title>
</head>
<body>
  <div id="wrap">
    <div id="header">

      <span><?=anchor('/play/my/'.$user->alias,$user->alias)?>!! Do you wanna <?=anchor('/login/out','logout?')?></span>
      <h1>
        <?=anchor('/play/','Welcome to the play!'.$user->alias.'. Listen to your favorite song')?>
      </h1>
    </div>

    <div id="body">
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
    </div>
  </div>
</body>
</html>
