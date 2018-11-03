<?php
//Mysql
$dsn = '';
$user = '';
$password = '';
$pdo = new PDO($dsn, $user, $password);

session_start();

$id = $_GET['q'];
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<title>ログイン</title>

<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
<link rel = "stylesheet" href = "style.css">
<link rel = "stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body>
	<div class = "wrapper">
		<header>header</header>

		<?php require('./nav.php'); ?>

		<div class = "container">
			<div class = "right">
				<div class = "rblock">
					<div class ="section">
					<form action ="login.php?q=<?php echo $id; ?>" method = "post">
						<h1>ログインフォーム</h1>
						<br>
						<div class = "main">
							<div class = "reg">
								<div class = "reg2">
							<input type = "text" name = "name" value = "ユーザー名"><br><br>
							<input tyape = "email" name = "mail" placeholder = "メールアドレス"><br><br>
							<input tyape = "password" name = "pass" placeholder = "パスワード"><br><br>
						</div>
							<input type = "submit" name = "login" value = "ログイン"><br>
							<br>
							<div class = "com">
							<a href = "register.php">新規登録はこちら</a>
							</div>
						</div>
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>
		<footer></footer>
	</div>
</body>
</html>

<?php
//ログイン
$count = 0;
if(isset($_POST['login'])){  //ログインボタンを押したら↓
	if(!empty($_POST['mail']) && !empty($_POST['pass'])){

		$mail = $_POST['mail'];
		$pass = $_POST['pass'];

		$sql = 'SELECT * FROM mission6_regi ORDER BY id';
		$res = $pdo -> query($sql);

		foreach($res as $row){
			if($mail == $row['mail'] && $pass == $row['pass']){
				$_SESSION['name'] = $row['name'];
				$_SESSION['pass'] = $row['pass'];
				if($id == 1){
					header("Location: picture_com.php");
				}
				else if($id == 2){
					header("Location: community.php");
				}
				else{
					header("Location: top.php");
				}
				$count = 1;
			}
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
