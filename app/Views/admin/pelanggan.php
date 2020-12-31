<?php echo $this->extend('admin/template') ?>

<?php echo $this->section('konten') ?>

    <div class="container">
        <h2 class="my-4 text-center">Daftar Pelanggan</h2>
        
        <?php 
            $session = session();
            $kosong = $session->getFlashdata('kosong');
        ?>
        
        <?php if($kosong){ ?>
            <div class="my-3 alert alert-info">
                <?php echo $kosong ?>
            </div>
        <?php } ?>
        
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                <?php foreach($user as $u){ ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $u['username']?></td>
                    <td><?php echo $u['role']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php echo $this->endSection() ?>