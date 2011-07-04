<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>マイフォーム</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('form'); ?>

<h5>ユーザ名</h5>
<?php echo form_error('username'); ?>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />

<h5>パスワード</h5>
<?php echo form_error('password'); ?>
<input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>パスワードの確認</h5>
<?php echo form_error('passconf'); ?>
<input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<h5>メールアドレス</h5>
<?php echo form_error('email'); ?>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<div><input type="submit" value="送信" /></div>

<?php echo form_close(); ?>
<?php echo anchor('form/view', 'ユーザ一覧', 'title="ユーザ一覧"'); ?>

</body>
</html>