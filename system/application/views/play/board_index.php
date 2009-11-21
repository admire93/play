<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />
  <title>play-board</title>
</head>
<body>
  <div id="wrap">
    <div id="search">
     <?=form_open('/play/search/');?>
       <?=form_fieldset('Search');?>
        <?=form_input('search','search')?>
       <?=form_fieldset_close()?>
       <?=form_submit('submit','submit')?>
     </form>
    </div>
    <div id="new-board">
      <h1>New board</h1>
      <ul>
        <?php foreach($new_boards as $new): ?>
          <li><?=anchor('/play/board/'.$new->url_name,$new->title)?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</body>
</html>
