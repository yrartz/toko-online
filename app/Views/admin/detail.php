<?php echo $this->extend('admin/template') ?>

<?php echo $this->section('konten') ?>

    <div class="konten p-3">
        <img src="/img/<?php echo $produk['gambar']?>" class="d-block mx-auto my-3" width="250px">
        <h3 class="mb-4 text-center"><?php echo $produk['nama']?></h3>
        <h4 class="text-success">Rp <?php echo $produk['harga']?></h4>
        <p class="text-muted">Stok: <?php echo $produk['stok']?></p>
        <hr class="dropdown-divider my-3">
        <p><?php echo $produk['deskripsi']?></p>
        
        <form method="post" action="/admin/hapus" class="d-inline-block">
            <input type="hidden" name="id_produk" value="<?php echo $produk['id']?>">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus"><i class="fas fa-trash"></i> Hapus</button>
            
           <!-- modal -->
          <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Yakin mau menghapus?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" name="submit">Hapus</button>
                
              </div>
            </div>
          </div>
            
            
        </form>
        

      
       
    </div>
    
          <a class="btn btn-warning" href="/admin/update/<?php echo $produk['slug']?>"><i class="fas fa-edit"></i> Update</a>
          
          </div>

<?php echo $this->endSection() ?>