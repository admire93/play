<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />


  <title>send-email</title>
</head>
<body>
<?=validation_errors()?>

<?=form_open('/user/send_email')?>

  <?=form_fieldset('send-email');?>
    <label for="email">email *</label> 
    <?=form_input(array('name' =>'email','id' => 'email'))?>
  <?=form_fieldset_close()?>

  <?=form_submit('submit','send-email')?>
</form>
</body>
</html>
