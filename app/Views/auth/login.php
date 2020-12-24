<html>
    <head>
        <title>Register</title>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
        <body>
            
            <!-- Just an image -->
        <nav class="navbar navbar-dark bg-success">
          <div class="container">
            <a class="navbar-brand" href="#">
                Toko Online
            </a>
          </div>
        </nav>
            
            <div class="container">
                
                <h2 class="my-5 text-center">Login</h2>
                
                <?php
                    $session = session();
                    $sukses = $session->getFlashdata('sukses');
                    $errors = $session->getFlashdata('errors');
                ?>
                
                <?php if($sukses){ ?>
                    <div class="alert alert-success">
                        <?= $sukses ?>
                    </div>
                <?php } ?>
                
                <?php if($errors){ ?>
                    <div class="alert alert-danger">
                        <?= $errors ?>
                    </div>
                <?php } ?>
                
                <form method="post">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control" placeholder="Username" name="username">
                </div>
                
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></i></span>
                  <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                
                <div>
                <a href="<?= base_url('auth/register')?>" class="text-dark">Belum punya akun?</a>
                </div>
                
                <div class="d-grid gap-2 mt-4">
                  <button class="btn btn-success" type="submit" name="submit">Register</button>
                </div>

                </form>
            </div>
            
            
            <script src="https://kit.fontawesome.com/964ae5b0fd.js" crossorigin="anonymous"></script>
            
        </body>
    </head>
</html>