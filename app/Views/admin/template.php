<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title><?php echo $title ?></title>
  </head>
  <body>
      
      <?php $session = session() ?>

    <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Toko Online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('admin/index')?>">Produk</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="<?= base_url('admin/pelanggan')?>">Pelanggan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('admin/pesanan')?>" tabindex="-1">Pesanan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('user/index')?>" tabindex="-1">Katalog</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Profil
                 </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Edit Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?= base_url('auth/logout')?>">Logout</a></li>
          </ul>
        </li>
            <a class="nav-link" href="#"><img src="<?php echo base_url('profil/profil.png')?>" width="60px" class="rounded-circle mx-auto"></a>
            <?php echo $session->get('username') ?>
      </ul>
    </div>
  </div>
</nav>

<?php echo $this->renderSection('konten') ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
<script src="https://kit.fontawesome.com/964ae5b0fd.js" crossorigin="anonymous"></script>

  </body>
</html>