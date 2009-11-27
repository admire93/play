<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type"
           content="application/xhtml+xml;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>

    <script type="text/javascript" 
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js">
    </script> 
    <?=js_load('form.js')?>
    <?=js_load('play.js')?>

    <?=css_load('play.css')?>
    <title>play-board</title>
  </head>
  <body>
    <div id="wrap">
      <div id="header">
        <h1><?=anchor('/','Welcome to Play, Find your favorite song!')?></h1>
        <ul>
          <li><?=anchor('/post','Post',array('class'=>'post'))?></li>
          <li class="selected"><?=anchor('/play','Play',array('class'=>'play'))?></li>
          <li><?=anchor('/hit','Hit',array('class'=>'hit'))?></li>
        </ul>
      </div>
      <div id="body">
        <div id="container">
         <ul class="sub-menu">
            <li><?=anchor('/play/board','board')?></li> 
            <li><?=anchor('/play/new_board','new-board')?></li> 
            <li><?=anchor('/play/random','random')?></li> 
         </ul>
         
          <div class="posts">
            <?=form_open_multipart('/post/create/'.$board_name,array('class'=>'post-form'))?>

            <?=form_fieldset('Post-write');?>
              <?=form_label('body','post-area')?>
              <?=form_textarea(array('cols'=>80,'rows'=>8,'name' => 'body','id' => 'post-area'))?>

              <?=form_label('tag:','tag')?>
              <?=form_input(array('name' => 'tag','id' => 'tag'))?>

              <?=form_label('file-name:','file-name')?>
              <?=form_input(array('id'=>'file-name','name'=>'file_name'))?>
              <?=form_upload(array('id'=>'userfile','name'=>'userfile'))?>
            <?=form_fieldset_close()?>

            <?=form_submit(array('name'=>'submit','id'=>'submit'),'write')?>
          </form>
        
            <?php foreach($posts as $post): ?>
              <div class="post" id="<?=$post->created_at?>">
                <div class="author">
                  <?=anchor('/play/my/'.$post->author,$post->author)?>
                </div>
                <div class="time"><?=$post->created_at?></div>
                

                <div class="body"><?=markdown($post->body)?></div>

                <div class="tag">
                  <?php foreach($this->tag->get_tags($post->id) as $tag):?>
                    <?=anchor('/post/tag/'.$tag->body,$tag->body)?>
                  <?php endforeach; ?>
                </div>

                <div class="music">
                  <?php if($music=$this->music->find_by_post_id($post->id)): ?>

                      <span class="music-name">music: <?=$music->name?></span>

                      <?=form_open('/play/add_to_my/')?>
                        <?=form_hidden('music_id',$music->id)?>
                        <?=form_submit('submit','add')?>
                      </form>
                  <?php else: ?>
                    <span class="notice">There are no music.</span>
                  <?php endif; ?>
                </div>
                <div class="comments">
                  <?=anchor('/comment/write/'.$post->id,'comment-write',
                            array('class'=>'comment-write'))?>  
                  <?=anchor('/comment/view/'.$post->id,'comment-view',
                            array('class'=>'comment-view'))?>
                </div>
              </div>
            <?php endforeach;?>
            <ul id="pager">
              <?php foreach($this->paging->pager($total_page,$selection)as$page):?>
                <?php if(is_array($page)):?>

                  <?php if(array_key_exists('first',$page)): ?>
                    <li class="first"><?=anchor('/play/board/'.$board_name.'/'.$page['first'],$page['first'])?></li>
                  <?php elseif(array_key_exists('last',$page)): ?>
                    <li class="last"><?=anchor('/play/board/'.$board_name.'/'.$page['last'],$page['last'])?></li>
                  <?php elseif(array_key_exists('selected',$page)):?>
                    <li class="selected"><?=$page['selected']?></li>
                  <?php endif; ?>

                <?php else: ?>
                  <li><?=anchor('/play/board/'.$board_name.'/'.$page,$page)?></li>
                <?php endif; ?>

              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <div id="footer">
        CopyRignt &copy; 2009 <strong>TEAM-PLAY</strong> 
        <a href="http://github.com/admire93/play">Source code is available</a> under <a href="http://www.gnu.org/licenses/agpl-3.0.html">AGPL</a> 
      </div>
    </div>

  
  
</body>
</html>
