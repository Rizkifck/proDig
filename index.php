<?php
include("config.php");

$show_data = mysqli_query($connection, "SELECT * FROM datas");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
</head>
<style>
  /* .bf :hover {
    overflow: auto;
  } */
  ::-webkit-scrollbar {
    display: none;
  }
</style>

<body>
  <div id="x" class="c">
    <section id="nav-bar">
      <nav class="navbar">
        <div class=" container-fluid">
          <a class="navbar-brand" href="#">
            NineNine
          </a>
          <div class="nav-item dropdown mx-5">
            <a class="nav-link dropdown-toggle" role="button" style="margin-right: 20px;" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#x" id="p">Awal</a></li>
              <li><a class="dropdown-item" href="#satu">Tambah Data</a></li>
              <li><a class="dropdown-item" href="#dua">Lihat Data</a></li>
          </div>
        </div>
      </nav>
      <!-- <nav class="navbar bg-light">
 <div class="container">
   <a class="navbar-brand" href="#">
     <img src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
   </a>
 </div>
</nav> -->
    </section>

    <section id="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p class="promo-title">PROFIL DIGITAL card</p>
            <p>Modul website profil digital with framework and database by Bootstrap and SQL.</P>
            <a href="index.php"><img src="images/pngwing.com (6).png" style="opacity: 80%;" class="play-btn">View Modul</a>
          </div>
          <div class="col-md-6 text-center">
            <img src="images/home-.png" class="img-fluid">
          </div>
        </div>
      </div>

      <img src="images/wave1.png" id="satu" class="bottom-img">
    </section>

    <section style="display: flex; justify-content: center;">
      <div>
        <div id="dua" style="display: flex; justify-content: center;">
          <button type="submit" class="btn btn-outline-primary" id="add">Add +</button>
        </div>
        <!-- Data -->
        <div class="container mt-5 pb-5">
          <div class="card">
            <div class="card-header bg-info text-white">
              DataView
            </div>
            <div class="card-body">
              <div class="card-group">
                <?php while ($row = mysqli_fetch_assoc($show_data)) :  ?>
                  <div class="card" style="width: 255px; height: 430px;">
                    <div class="nav-item dropdown" style="position: absolute;">
                      <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="ed/edit.php?id=<?= $row["id_profil"] ?>" class="dropdown-item" id="more">Edit</a></li>
                        <li><a href="ed/hapus.php?id=<?= $row["id_profil"] ?>" onclick="return('Anda yakin ingin menghapus file ini?')" class="dropdown-item" id="more">Hapus</a></li>
                    </div>
                    <img src="images/profil/<?= $row["foto"] ?>" height="65%" class="card-img-top" alt="...">
                    <div class="card-body overflow-auto">
                      <h5 class="card-title">
                        <?= $row["nama"] ?>
                      </h5>
                      <hr>
                      <p class="card-text"><em>
                          <?= $row["bio"] ?>
                        </em></p>
                      <p class="card-text"><em>
                          <?= $row["alamat"] ?>
                        </em></p>
                      <p class="card-text"><em>
                          <?= $row["kelamin"] ?>
                        </em></p>
                      <p class="card-text"><em>
                          <?= $row["telepon"] ?>
                        </em></p>
                    </div>
                  </div>
                <?php endwhile ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
    $connection->close();
    ?>
    <footer class="py-3 mt-5 bg-primary">
      <div class="container px-5">
        <p class="m-0 text-center text-white small">Copyright &copy; NineNine 2023</p>
      </div>
    </footer>
  </div>
  <div id="loaders"></div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script>
    const loaders = document.getElementById("loaders")
    const c = document.getElementsByClassName("c");

    document.getElementById("add").addEventListener("click",
      function() {
        loaders.style.display = "block";
        c[0].style.filter = "blur(6px)";
        setTimeout(function() {
          window.location.href = "create-data.php";
          loaders.style.display = "none";
          c[0].style.filter = "none";
        }, 1150);
      });

    document.getElementById("p").addEventListener("click",
      function() {
        window.location.reload;
      });
  </script>
</body>

</html>