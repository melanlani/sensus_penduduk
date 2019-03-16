<html lang="en">
<head>
  <title>Aplikasi Sensus Penduduk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"href="css/bootstrap.css">
  <link rel="stylesheet"href="css/signin.css">
</head>
<body class="text-center">
    <form action="" method="post" class="form-signin">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
  <div class="checkbox mb-3">
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
  <a class="btn btn-lg btn-secondary btn-block" href="javascript:history.go(-1)">Back</a>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
<?php
if(isset($_POST['submit'])){
	include 'koneksi.php';
	$email = $_POST['email'];
	$password = $_POST['password'];

	$cek= mysql_query("SELECT * FROM users WHERE email='$email' AND password='$password'");
	$data= mysql_fetch_array($cek);
	$result= mysql_num_rows($cek);

	if($result==1){
	session_start();
		$_SESSION['email'] = $data['email'];

		header("Location:index.php");
	}else{
		echo "Salah Email/Password";
	}
}
?>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/feather.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $(".dropdown-toggle").dropdown();
});
  feather.replace();
</script>

</body>
</html>





