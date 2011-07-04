<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>マイフォーム</title>
</head>
<body>

<h3>確認</h3>

<ul>
<?php foreach ($input as $item):?>

<li><?php echo $item; ?></li>

<?php endforeach;?>
</ul>

<?php echo form_open('form/regist', '', $input); ?>

<div>
<?php echo form_button('back', '戻る', 'onClick="history.back();"'); ?>
<?php echo form_submit('', '登録'); ?>
</div>

<?php echo form_close(); ?>

</body>
</html>