<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8">
<title>ログアウト</title>

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
					<form action ="logout.php" method = "post">
					<h1></h1>
						<div class = "main">
						<?php
							if(!isset($_SESSION['name'])){
								echo "ログアウトしました";
							}?>
							<br><br>
							<div class = "com">
							<a href = "top.php">TOP</a>
						</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<footer></footer>
	</div>
</body>
</html>
