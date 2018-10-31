<?php
//Mysql
$dsn = 'mysql:dbname=tt_235_99sv_coco_com; host=localhost';
$user = 'tt-235.99sv-coco';
$password = 'P7uyRLwb';
$pdo = new PDO($dsn, $user, $password);

$mysql = "CREATE TABLE mission6_regi "
. "("
. "id INT,"
. "name char(32),"
. "mail varchar(20),"
. "pass varchar(20)"
. ");" ;
$stmt = $pdo -> query($mysql);
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<title>新規登録</title>

<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
<link rel = "stylesheet" href = "style.css">
<link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
	<div class = "wrapper">
		<header>header</header>

		<?php require('./nav.php'); ?>

		<div class = "container">

			<div class = "right">
				<div class = "rblock">
					<div class = "section">
					<form action ="register.php" method = "post">
					<h1>新規登録フォーム</h1>
					<br>
					<div class = "main">
						<div class = "reg">
							<div class = "reg2">
						<label for = "user">ニックネーム</label><br>
						<input type = "text" name = "name" ><br><br>

						<label for = "adress">メールアドレス</label><br>
						<input type = "email" name = "mail"><br><br>

						<label for = "pwd">パスワード</label><br>
						<input type = "password" name = "pass"><br><br>
					</div>
						<input type = "submit" value = "新規登録"><br>
						<br>
						<div class = "com">
							<a href = "login.php">ログインはこちら</a>
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
//会員登録
if(!empty($_POST['name']) && !empty($_POST['pass']) && !empty($_POST['mail'])){

	$sqlc = 'SELECT * FROM mission6_regi ORDER BY id';
	$resc = $pdo -> query($sqlc);
	$count = 0;
	$id = 0;
	$num = 0;

	foreach($resc as $rowc){
		$count = $rowc['id'];
		if($rowc['name'] == $_POST['name']){
			echo "このユーザー名はすでに使われています";
			echo "<br>";
			$num += 1;
		}

		if($rowc['mail'] == $_POST['mail']){
			echo "このメールアドレスはすでに使われています";
			$num +=1;
		}

	}
	$id = $count + 1;

	if($num == 0){
	$sql = $pdo -> prepare("INSERT INTO mission6_regi (id, name, mail, pass) VALUES(:id, :name, :mail, :pass)");
	$sql -> bindValue(':id', $id, PDO::PARAM_INT);
	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
	$sql -> bindParam(':mail', $mail, PDO::PARAM_STR);
	$sql -> bindParam(':pass', $pass, PDO::PARAM_STR);

	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	$sql -> execute();

	echo"会員登録しました";
	}
}

?>
