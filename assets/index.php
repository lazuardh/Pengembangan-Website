 <!-- sweetalert -->
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "koneksi.php";
if (isset($_POST['upload'])) {
  $directory = "storage/";
  $nmateri = $_POST['materi'];
  $file = $_FILES['file']['name'];
  move_uploaded_file($_FILES['file']['tmp_name'],$directory.$file);
  $select = $_POST['pilih'];
  $sql = "INSERT INTO crud (nama_materi, nama_file, select_menu) VALUES
  ('$nmateri','$file','$select')";
  $hasil = mysqli_query($koneksi,$sql);
  echo "<script>
  alert('Data berhasil di upload');
  document.location.href='index.php';
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
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
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
              <li class="breadcrumb-item active" aria-current="page">Lihat Repository</li>
            </ol>
          </nav>
    </div>

    <div class="repo">
      <p><a href="lihat.php"><span  class="btn btn-primary">Lihat Repository</span></a></p>
    </div>
    
    <!-- content -->
    <div class="inputPelajaran">
        <div class="container mt-5">
            <form action="" method="POST" enctype="multipart/form-data">
                <fieldset>
                  <legend>Pelajaran yang ingin anda simpan</legend>
                  <div class="mb-3">
                    <label for="TextInput" class="form-label">Materi Perkuliahan</label>
                    <input type="text" id="TextInput" name="materi" class="form-control" placeholder="input materi perkuliahan">
                  </div>
                  <div class="mb-3">
                    <label for="TextInput" class="form-label">Masukan File</label>
                    <input type="file" name="file" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="disabledSelect" class="form-label">select menu</label>
                    <select id="disabledSelect" name="pilih"class="form-select">
                      <option>Basis Data</option>
                      <option>Dasar Pemrograman</option>
                      <option>Pengembangan WEB</option>
                      <option>Pengembangan Mobile</option>
                    </select>
                  </div>
                  <!-- <div class="mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="FieldsetCheck">
                      <label class="form-check-label" for="FieldsetCheck">
                        Can't check this
                      </label>
                    </div>
                  </div> -->
                 <input type="submit" class="btn btn-primary"  name="upload" value="Upload"/>
                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </fieldset>
              </form>
        </div>
    </div>

    <!-- quoutes -->
    <div>
        <figure class="text-center mt-5">
            <blockquote class="blockquote">
              <p>Siapa yang menjauhkan diri dari sifat suka mengeluh <br> maka ia mengundang kebahagiaan.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
              Someone famous in <cite title="Source Title">Abu Bakar Assidiq</cite>
            </figcaption>
          </figure>
    </div>

    <!-- footer -->
    <footer class="bg-light text-center text-white">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a
            class="btn btn-primary btn-floating m-1"
            style="background-color: #3b5998;"
            href="#!"
            role="button"
            ><i class="fab fa-facebook-f"></i
          ></a>
    
          <!-- Twitter -->
          <a
            class="btn btn-primary btn-floating m-1"
            style="background-color: #55acee;"
            href="#!"
            role="button"
            ><i class="fab fa-twitter"></i
          ></a>
    
          <!-- Google -->
          <a
            class="btn btn-primary btn-floating m-1"
            style="background-color: #dd4b39;"
            href="#!"
            role="button"
            ><i class="fab fa-google"></i
          ></a>
    
          <!-- Instagram -->
          <a
            class="btn btn-primary btn-floating m-1"
            style="background-color: #ac2bac;"
            href="#!"
            role="button"
            ><i class="fab fa-instagram"></i
          ></a>
    
          <!-- Linkedin -->
          <a
            class="btn btn-primary btn-floating m-1"
            style="background-color: #0082ca;"
            href="#!"
            role="button"
            ><i class="fab fa-linkedin-in"></i
          ></a>
          <!-- Github -->
          <a
            class="btn btn-primary btn-floating m-1"
            style="background-color: #333333;"
            href="#!"
            role="button"
            ><i class="fab fa-github"></i
          ></a>
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->
    
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="#">Habbyan Lazuard</a>
      </div>
      <!-- Copyright -->
    </footer>
      
</body>
</html>