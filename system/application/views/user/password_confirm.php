<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <meta http-equiv="Content-Type"
         content="application/xhtml+xml;charset=UTF-8" />
  <script type="text/javascript" 
          src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js">
  </script> 
  <title>User Preference</title>
</head>
<body>
  <?=form_open('/user/my/'.$this->uri->segment(3))?>

    <?=form_fieldset('password-confirm');?>
      <?=form_password('password')?>
    <?=form_fieldset_close()?>

    <?=form_submit('submit','confirm')?>
  </form>
</body>
