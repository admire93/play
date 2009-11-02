<?=doctype()?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>

    <meta http-equiv="Content-Type"
          content="application/xhtml+xml;charset=UTF-8" />

    <script type="text/javascript" 
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js">
    </script> 
    <?=js_load("jquery-ui-1.7.2.custom.min.js")?>
    <?=js_load("diary_datepicker.js")?>
    <?=css_load("jquery-custom-css/jquery-ui-1.7.2.custom.css")?>
    <?=css_load("diary.css")?>
    <title>Hello</title>
  </head>
  <body>
    <?=form_open('/diary/view')?>
      <label for='datepicker'>Date ::</label>
      <?=form_input(array('name' => 'date','id' => 'datepicker'))?>
      <?=form_submit('submit','view')?>
    </form>
    <?=anchor('diary/write','write')?>
    <?=anchor('diary/logout','logout')?>
    <?php if(!empty($diaries)): ?>
      <div class="diaries">
        <?php foreach($diaries as $diary): ?>
          <div class="author">
            <?=$diary->alias?>
          </div>
          <div class="created-at">
            <?=$diary->created_at?>
          </div>
          <p class="body">
            <?=markdown($diary->body)?>  
          </p>
          <div class="tag">
            Tag >  
            <?php foreach($this->tag->get_tags($diary->id) as $tag): ?>
              <?=htmlspecialchars($tag->body)?>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </body>
</html>




