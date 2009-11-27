<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />

  <title>top-board</title>
</head>
<body>

</body>
</html>
<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type"
           content="application/xhtml+xml;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>

    <script type="text/javascript" 
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js">
    </script> 
    <?=js_load('form.js')?>
    <?=js_load('play.js')?>

    <?=css_load('play.css')?>
    <title>play-board</title>
  </head>
  <body>
    <div id="wrap">
      <div id="header">
        <h1><?=anchor('/','Welcome to Play, Find your favorite song!')?></h1>
        <ul>
          <li class="selected"><?=anchor('/post','Post',array('class'=>'post'))?></li>
          <li><?=anchor('/play','Play',array('class'=>'play'))?></li>
          <li><?=anchor('/hit','Hit',array('class'=>'hit'))?></li>
        </ul>
      </div>
      <div id="body">
        <div id="container">
         <ul class="sub-menu">
            <li><?=anchor('/post/top_music','top-music')?></li> 
            <li><?=anchor('/post/tag/','tag')?></li> 
            <li><?=anchor('/post/find_user/','find-people')?></li> 
         </ul>
         <div class="posts">
          <h1>top-music</h1>
          <ul>
          <?php foreach($tops as $music): ?>
            <li><?=$music->name?></li>
          <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div id="footer">
        CopyRignt &copy; 2009 <strong>TEAM-PLAY</strong> 
        <a href="http://github.com/admire93/play">Source code is available</a> under <a href="http://www.gnu.org/licenses/agpl-3.0.html">AGPL</a> 
      </div>
    </div>

  
  
</body>
</html>
