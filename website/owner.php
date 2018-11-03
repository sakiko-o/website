<?php
//Mysql
$dsn = '';
$user = '';
$password = '';
$pdo = new PDO($dsn, $user, $password);

session_start();
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<title>管理者ページ</title>
</head>
<body>
<form action ="mission_6_owner.php" method = "post">
<h1>管理者ページ</h1>

<input type = "text" name = "name" placeholder = "ユーザー名"><br>
<input tyape = "password" name = "pass" placeholder = "パスワード"><br>
<input type = "submit" name = "login" value = "ログイン"><br>
<a href = "mission_6_register.php">TOPページへ</a>

</form>
</body>
</html>

<?php
//ログイン
$count = 0; 
if(isset($_POST['login'])){
	if(!empty($_POST['name']) && !empty($_POST['pass'])){

		$name = $_POST['name'];
		$pass = $_POST['pass'];
	
		if($name == "owner" && $pass == "owner"){
			$_SESSION['name'] = $row['name'];
			$_SESSION['pass'] = $row['pass'];
			header("Location: mission_6_top.php");
			$count = 1;
		}
		
		if($count == 0){
			echo "ユーザー名またはパスワードが正しくありません。";
		}
	}
	else{
		echo "ユーザー名またはパスワードが正しくありません。";
	}
}
?>
