<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>マイフォーム</title>
<script src="/codeigniter/js/jquery-1.6.1.min.js" type="text/javascript"></script>
<script src="/codeigniter/js/jquery.autopager-1.0.0.js" type="text/javascript"></script>
</head>
<body>

<h3>ユーザ一覧</h3>
  <script type="text/javascript">
    $(function() {
        $.autopager();
    });
  </script>

  <div class="content">
    <p><?php echo $page; ?>ページ目のコンテンツ<br>Contents of page 1</p>
  </div>
  <a href="http://localhost/codeigniter/index.php/form/page/<?php echo $page+1; ?>" rel="next">次のページ / Next</a>
</body>
</html>