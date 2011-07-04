<html>
<head>
<title><?php echo $title;?></title>
</head>
<body>
<h1><?php echo $heading;?></h1>

<h3>Entry List</h3>

<ul>
<?php foreach ($entry as $item):?>

<li>id: <?php echo $item->id;?></li>
<li>title: <?php echo $item->title;?></li>
<li>content: <?php echo $item->content;?></li>

<?php endforeach;?>
</ul>
<?php echo $this->benchmark->elapsed_time();?>
</body>
</html>