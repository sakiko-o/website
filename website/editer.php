<?php
//Mysql
$dsn = 'mysql:dbname=tt_235_99sv_coco_com; host=localhost';
$user = 'tt-235.99sv-coco';
$password = 'P7uyRLwb';
$pdo = new PDO($dsn, $user, $password);

session_start();

$passc = 0;

if(!isset($_SESSION['name'])){
	header("Location: login.php");
	exit;
}

if(isset($_SESSION['name'])){
	$userpass = $_SESSION['pass'];
	$id = $_GET['q'];

//編集
if(!empty($_POST['editpass'])){
	$editpass = $_POST['editpass'];
	$sql = 'SELECT * FROM mission6_main ORDER BY id';
	$result = $pdo -> query($sql);
	$passc = 1;
	foreach($result as $row){
		if($row['id'] == $id && $row['pass'] == $editpass){
			$editcom = $row['comment'];
			$passc = 2;
		}
	}
	if($passc == 1){
		echo "<script> alert('パスワードが間違っています');</script>" ;

	}
}
}
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
		<h1>編集</h1>
		<hr>
			<div class = "main">
			<form action ="editer.php?q=<?php echo $id; ?>" method = "post">

			<?php if(!empty($_POST['editpass'])){
							if($passc == 2){?>
								<label for = "comment">コメント : </label><br><br>
								<textarea name = "comment" value = "<?php echo $editcom; ?>"></textarea><br><br>
								<input type = "hidden" name = "editnum" value = "<?php echo $id; ?>">
							<?php }}

						if(empty($_POST['editpass']) || $passc == 1){ ?>
							<p>パスワードを入力してください</p>
							<input tyape = "password" name = "editpass">
							<input type = "hidden" name = "comment">	<br>
						<?php }?>
						<input type = "submit" value = "編集"><br><br>
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
//編集作業
if(isset($_SESSION['name'])){
if(!empty($_POST['editnum'])){
	//$id2 = $_POST['editnum'];
	$comment2 = $_POST['comment'];
	$date2 =  date("Y/m/d/ H:i:s");
	//$edipass = $_POST['pass'];

	$sql2 = 'SELECT * FROM mission6_main ORDER BY id';
	$result2 = $pdo -> query($sql2);

	foreach($result2 as $row2){
		if($row2['id'] == $id){
			$sql3 = "update mission6_main set name = '$username', comment = '$comment2', date = '$date2', pass = '$userpass' where id = $id";
			$result3 = $pdo -> query($sql3);
			header("Location: community.php");
		}
	}
}
}
?>
