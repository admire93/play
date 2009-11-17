<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />

  <title>hit-board-write</title>
</head>
<body>
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

      <label for="body">hit posting :</label>
      <?=form_textarea(array('name' => 'body', 'id' => 'body'))?>
    
    <?=form_fieldset_close()?>

    <?=form_submit('submit','write')?>
  </form>

</body>
</html>
