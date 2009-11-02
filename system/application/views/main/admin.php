<?=doctype()?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type"
          content="application/xhtml+xml;charset=UTF-8" />

    <title><?=$title?></title>
  </head>
  <body>
    <h1><?=$header?></h1>
    <?=form_open('diary/login')?>

      <?=form_fieldset('login');?>
        <?=form_input('alias')?>
        <?=form_password('password')?>
      <?=form_fieldset_close()?>

      <?=form_submit('submit','LOGIN')?>
    </form>
  </body>
</html>




