<?php
//Mysql
$dsn = 'mysql:dbname=tt_235_99sv_coco_com; host=localhost';
$user = 'tt-235.99sv-coco';
$password = 'P7uyRLwb';
$pdo = new PDO($dsn, $user, $password);

session_start();

if(!isset($_SESSION['name'])){
	header("Location: login.php?q=2");
	exit;
}
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<title>Community</title>

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
			<h1>Community</h1>
			<hr>
			<div class = "main">
				<p>
					<?php
					if(isset($_SESSION['name'])){
						//$username = $_SESSION['name']; //ユーザー名を取得
						//echo $username;
						$sql = 'SELECT * FROM mission6_main ORDER BY id';
						$result = $pdo -> query($sql);
						foreach($result as $row){
							$id = $row['id'];
							?>
							<div class = "idname">
								<?php echo $row['id'].'.'.'&nbsp';
											echo $row['name'].':'.'<br>';?>
							</div>
							<div class = "date">
								<?php echo $row['date'];?>
							</div>
							<br>
							<div class = "comment">
								<?php echo $row['comment'];?>
							</div>
							<br>
							<div class = "red">
							<a href = "reply.php?q=<?php echo $id; ?>">返信</a>
							<a href = "editer.php?q=<?php echo $id; ?>">編集</a>
							<a href = "delete.php?q=<?php echo $id; ?>">削除</a><br>
							</div>
							<hr>
							<?php
						}
					}?>
					<div class = "com">
					<a href = "main.php">コメントする</a>
					</div>
				</p>
			</div>
		</div>
		</div>

	</div>

<footer>footer</footer>
</div>
</body>
</html>
