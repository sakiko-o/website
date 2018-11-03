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
<title>Picture</title>

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
			<h1>Picture</h1>
			<hr>
			<div class = "mainp">
				<div class="grid">
          <a href = "picture_com.php"><img src="https://placehold.jp/100x100.png" alt="ポスター"></a>
        </div>
        <?php for($i = 0; $i < 10; $i++){?>
        <div class="grid">
          <img src="https://placehold.jp/100x100.png" alt="ポスター">
        </div>
      <?php } ?>

      </div>
    </div>
    </div>

  </div>

<footer>footer</footer>
</div>
</body>
</html>
