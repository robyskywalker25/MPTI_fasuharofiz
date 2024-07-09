<?php 
session_start();
  //koneksi
$koneksi=new mysqli ("localhost","root","","tokompti");
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <style type="text/css">
       body { 

       }
       .judul, .subjudul{
        color: black;
       }

   </style>

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
             <h2 style="font-family:algerian" class="judul" ><strong> Admin Bakpia</strong></h2>
               
                <h3 class="subjudul">Login Admin</h3>
                 <br/>
            </div>
        </div>

         <div class="row ">     
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>Masukkan Username dan Password </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="user" placeholder="masukkan username dulu" />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                             <input type="password" class="form-control"  name="password" placeholder="masukan juga password" />
                                        </div>
                                    
                                     
                                     <button class="btn btn-primary" name="login">Masuk</button>
                                    <hr/>
                                  
                                    </form>
                                    <?php 
                                    if(isset($_POST['login']))
                                    {
                                       $ambil=$koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[password]'");
                                       $yangcocok =$ambil->num_rows;
                                       if($yangcocok==1)
                                       {
                                        $_SESSION['admin']=$ambil->fetch_assoc();
                                        echo "<div class='alert alert-info'>Login Sukses</div>";
                                        echo "<meta http-equiv='refresh' content='1;url=index.php'></meta>";
                                       }
                                       else
                                       {
                                         ?>

                                         <script type="text/javascript">
                                                alert("Login Gagal Username dan Password anda SALAH... SILAHKAN ULANGI LAGI ")
                                                window.location.href="login.php";
                                          </script>
                                        <?php
                                       }
                                     }
                                     ?>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
