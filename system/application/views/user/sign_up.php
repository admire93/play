<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />


  <title><?=$title?></title>
</head>
<body>
<?=validation_errors()?>
<?=form_open('/user/create/'.$ticket)?>

  <?=form_fieldset('Sign UP');?>
    <label for="alias">alias *</label> 
    <?=form_input(array('name' =>'alias','id' => 'alias'))?>
    <label for="email">email *</label> 
    <?=form_input(array('name' => 'email','id' => 'email',
                        'value'=>$email,'readonly'=>TRUE))?>
    <label for="password">password *</label> 
    <?=form_password(array('name' => 'password','id' => 'password'))?>
    <label for="password-confirm">password-confirm *</label> 
    <?=form_password(array('name'=>'password_confirm','id'=>'password-confirm'))?>

  <?=form_fieldset_close()?>

  <?=form_submit('submit','regester')?>
</form>
</body>
</html>
