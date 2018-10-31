<div class = "left">

  <div class = "member">
    <h1>MEMBERS</h1>
    <hr>
    <div class = "member2">
      <?php
      if(!isset($_SESSION['name'])){
      ?>
      <input class = "login" type = "button" onclick = "location.href = 'login.php' " value = "ログイン"><br>
      <input class = "regi" type = "button" onclick = "location.href = 'register.php' " value = "新規登録">
      <?php
      }
      if(isset($_SESSION['name'])){
        $username = $_SESSION['name']; //ユーザー名を取得
        echo $username;
      ?>
      <hr>
      <input class = "my" type = "button" onclick = "location.href = '#' " value = "マイページ"><br>
      <input class = "out" type = "button" onclick = "location.href = 'logout.php' " value = "ログアウト"><br>
      <?php
      }?>
    </div>
  </div>

  <div class = "sns">
    <table>
    <tr>
      <th><i class="fab fa-line line fa-3x"></i></th>
      <th><a href = "#">Line</a></th>
    </tr>
    <tr>
      <th><i class="fab fa-twitter-square twitter fa-3x"></i></th>
      <th><a href = "#">Twitter</a></th>
    </tr>
    <tr>
      <th><i class="fab fa-facebook-square face fa-3x"></i></th>
      <th><a href = "#">Facebook</a></th>
    </tr>
    <tr>
      <th>
        <div class = "insta">
        <i class="fab fa-instagram"></i>
        </div>
      </th>
      <th><a href = "#">Instagram</a></th>
    </tr>
    <tr>
      <th><i class="fab fa-youtube-square you fa-3x"></i></th>
      <th><a href = "#">You Tube</a></th>
    </tr>
    </table>
  </div>

</div>
