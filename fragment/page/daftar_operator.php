<?php 
include("conn.php");

$data = $conn->query("SELECT id_operator, nama_operator, username,password , email, deleted_at is NULL FROM tbl_operator");

// print_r($data);
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Operator</h3>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Operator</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while($value = $data->fetch_array()){
                        ?>
                            <tr>
                                <td><?=$no;?></td>
                                <td><?=$value['nama_operator'];?></td>
                                <td><?=$value['username'];?></td>
                                <td><?=$value['email'];?></td>
                                <td>
                                    <a href="index.php?hal=edit_operator&id=<?=$value['id_operator'];?>" class="btn btn-sm btn-primary">
                                        <i class="far fa-edit"></i> 
                                        Edit
                                    </a>
                                    <a href="index.php?hal=hapus_operator&id=<?=$value['id_operator'];?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php
                        $no++;
                    }

                ?>
                
                
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nama_operator</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>