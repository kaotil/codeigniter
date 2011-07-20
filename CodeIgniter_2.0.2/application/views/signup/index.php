<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>サインアップ</title>
</head>
<body>

<h2>Signup</h2>
<?php
echo form_open('signup/regist');
echo form_label('名前','user_name');
$ndata = array('name' => 'user_name', 'id' => 'id', 'size' => '25');
echo form_input(array('name' => 'user_name', 'id' => 'id', 'size' => '25'));
echo "<br>";

echo form_label('Eメール','email');
echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '25'));
echo "<br>";

echo form_label('パスワード','pass');
echo form_input(array('name' => 'pass', 'id' => 'pass', 'size' => '25'));
echo "<br><br>";

echo form_submit('submit','登録');
echo form_close();

?>

</body>
</html>