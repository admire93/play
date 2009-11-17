<?=doctype()?>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml;charset=UTF-8" />

  <title>hit-board-list</title>
</head>
<body>
  <h1>hit-board-list</h1>
  <table>
    <thead>
      <tr>
        <th>board-title</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($hits as $hit): ?>
        <tr>
          <td><?=anchor('/hit/view/'.$hit->url_name,$hit->title)?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    </table>
  <?=anchor('/hit/write','write')?>
</body>
</html>
