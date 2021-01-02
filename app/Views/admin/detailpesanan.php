<?php echo $this->extend('admin/template') ?>

<?php echo $this->section('konten') ?>

    <div class="container">
        <h2 class="mt-5 mb-3 text-center">Detail Pesanan</h2>
        <div style="overflow:auto">
        <table class="table table-responsive">
            <tr>
                <th>Nama</th>
                <td><?php echo $transaksi['nama']?></td>
            </tr>
            <tr>
                <th>Produk</th>
                <td><?php echo $transaksi['produk']?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $transaksi['email']?></td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td><?php echo $transaksi['telepon']?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td><?php echo $transaksi['jumlah']?></td>
            </tr>
            <tr>
                <th>Berat</th>
                <td><?php echo $transaksi['berat']?></td>
            </tr>
            <tr>
                <th>Total</th>
                <td><?php echo $transaksi['total_harga']?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $transaksi['alamat']?></td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td><?php echo $transaksi['provinsi']?></td>
            </tr>
            <tr>
                <th>Kota</th>
                <td><?php echo $transaksi['kota']?></td>
            </tr>
            <tr>
                <th>Kurir</th>
                <td><?php echo $transaksi['kurir']?></td>
            </tr>
            <tr>
                <th>Ongkir</th>
                <td><?php echo $transaksi['ongkir']?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?php echo $transaksi['created_at']?></td>
            </tr>
            <tr>
                <th>Gambar</th>
                <td><img src="/pesanan/<?php echo $transaksi['gambar'] ?>" width="100px" data-bs-toggle="modal" data-bs-target="#gambar"></td>
            </tr>
        </table>
        
                   <!-- modal -->
          <div class="modal fade" id="gambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h5>Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img src="/pesanan/<?php echo $transaksi['gambar']?>" width="250px">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        
        </div>
        <form method="post" action="/admin/hapuspesanan" class="my-3">
            <input type="hidden" name="id" value="<?php echo $transaksi['id']?>">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus">Hapus</button>
            
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

<?php echo $this->endSection() ?>