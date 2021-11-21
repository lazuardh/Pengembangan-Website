<?php
include "koneksi.php";
$sql = "SELECT * FROM `crud`;";

?>

<?php
    if(isset($_GET['id'])){
        $query = mysqli_query($koneksi,"DELETE FROM crud WHERE id_crud='$_GET[id]'");
        echo "
        <script>
            alert('data berhasil di hapus ');
            document.location.href = 'lihat.php';
        </script>";
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPEL</title>
    <link rel="stylesheet" href="index.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
<body>
<?php
  session_start();
  if ($_SESSION['status']!="login") {
    # code...
    header("location: login.php?pesan=belum_login");
  }
  ?>
  <?php echo "<scrip>swal('Selamat, Anda Berhasil Login')</script>" ?>
    <!-- navbar -->
    <div class="navbar">
        <nav class="navbar navbar-light bg-light fixed-top">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">SIMPEL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">SIMPAN PELAJARAN</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="lihat.php">Lihat Repository</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                        <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
            </div>
        </nav>
    </div>

    <!-- label -->
    <div class="container-fluid label mt-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="lihat.html">Lihat Repository</a></li>
            </ol>
          </nav>
    </div>
    
    <!-- content -->
    <form action="lihat.php" method="get">
    <div class="lihatPelajaran">
        <div class="container mt-4">
            <legend>MATERI YANG TERSIMPAN</legend>
            <form class="navbar-form navbar-center" role="search">
                <div class="d-flex">
                    <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search" >
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
                <?php
                    if(isset($_GET['cari'])){
                      $cari = $_GET['cari'];
                      echo "<br><b>Hasil pencarian : ".$cari."</b>";
                    }
                    ?>
                <div class="mb-3">
                  
                    <table class="table table-hover mt-3">
                      <thead>
                        <tr>
                          <th scope="col">NO</th>
                          <th scope="col">NAMA MATERI PERKULIAHAN</th>
                          <th scope="col">FILE</th>
                          <th scope="col">MATA KULIAH</th>
                          <th scope="col">Download</th>
                        </tr>
                        <?php
                        if(isset($_GET['cari'])){
                          $cari = $_GET['cari'];
                          $squeri = mysqli_query($koneksi, "select * from crud where nama_materi like '%".$cari."%'");
                        }else{
                          $squeri = mysqli_query($koneksi, "select * from crud");
                        }
                        $no = 1;
                        while($d = mysqli_fetch_array($squeri)){
                        ?>  
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php echo $no++ ?></td> 
                          <td><?php echo $d["nama_materi"];?></td>
                          <td><?php echo $d["nama_file"];?></td>
                          <td><?php echo $d["select_menu"];?></td>
                          <td>
                          <a href='download.php?filename=<?php echo $d["nama_file"];?>' class="btn btn-primary">Download</a>
                          </td>
                          <td>
                          <a href='?id=<?php echo $d["id_crud"]?>' class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                  </table>
                  </form>
                </div>
            </form>
        </div>
    </div>
</body>
</html>