<?=doctype()?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type"
          content="application/xhtml+xml;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script> 

    <?=css_load('play.css')?> 
    <?=js_load('play.js')?>
    <title><?=$title?></title>
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
        <ul id="menu">
          <li><?=anchor('/play/my/'.$user->alias,'my-list')?></li>
          <li><?=anchor('/play/board','play-board')?></li>
          <li><?=anchor('/hit/top_music','hit-music')?></li>
          <li><?=anchor('/hit/','hit-board')?></li>
          <li><?=anchor('/hit/top_board','hot-board')?></li>
          <li><?=anchor('/play/top_list','favorite list')?></li>
          <li><?=anchor('/user/my/'.$user->alias,'preference')?></li>
          <li><?=anchor('/play/random','random Play')?></li>
          <li><?=anchor('/login/out','exit')?></li>
        </ul>
      </div>
    </div>
  </body>
</html>


