<?php
include("./conn.php");
date_default_timezone_set("Asia/Jakarta");
$id = $_GET['id'];

$query = "SELECT * FROM tbl_operator where id_operator='{$id}'";

$data = $conn->query($query);

while ($value = $data->fetch_array()){
    $nama_operator = $value['nama_operator'];
    $username = $value['username'];
    $password = $value['password'];
    $email = $value['email'];
}

if(isset($_POST['ubah'])){
    $nama_operator = $_POST['nama_operator'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $tgl = date('Y-m-d H:i:s', time());
    // insert into table operator
    $query = "UPDATE tbl_operator SET nama_operator='$nama_operator', username='$username', password='$password',email='$email', updated_at='$tgl' where id_operator='$id'";

    $update = $conn->query($query);

    if($update){
        ?>
        <script>
            alert("Berhasil mengubah data");
            window.location="index.php?hal=daftar_operator";
        </script>
        <?php
    }
}
?>


<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Operator</h3>
        </div>

        <form method="post" action="">
            <div class="card-body">
            <div class="form-group">
                    <label for="exampleInputEmail1">Nama Operator</label>
                    <input type="text" class="form-control" name="nama_operator" placeholder="Masukkan nama operator">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">username</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukkan username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukan password">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Masukkan email">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
</div>