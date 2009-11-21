<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />

  <title>hit-post</title>
</head>
<body>
  <h1>hit-post</h1>

  <h2><?=$hit->title?></h2>
  <p class="body"><?=$hit->body?></p> 


  <?=form_open('/hit/idea_create/')?>
    <?=form_fieldset('idea-agree');?>
      <?=form_hidden('board',$this->uri->segment(3))?>
      <?=form_hidden('title',$hit->title)?>
      <?=form_hidden('idea','agree')?>
      <?=form_input(array('name'=>'body','id'=>'body'))?>    
    <?=form_fieldset_close()?>
    <?=form_submit('submit','write')?>
  </form>

  <?=form_open('/hit/idea_create/')?>

    <?=form_fieldset('idea-disagree');?>
      <?=form_hidden('board',$this->uri->segment(3))?>
      <?=form_hidden('title',$hit->title)?>
      <?=form_hidden('idea','disagree')?>
      <?=form_input(array('name'=>'body','id'=>'body'))?>    
    <?=form_fieldset_close()?>
    <?=form_submit('submit','write')?>

  </form>

  <div id="idea_posts">
    <?php foreach($this->hit->get_idea_posts($hit->id) as $idea): ?>
      <div class ="idea_post<?=$idea->agree?>">
        <?php if($idea->agree):?>
          <span>+</span>
        <?php else: ?>
          <span>-</span>
        <?php endif;?>
        <div><?=$idea->alias?></div> 
        <p>
          <?=$idea->body?>
        </p>
      </div>
    <?php endforeach; ?>
  </div>

</body>
</html>
