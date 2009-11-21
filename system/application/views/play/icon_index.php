<?=doctype()?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type"
          content="application/xhtml+xml;charset=UTF-8" />
    <title><?=$title?></title>
  </head>
  <body>
    <div id="wrap">
      <div id="header">
        <h1>
          Welcome to the play! <?=$user->alias?>. Listen to your favorite song
        </h1>
        Do you wanna <?=anchor('/login/out','logout?')?>
      </div>
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
  </body>
</html>


