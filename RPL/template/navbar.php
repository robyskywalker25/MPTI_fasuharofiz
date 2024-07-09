<nav class="navbar navbar-expand-lg  navbar-light fixed-top fixed " style="background-color: #918e91;            font-weight:bold;">
      <div class="container">


      <div class="logo mr-5" >
      <h2 style="font-family: monotype corsiva; font-size: 40px; font-weight: bold; color: white; ">Bakpia</h2>
      </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mr-5">
              <li class="nav-item active">
                <a style="color: white;font-weight:bold;  " class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item active">
                <a style="color: white;font-weight:bold;  "  class="nav-link" href="keranjang.php">Keranjang<span class="sr-only">(current)</span></a>
              </li>

              <!-- jk sudah login-->
             <?php if (isset($_SESSION["pelanggan"])): ?>

              <li class="nav-item active">
                <a style="color: white;font-weight:bold;  " class="nav-link" href="riwayat.php">Riwayat<span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item active">
                <a style="color: white;font-weight:bold;  "  class="nav-link" href="editprofile.php">Profile<span class="sr-only">(current)</span></a>
              </li> 

              <li class="nav-item active">
                <a style="color: white;font-weight:bold;  "  class="nav-link" href="logout.php">LogOut<span class="sr-only">(current)</span></a>
              </li>
              

              <!-- selain itu(belum login)-->
               <?php else: ?>

              <li class="nav-item active">
                <a style="color: white;font-weight:bold;  " class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item active">
                <a style="color: white;font-weight:bold;  "  class="nav-link" href="daftar.php">Daftar<span class="sr-only">(current)</span></a>
              </li> 
                   
                  
               <?php endif ?>
                 
              
            </ul>

            <form class="form-inline my-2 my-lg-0 mr-2 ml-2 mt-2" action="pencarian.php" method="get">
              <input class="form-control mr-sm-2" type="text" placeholder="Cari" name="keyword" aria-label="Cari">
              <button class="btn btn-success my-2 my-sm-0" type="submit">Cari</button>
            </form>          
  </nav>