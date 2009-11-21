<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <meta http-equiv="Content-Type"
         content="application/xhtml+xml;charset=UTF-8" />
   <title>user-preference</title>
</head>
<body>
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

</body>
</html>
