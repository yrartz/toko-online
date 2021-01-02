<?php echo $this->extend('user/template') ?>

<?php echo $this->section('konten') ?>

    <div class="container">
        
        <?php 
            $session = session();
            $errors = $session->getFlashdata('errors');
        ?>
        
        <h5 class="text-center mt-4">Anda Akan membeli produk</h5>
        <h5 class="text-center mb-4"><b><?php echo $produk['nama']?></b></h5>
        
        <?php if($errors){ ?>
            <div class="my-3 alert alert-danger">
                Terjadi Kesalahan
                <ul>
                <?php foreach($errors as $err){ ?>
                <li><?php echo $err ?></li>
                <?php } ?>
                </ul>
            </div>
        <?php } ?>
        
        <form method="post" action="/transaksi/checkout" enctype="multipart/form-data">
            
            <?php echo csrf_field() ?>
            
            <input type="hidden" name="id" value="<?php echo $produk['id']?>">
            
            <input type="hidden" name="slug" value="<?php echo $produk['slug']?>">
            
        <div class="mb-3 p-3">
            <label for="produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="produk" id="produk" value="<?php echo $produk['nama']?>" readonly>
        </div>
            
        <div class="mb-3 p-3">
            <label class="form-label" for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo old('nama')?>" required>
        </div>
        
        <div class="mb-3 p-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo old('email')?>" required>
        </div>
        
        <div class="mb-3 p-3">
            <label class="form-label" for="telepon">No Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo old('telepon')?>" required>
        </div>
        
        <div class="mb-3 p-3">
            <label class="form-label" for="alamat">Alamat Lengkap</label>
            <textarea class="form-control" id="alamat" name="alamat" value="<?php echo old('alamat')?>" required></textarea>
        </div>
        
       <div class="mb-3 p-3">
            <label class="form-label" for="jumlah">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlah" min="1" max="<?php echo $produk['stok']?>" name="jumlah" value="<?php echo old('jumlah')?>" required>
        </div>
        
        <div class="mb-3 p-3">
            <label for="form-label" class="form-label">Berat (Gram)</label>
            <input type="number" class="form-control" id="berat" name="berat" value="<?php echo $produk['berat']?>" readonly>
        </div>
        
        <div class="mb-3 p-3">
            <label class="form-label" for="provinsi">Provinsi</label>
            <select class="form-control" id="provinsi">
                <option>Pilih Provinsi</option>
                <?php foreach($provinsi as $p){ ?>
                <option value="<?php echo $p->province_id ?>" provinsi="<?php echo $p->province?>"><?php echo $p->province ?></option>
                <?php } ?>
            </select>
        </div>
        
        <input type="hidden" id="namaprovinsi" name="provinsi">
        
        <div class="mb-3 p-3">
            <label class="form-label" for="kota">Kota</label>
            <select class="form-control" id="kota">
                <option>Pilih Kota</option>
            </select>
        </div>
        
        <input type="hidden" name="kota" id="namakota">
        
       <div class="mb-3 p-3">
            <label class="form-label" for="pengiriman">Jasa Pengiriman</label>
            <select class="form-control" id="pengiriman" name="">

            </select>
        </div>
        
        <input type="hidden" id="kurir" name="kurir">
        
        <div class="mb-3 p-3">
            <b>Estimasi: <span id="estimasi"></span> hari</b>
        </div>
        
        <div class="mb-3 p-3">
            <label class="form-label" for="ongkir">Ongkir</label>
            <input type="number" class="form-control" id="ongkir" name="ongkir" readonly>
            </select>
        </div>
        
       <div class="mb-3 p-3">
            <label class="form-label" for="total">Total Harga</label>
            <input type="text" class="form-control" id="total" name="total" readonly>
        </div>
        
        <div class="mb-3 p-3">
            <label class="form-label" for="struk">Bukti Pembayaran</label>
            <input type="file" class="form-control" id="struk" name="gambar" required>
        </div>
        <i>Silahkan transfer ke:
            <ul>
                <li>BNI: xxxxxxxxxx</li>
                <li>GOPAY: xxxxxxxxx</li>
                <li>OVO: xxxxxxxxxxx</li>
            </ul>
        </i>
        
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="submit" name="submit">Beli Sekarang</button>
        </div>
        </form>
        
    </div>

<?php echo $this->endSection() ?>


<?php echo $this->section('script') ?>
    <script>
        $(document).ready(function(){
            
            var jumlah_pembelian = 1
            var harga = <?php echo $produk['harga']?>;
            var ongkir = 0
            
            $('#provinsi').on('change', function(){
                var id_province = $(this).val()
                $('#kota').html('')
                
                var provinsi = $('option:selected', this).attr('provinsi')
                
                $('#namaprovinsi').val(provinsi)
                
                $.ajax({
                    url: "<?php echo base_url('user/getCity') ?>",
                    type: "get",
                    dataType: "json",
                    data: {
                        'id_province': id_province
                    },
                    success: function(data)
                    {
                        var kota = data.rajaongkir["results"]

                        $.each(kota, function(i, data){
                            $('#kota').append(`<option value="`+data.city_id+`" kota="`+data.city_name+`">
                            `+data.type+` `+data.city_name+`
                            </option>`)
                     
                        })

                    }
                })
                
            })
            
            $('#kota').on('change', function (){
                var id_city = $(this).val()
                
                var kota = $('option:selected', this).attr('kota')
                
                $('#namakota').val(kota)
                
                $('#pengiriman').html('')
                
                $.ajax({
                    url: "<?php echo base_url('user/getCost')?>",
                    type: "get",
                    dataType: "json",
                    data: {
                        'origin': 79,
                        'destination': id_city,
                        'weight': 1000,
                        'courier': 'jne'
                    },
                    success: function(data){
                        var ongkir = data["rajaongkir"]["results"][0]["costs"]
                        
                        
                        $.each(ongkir, function(i, data){
                            $('#pengiriman').append(`
                            <option value="`+data['cost'][0]['value']+`" etd="`+data["cost"][0]["etd"]+`" kurir="`+data['description']+`">
                     `+data['description']+` (`+data['service']+`) - Rp `+data["cost"][0]["value"]+`</option>
                            `)
                        })
                        
                    }
                })
                
            })
            
            $('#pengiriman').on('change', function(){
                var estimasi = $('option:selected', this).attr('etd')
                var kurir = $('option:selected', this).attr('kurir')
                ongkir = parseInt($(this).val())
                $('#ongkir').val(ongkir)
                $('#estimasi').html(estimasi)
                var totalHarga = (harga * jumlah_pembelian) + ongkir
                $('#total').val(totalHarga)
                $('#kurir').val(kurir)
            })
            
            $('#jumlah').on('change', function(){
                jumlah_pembelian = $('#jumlah').val()
                var totalHarga = (harga * jumlah_pembelian) + ongkir
                $('#total').val(totalHarga)
            })
            
        })
    </script>
<?php echo $this->endSection() ?>