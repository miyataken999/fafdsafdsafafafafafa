<?php
	//POST値
	$name = $_POST['yourname'];

	//個体識別情報
	$ua = $_SERVER['HTTP_USER_AGENT'];
	switch (career_type($ua)) {
		case 1:		//ドコモ
			$ssid = $_SERVER['HTTP_X_DCMGUID'];
			break;
		case 2:		//au
			$ssid = $_SERVER['HTTP_X_UP_SUBNO'];
			break;
		case 3:		//SB
			$ssid = $_SERVER['HTTP_X_JPHONE_UID'];
			break;
		case 4:		//EM
			$ssid = $_SERVER['HTTP_X_EM_UID'];
			break;
		default:	//他
			$ssid = false;
	}

	//CSVファイルに登録
	if ($ssid) {
		$fp = fopen("userdata.tsv","a+");
		fputs($fp,$ssid."\t".$name."\n");
		fclose($fp);
	}
	
	header("Content-Type: application/xhtml+xml");

	//キャリア判別
	function career_type($ua) {
		if (preg_match("/^DoCoMo/i",$ua)) {
			$career = 1;
		} elseif (preg_match("/^KDDI-|^UP\.Browser/i", $ua)) {
			$career = 2;
		} elseif (preg_match("/^J-PHONE|^Vodafone|^softbank|^MOT-/i", $ua)) {
			$career = 3;
		} elseif (preg_match("/emobile/i", $ua)) {
			$career = 4;
		} else {
			$career = 5;
		}
		return $career;
	}
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-Type" content="application/xhtml+xml; charset=UTF-8" />
</head>
<body>
<?php 
	if ($ssid) {
		echo '登録が完了しました。<br />';
		echo 'こちらより<a href="484_3.php">ログイン</a>ができます。';
	} else {	
		echo '登録に失敗しました。ユーザIDが通知になっているか設定を確認してください。';
	}
?>
</body>
</html>