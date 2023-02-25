<?php

include("config.php");

function imageData()
{

    $nameFile = $_FILES["image_name"]["name"];
    $tempName = $_FILES["image_name"]["tmp_name"];
    $error = $_FILES["image_name"]["error"];

    // check if no images are uploaded
    if ($error === 4) {
        echo "please upload image!";
    }

    // check extension image
    $extension = ["jpg", "png", "jpeg", "jfif"];
    $extensionImage = explode(".", $nameFile);
    $extensionImage = strtolower(end($extensionImage));

    if (!in_array($extensionImage, $extension)) {
        echo "this file not image";
    }

    // change name image from default to random string
    $newName = uniqid();
    $newName .= ".";
    $newName .= $extensionImage;
    
    move_uploaded_file($tempName, 'images/profil/' . $newName);

    return $newName;
}

function createMenu($data)
{

    global $connection;

    $nama = $data["nama"];
    $bio = $data["bio"];
    $alamat = $data["alamat"];
    $kelamin = $data["kelamin"];
    $telepon = $data["telepon"];
    $image_name = imageData();

    if (!$image_name) {
        return false;
    }

    // var_dump($image_name);
    // die;
    mysqli_query($connection, "INSERT INTO datas VALUES(
        '',
        '$nama',
        '$bio',
        '$alamat',
        '$kelamin',
        '$telepon',
        '$image_name'
    )");

    return mysqli_affected_rows($connection);
}

if (isset($_POST["submit"])) {
    if (createMenu($_POST) > 0) {
        header('location: index.php');
        echo "
        <script>
        alert('data berhasil di tambahkan')
        </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        #loaders {
            display: none;
            width: 55px;
            height: 55px;
            position: fixed;
            border-top: 7px solid rgb(8, 101, 159);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            z-index: 19;
            animation: 0.5s spin infinite linear;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .lainnya {
            width: 45%;
        }
    </style>
</head>

<body>
    <nav class="nav">

    </nav>

    <div class="container mt-5 lainnya c" id="blur">
        <div class="card">
            <div class="card-header  bg-info text-white">
                Profil
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>
                            Nama
                        </label>
                        <input type="text" name="nama" class="form-control mt-1" placeholder=" Nama" required>
                        </input>
                    </div>
                    <div class="form-group mt-3">
                        <label>
                            Bio
                        </label>
                        <textarea name="bio" class="form-control mt-1" placeholder=" Bio"> </textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label>
                            Alamat
                        </label>
                        <textarea name="alamat" class="form-control mt-1" placeholder=" Alamat"> </textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label>
                            JenisKelamin
                        </label>
                        <select class="form-control" name="kelamin">
                            <option></option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        </input>
                    </div>
                    <div class="form-group mt-3">
                        <label>
                            NoTelepon
                        </label>
                        <input type="text" name="telepon" class="form-control mt-1" placeholder=" Telepon" required>
                        </input>
                    </div>
                    <div class="form-group mt-3">
                        <label>
                            Foto
                        </label>
                        <input type="file" class="form-control" id="foto" name="image_name">

                    </div>
                    <div class="d-flex">
                        <button type="submit" class=" btn btn-success mt-3" id="submit" name="submit">Simpan</button>
                        <button type="button" class=" btn btn-danger mt-3" style="margin-left: 70%;" id="keluar">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="loaders"></div>

    <script>
        const loaders = document.getElementById("loaders");
        const c = document.getElementsByClassName("c");

        document.getElementById("keluar").addEventListener("click",
            function() {
                loaders.style.display = "block"
                c[0].style.filter = "blur(6px)";
                setTimeout(function() {
                    window.location.href = "index.php";
                    loaders.style.display = "none"
                    c[0].style.filter = "none";
                }, 1150);
            });
    </script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>