g?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <meta http-equiv="Content-Type"
         content="application/xhtml+xml;charset=UTF-8" />
  <script type="text/javascript" 
          src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js">
  </script> 
  <?=js_load('playPost.js')?>
  <title>play-board</title>
</head>
<body>
  <?=form_open_multipart('/post/create/'.$board_name,array('class'=>'post-form','id'=>'post-form'))?>

    <?=form_fieldset('Post-write');?>
      <?=form_textarea(array('name' => 'body','id' => 'body'))?>
    <?=form_fieldset_close()?>

    <?=form_fieldset('Post-file',array('id'=>'attach-file','class'=>'file'));?>
      <?=form_input(array('id'=>'file-name','name'=>'file_name'))?>
      <?=form_upload(array('id'=>'userfile','name'=>'userfile'))?>
    <?=form_fieldset_close()?>

    <?=form_fieldset('Post-tag');?>
      <?=form_input(array('name' => 'tag','id' => 'tag'))?>
    <?=form_fieldset_close()?>

    <?=form_submit(array('name'=>'submit','id'=>'submit'),'write')?>
  </form>
  
  <div class="posts" style="border:solid 1px #EEE; margin: 10px">
    <?php foreach($posts as $post): ?>
      <div class="post <?=$post->created_at?>">
        <div class="author"></div>
        <p class="body">Body:<?=markdown($post->body)?></p>
        <div class="tag">
          Tag:
          <?php foreach($this->tag->get_tags($post->id) as $tag):?>
            <?=$tag->body?>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
    <ul id="pager">
      <?php foreach($this->paging->pager($total_page,$selection) as $page): ?>
        <?php if(is_array($page)):?>
          <?php if(array_key_exists('first',$page)) { ?>
            <li class="first"><?=anchor('/play/board/'.$board_name.'/'.$page['first'],$page['first'])?></li>
          <?php } else if(array_key_exists('last',$page)) {?>

            <li class="last"><?=anchor('/play/board/'.$board_name.'/'.$page['last'],$page['last'])?></li>
          <?php } else if(array_key_exists('selected',$page)) {?>
            <li class="selected"><?=$page['selected']?></li>
          <?php } ?>
        <?php else: ?>
          <li><?=anchor('/play/board/'.$board_name.'/'.$page,$page)?></li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>
  
</body>
</html>
