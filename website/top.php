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
<title>トップ</title>

<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
<link rel = "stylesheet" href = "style.css">
<link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
<div class = "wrapper">
	<header>header</header>

	<?php require('./nav.php'); ?>

	<div class = "container">

	<?php require('./side.php'); ?>

		<div class = "right">
			<div class = "rblock">
			<h1>Home</h1>
			<hr>
				<div class = "main">
					<ul>
						<p><概要></p>
							<ul>
								<li>会員限定サイト(ファンクラブサイト)</li>
								<li>ユーザー：ファン 1,000人以上</li>
								<li>画像・動画の閲覧とコメント返信、掲示板利用</li>
							</ul>

							<br>
						<p><利用方法></p>
							<ol>
								<li>新規登録</li>
								<li>ログイン</li>
								<li>Picture：画像クリック→画像拡大、コメント返信・編集・削除<br>
										Community：掲示板　コメント返信・編集・削除</li>
								<li>ログアウト</li>
							</ol>
							<br>
							<div class = "string">※画像拡大、掲示板以外は登録なしで利用可</div>

						<br>
					<p><工夫点></p>
						<ul>
							<li>使いやすさ重視</li>
							<li>同一のメールアドレス、ニックネームでは重複して登録できない</li>
							<li>未ログイン状態で会員限定ページへ進むと、自動的にログイン画面へ</li>
							<li>ログイン後は直近のページに自動的に移動</li>
							<li>画像の投稿は管理者のみ</li>
							<li>掲示板での削除は、投稿者本人＋管理者</li>
						</ul>

						<br>
					<p><今後の展望></p>
						<ul>
							<li>データベースでのパスワードの保存の仕方(暗号化)</li>
							<li>画像同様に動画ページも作成</li>
							<li>掲示板でスレッドが立てられるように</li>
							<li>SNS連携</li>
							<li>より見やすく使いやすく</li>
						</ul>

				</div>
			</div>
		</div>

	</div>

	<footer>footer</footer>
</div>
</body>
</html>
