<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT">
<title><?php echo $title ?></title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css" type="text/css" media="screen" />
</head>
<body id="globalnavi-sample">
<div id="wrapper">
<div id="header">
<h5>
<?php
if ($this->dx_auth->is_logged_in()) {
    echo anchor('auth/logout', 'ログアウト');
} else {
    echo anchor('auth/login', 'ログイン') . " | " . anchor('auth/register', '新規登録');
}
?>
</h5>
<h1><?php echo anchor('top/index', 'Sample'); ?></h1>
<p><strong>サンプル</strong></p>
<p>サンプル</p>
</div>
