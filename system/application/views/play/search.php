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
          <li><?=anchor('/post','Post',array('class'=>'post'))?></li>
          <li class="selected"><?=anchor('/play','Play',array('class'=>'play'))?></li>
          <li><?=anchor('/hit','Hit',array('class'=>'hit'))?></li>
        </ul>
      </div>
      <div id="body">
        <div id="container">
         <ul class="sub-menu">
            <li><?=anchor('/play/board','board')?></li> 
            <li><?=anchor('/play/new_board','new-board')?></li> 
            <li><?=anchor('/play/random','random')?></li> 
         </ul>
           <div class="posts">
             <?=form_open('/play/search/',array('class'=>'search'));?>
             <?=form_fieldset('Search');?>
              <?=form_input('search','search')?>
             <?=form_fieldset_close()?>
             <?=form_submit('submit','submit')?>

           <?php if(!empty($board)): ?>
            <ul>
              <?php foreach($boards as $board): ?>
                <li><?=anchor('/play/board/'.$board->url_name,$board->title)?></li>
              <?php endforeach; ?>
            </ul>
            <?php else: ?>
              <h1>Sorry, we cannot find.</h1>
            <?php endif; ?>
           </div>
         </div>             
      </div>
      <div id="footer">
        CopyRignt &copy; 2009 <strong>TEAM-PLAY</strong> 
        <a href="http://github.com/admire93/play">Source code is available</a> under <a href="http://www.gnu.org/licenses/agpl-3.0.html">AGPL</a> 
      </div>
    </div>

  
  
</body>
</html>
