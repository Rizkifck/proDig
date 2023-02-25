<?php
include("../config.php");

$id = $_GET["id"];

function deleteData($id) {
    global $connection;
    mysqli_query($connection,"DELETE FROM datas WHERE id_profil = $id");
    return mysqli_affected_rows($connection);
}

if(deleteData($id) > 0){
    echo'
        <script>
            alert("data berhasil dihapus<:")
            document.location.href = "../index.php"
        </script>';
}

?>