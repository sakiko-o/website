<?php
//Mysql
$dsn = 'mysql:dbname=tt_235_99sv_coco_com; host=localhost';
$user = 'tt-235.99sv-coco';
$password = 'P7uyRLwb';
$pdo = new PDO($dsn, $user, $password);

session_start();
$delc = 0;

if(!isset($_SESSION['name'])){
	header("Location: login.php");
	exit;
}

if(isset($_SESSION['name'])){
	$id = $_GET['q'];
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<title>トップ</title>

<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
<link rel = "stylesheet" href = "style.css">
<link rel = "stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
<div class = "wrapper">
	<header>header</header>

	<?php require('./nav.php'); ?>

	<div class = "container">

	<?php require('./side.php'); ?>

		<div class = "right">
			<div class = "rblock">
				<h1>削除</h1>
				<hr>
				<div class = "main">
					<form action = "delete.php?q=<?php echo $id; ?>" method = "post">

						<p>パスワードを入力してください</p>

						<input tyape = "password" name = "delpass">
						<input type = "submit" value = "削除"><br><br>
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
//削除
if(!empty($_POST['delpass'])){
	$delpass = $_POST['delpass'];
	$delc = 1;

	$sql = 'SELECT * FROM mission6_main ORDER BY id';
	$result = $pdo -> query($sql);

	foreach($result as $row){
		if($row['id'] == $id){
			if($row['pass'] == $delpass || $delpass == "owner"){
				$delc = 2;
				$sql2 = "delete from mission6_main where id = $id";
				$result2 = $pdo -> query($sql2);


				header("Location: community.php");
			}
		}
	}

	if($delc == 1){
		echo "<script> alert('パスワードが間違っています');</script>" ;
	}
}
} ?>
