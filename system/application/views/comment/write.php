<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />

  <title>comment-write</title>
</head>
<body>
<?=form_open('/comment/create/'.$this->uri->segment(3))?>

  <?=form_fieldset('Comment-write');?>
    <?=form_input(array('name' => 'body','id' => 'body'))?>
  <?=form_fieldset_close()?>

  <?=form_submit('submit','write')?>
</form>
</body>
</html>
