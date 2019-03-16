<html lang="en">
<head>
  <title>Aplikasi Sensus Penduduk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"href="css/bootstrap.css">
  <link rel="stylesheet"href="css/dashboard.css">
</head>
<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
	  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">SENSUS</a>
	  <ul class="navbar-nav px-3">
	    <li class="nav-item text-nowrap">
	    <?php
          session_start();
          if(isset($_SESSION['email'])){
         ?>
	      <a class="nav-link" href="logout.php">Log out</a>
	      <?php 
          }else{
          ?>
          <a class="nav-link" href="login.php">Log in</a>
          <?php
          }
          ?>
	    </li>
	  </ul>
	</nav>

	<div class="container-fluid">
	  <div class="row">
	    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
	      <div class="sidebar-sticky">
	        <ul class="nav flex-column">
	          <li class="nav-item">
	            <a class="nav-link" href="index.php">
	              <span data-feather="home"></span>
	              Home <span class="sr-only">(current)</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="index.php?p=datapenduduk">
	              <span data-feather="user"></span>
	              Data Penduduk
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="index.php?p=daerah">
	              <span data-feather="file"></span>
	              CRUD Daerah
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="index.php?p=penduduk">
	              <span data-feather="users"></span>
	              CRUD Penduduk
	            </a>
	          </li>
	        </ul>

	      </div>
	    </nav>

	    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	    <?php
	      if(isset($_SESSION['email']))
	        include 'main.php';
	      else
	        echo '<script>window.location.replace("login.php")</script>';
	    ?>
	    </main>
	  </div>
	</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/feather.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $(".dropdown-toggle").dropdown();
});
  feather.replace();
 $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});
</script>
</body>
</html>
