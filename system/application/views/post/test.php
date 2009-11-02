<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />

  <title>{title}</title>
</head>
<body>
<?=form_open('/post/test_create')?>

  <?=form_fieldset('Post-write');?>
    <?=form_textarea(array('name' => 'body','id' => 'body'))?>
  <?=form_fieldset_close()?>
  
  <?=form_fieldset('Post-tag');?>
    <?=form_input(array('name' => 'tag','id' => 'tag'))?>
  <?=form_fieldset_close()?>

  <?=form_submit('submit','write')?>
</form>
</body>
</html>
