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
    <?=js_load('hit.js')?>

    <?=css_load('hit.css')?>
    <title>play-board</title>
  </head>
  <body>
    <div id="wrap">
      <div id="header">
        <h1><?=anchor('/','Welcome to Play, Find your favorite song!')?></h1>
        <ul>
          <li><?=anchor('/post','Post',array('class'=>'post'))?></li>
          <li><?=anchor('/play','Play',array('class'=>'play'))?></li>
          <li class="selected"><?=anchor('/hit','Hit',array('class'=>'hit'))?></li>
        </ul>
      </div>
      <div id="body">
        <div id="container">
         <ul class="sub-menu">
            <li><?=anchor('/hit/write','write')?></li> 
            <li><?=anchor('/hit/top_board','top-board')?></li> 
            <li><?=anchor('/hit/new_board','new_board')?></li> 
         </ul>
         <div class="posts">
          <h1>hit-board-write</h1>
          <?=form_open('/hit/create')?>

            <?=form_fieldset('hit-board-post');?>
              <label for="title">Title [board 의 이름]:</label>
              <?=form_input(array('name' => 'title', 'id' => 'title'))?>

              <?php if(isset($name)): ?>
                <label for="url-name">url-name [board 의 이름]:</label>
                <?=form_input(array('name' => 'url_name', 'id' => 'url-name', 
                                    'value' => $name, 'readonly' => TRUE))?>
              <?php else: ?>
                <label for="url-name">url-name [board 의 이름]:</label>
                <?=form_input(array('name' => 'url_name', 'id' => 'url-name'))?>
              <?php endif;?>

              <label for="hit-body">hit posting :</label>
              <?=form_textarea(array('name' => 'body', 'id' => 'hit-body'))?>
            
            <?=form_fieldset_close()?>

            <?=form_submit('submit','write')?>
          </form>

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


<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />

  <title>hit-board-write</title>
</head>
<body>
  
</body>
</html>
