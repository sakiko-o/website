<?php
//Mysql
$dsn = '';
$user = '';
$password = '';
$pdo = new PDO($dsn, $user, $password);

session_start();

if(!isset($_SESSION['name'])){
	header("Location: login.php");
	exit;
}

if(isset($_SESSION['name'])){

$mysql = "CREATE TABLE mission6_main "
. "("
. "id INT,"
. "name char(32),"
. "comment TEXT,"
. "date TEXT,"
. "pass varchar(20)"
. ");" ;
$stmt = $pdo -> query($mysql);

//ユーザー名、パスを取得
$username = $_SESSION['name'];
$userpass = $_SESSION['pass'];
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<title>コメント</title>

<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
<link rel = "stylesheet" href = "style.css">
<link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity = "sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>

	<div class = "wrapper">
		<header>header</header>

		<?php require('./nav.php'); ?>

		<div class = "container">

		<?php require('./side.php'); ?>

			<div class = "right">
				<div class = "rblock">
				<h1></h1>
				<hr>
				<div class = "main">

					<form action ="main.php" method = "post">

						<label for = "comment">コメント</label><br><br>
						<textarea name = "comment"></textarea><br><br>
						<input type = "submit" value = "送信"><br><br>
						<div class = "com">
						<a href = "community.php">BACK</a>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>

	<footer>footer</footer>
</div>

</body>
</html>

<?php
//新規投稿
if(!empty($_POST['comment'])){
	$sqlc = 'SELECT * FROM mission6_main ORDER BY id';
	$resc = $pdo -> query($sqlc);
	$count = 0;
	$id = 0;
	foreach($resc as $rowc){
		$count = $rowc['id'];
	}
	$id = $count + 1;

	$sql = $pdo -> prepare("INSERT INTO mission6_main (id, name, comment, date, pass) VALUES(:id, :name, :comment, :date, :pass)");
	$sql -> bindValue(':id', $id, PDO::PARAM_INT);
	$sql -> bindValue(':name', $username, PDO::PARAM_STR);
	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
	$sql -> bindParam(':date', $date, PDO::PARAM_STR);
	$sql -> bindValue(':pass', $userpass, PDO::PARAM_STR);

	$comment = $_POST['comment'];
	$date =  date("Y/m/d/ H:i:s");
	$sql -> execute();
	header("Location: community.php");
	}
}
?>
