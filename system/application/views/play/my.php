<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type"
           content="application/xhtml+xml;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script> 

    <?=js_load('play.js')?>
    <?=css_load('play.css')?>
    <title></title>
  </head>
  <body>
    <div id="wrap">
      <div id="header">
        <h1><?=anchor('/','Welcome to Play, Find your favorite song!')?></h1>
        <ul>
          <li class="selected"><?=anchor('/post','post',array('class'=>'post'))?></li>
          <li><?=anchor('/play','Play',array('class'=>'play'))?></li>
          <li><?=anchor('/hit','Hit',array('class'=>'hit'))?></li>
        </ul>
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
      <div id="footer">
        CopyRignt &copy; 2009 <strong>TEAM-PLAY</strong> 
        <a href="http://github.com/admire93/play">Source code is available</a> under <a href="http://www.gnu.org/licenses/agpl-3.0.html">AGPL</a> 
      </div>
    </div>
  </body>
</html>
