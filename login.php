<?php 
session_start();
include 'includes/function.php';
$db = new database();
if(isset($_POST["login"])){
	
	$password =$_POST["pass"];
	$user = $_POST["user"];
	$count = $db->select("admin","`username` = '".$user."'","count");
	if($count == 1 ){
		$info = $db->select("admin","`username` = '".$user."'","fetch");
		if(password_verify($password,$info["password"])){
			$_SESSION["username"] = $info["username"];
			header('location:index.php');
			
			exit();
		}
		else{
			$error = 2;
			echo $error;
		}
		
	}
	else{
		$error = 1;
		echo $error;
	}
	
}
?>
<!DOCTYPE html>
<html>
<head lang="fa">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود</title>

    <!-----Material Design Bootstrap Files --->
    <link rel="stylesheet" href="includes/mdb/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/mdb/css/mdb.min.css">

    <!------Font-awesome Fonts Css ----->
    <link rel="stylesheet" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css">

    <!------Fonts-Material design ----->
    <link rel="stylesheet" href="plugins/material-desing-icons/material-icons.css">
    
    <!----Theme Styles --->
    <link rel="stylesheet" href="includes/css/customize.css">
    <link rel="stylesheet" href="includes/css/themes.css">
    <link rel="stylesheet" href="includes/css/style.css">

</head>
<body >


    <!---- Container ----->
    <section class="container">

        <div class="row">
            <div class="col-lg-6 pull-lg-3 col-sm-12 col-md-8 pull-md-2">
                <center>
                    <img src="includes/dotweb_big.png" class="logo" />
                </center>
                <div class="card">
                    <div class="card-block">
                        <form action="login.php" method="post">
                            <p class="text-center">
                               ورود به پنل مدیریت
                            </p>
                            <div class="form-group md-form">
                                <i class="fa prefix fa-user"></i>
                                <input type="text" id="email" class="form-control" name="user">
                                <label for="email">نام کاربری</label>
                            </div>
                            <div class="form-group md-form">
                                <i class="fa prefix fa-lock"></i>
                                <input type="password" id="password" class="form-control" name="pass">
                                <label for="password">رمز عبور</label>
                            </div>
                            <div class="form-group">
                                <center>
                                    <button type="submit" class="btn cyan" name="login">ورود</button>
                                    
                                    
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--- JQuery (necessary File) --->
    <script type="text/javascript" src="includes/js/jquery-3.1.1.min.js"></script>

    <!--Material Design Bootstrap  Js Files ---->
    <script type="text/javascript" src="includes/mdb/js/tether.min.js"></script>

    <script type="text/javascript" src="includes/mdb/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="includes/mdb/js/mdb.min.js"></script>


    <!------ Theme Script --->
    <script type="text/javascript" src="includes/js/admin.js"></script>


</body>
</html>