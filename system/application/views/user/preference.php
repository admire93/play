<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
     <meta http-equiv="Content-Type"
           content="application/xhtml+xml;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script> 

    <?=js_load('user.js')?>
    <?=css_load('user.css')?>
    <title>user-preference</title>
  </head>
  <body>
   <div id="wrap">
      <div id="header">
        <h1><?=anchor('/','Welcome to Play, Find your favorite song!')?></h1>
        <ul>
          <li class="selected"><?=anchor('/','Home',array('class'=>'home'))?></li>
          <li><?=anchor('/play','Play',array('class'=>'play'))?></li>
          <li><?=anchor('/hit','Hit',array('class'=>'hit'))?></li>
        </ul>
      </div>
      <div id="body">
        <h1><?=$user->alias?>  ::  preference</h1>

        <?=form_open('/user/update')?>
          <label for="alias">alias *</label> 
          <?=form_input(array('name'=>'alias','id'=>'alias','value'=>$user->alias,
                              'readonly'=>TRUE))?>
          <label for="password">password *</label> 
          <?=form_password(array('name' => 'password','id' => 'password'))?>
          <label for="password-confirm">password-confirm *</label> 
          <?=form_password(array('name'=>'password_confirm','id'=>'password-confirm'))?>

          <?=form_submit('submit','update')?>
        </form>

      </div>
      <div id="footer">
        CopyRignt &copy; 2009 <strong>TEAM-PLAY</strong> 
        <a href="http://github.com/admire93/play">Source code is available</a> under <a href="http://www.gnu.org/licenses/agpl-3.0.html">AGPL</a> 
      </div>
    </div>


</body>
</html>
