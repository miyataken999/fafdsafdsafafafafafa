<?php
	//セッションスタート
	session_start();

	//Content-Typeヘッダー
	header("Content-Type: application/xhtml+xml");
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-Type" content="application/xhtml+xml; charset=UTF-8" />
</head>
<body>
<?php

	//セッション変数のセット
	$_SESSION['PHP500'] = "秀和システム";
	
	echo 'セッションID:'.session_id().'<br />';
	echo 'セッション名:'.session_name().'<br />';
	echo 'リンクテスト：<a href="482_3.php">セッションIDが引き継がれます</a><br /><hr />';

?>
<a href="482_3.php">ここでもセッションIDが引き継がれます</a>
</body>
</html>