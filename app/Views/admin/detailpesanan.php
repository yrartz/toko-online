<?php echo $this->extend('admin/template') ?>

<?php echo $this->section('konten') ?>

    <div class="container">
        <h2 class="mt-5 mb-3 text-center">Detail Pesanan</h2>
        <div style="overflow:auto">
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>Produk</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Jumlah</th>
                <th>Berat</th>
                <th>Total</th>
                <th>Alamat</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Kurir</th>
                <th>Ongkir</th>
                <th>Tanggal</th>
                <th>Gambar</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $transaksi['produk']?></td>
                <td><?php echo $transaksi['nama']?></td>
                <td><?php echo $transaksi['email']?></td>
                <td><?php echo $transaksi['telepon']?></td>
                <td><?php echo $transaksi['jumlah']?></td>
                <td><?php echo $transaksi['berat']?></td>
                <td><?php echo $transaksi['total_harga']?></td>
                <td><?php echo $transaksi['alamat']?></td>
                <td><?php echo $transaksi['provinsi']?></td>
                <td><?php echo $transaksi['kota']?></td>
                <td><?php echo $transaksi['kurir']?></td>
                <td><?php echo $transaksi['ongkir']?></td>
                <td><?php echo $transaksi['created_at']?></td>
                <td><img src="pesanan/<?php echo $transaksi['gambar']?>"></td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>

<?php echo $this->endSection() ?>