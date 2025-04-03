<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	.center {
		position: absolute;
		top: 50%;
		left: 50%;
		width: 300px;
		height: 200px;
		margin: -100px 0 0 -100px;
		font-family: sans-serif;
		font-size: large;
	}
	</style>
	<title><?php if (isset($_GET['note'])) print $_GET['note']; ?></title>
</head>
<body onload="document.forms[0].password.focus();">
<div class="center">
<form method="POST">
  <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    ?>
	密码错误
  <?php
} ?>
	请输入密码:</br>
	<input type="password" name="password" autofocus>
	<button type="submit">确定</button>
	<p style="font-size: small">您需要输入密码以访问此页面<br><a href="<?php echo dirname($_SERVER['PHP_SELF']);?>">创建新笔记</a></p>
	<?php if ($allowReadOnlyView == "1") { ?>
		<p style="font-size: small"><a href="<?php echo strtok($_SERVER["REQUEST_URI"],'?') . "?view"; ?>">以只读模式查看笔记</a></p>
	<?php } ?>
</form>
</div>
</body>
</html>
