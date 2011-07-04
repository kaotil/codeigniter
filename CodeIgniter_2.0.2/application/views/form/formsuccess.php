<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>マイフォーム</title>
</head>
<body>

<h3>登録されました</h3>

<ul>
<?php foreach ($input as $item):?>

<li><?php echo $item; ?></li>

<?php endforeach;?>
</ul>

<p><?php echo anchor('form', '戻る'); ?></p>

</body>
</html>