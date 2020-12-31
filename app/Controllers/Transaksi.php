<?php namespace App\Controllers;
use \App\Models\TransaksiModel;
use \App\Models\ProdukModel;

class Transaksi extends BaseController
{
    
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }
    
    public function checkout()
    {
        $transaksiModel = new TransaksiModel();
        $produkModel = new ProdukModel();
        
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data, 'beli');

            $errors = $this->validation->getErrors();
            
            $gambar = $this->request->getFile('struk');
            $namaGambar = $gambar->getRandomName();
            $gambar->move('pesanan', $namaGambar);
            
           
            
            if($errors){
                session()->setFlashdata('errors', $errors);
                return redirect()->to(base_url('user)/beli'))->withInput();
            }
            
            //ambil id
            $id = $this->request->getPost('id');
            //cari produk berdasarkan id
            $produk = $produkModel->find($id);
            //ambil stok produk lama
            $stokLama = $produk['stok'];
            
            //ambil stok yg dibeli
            $stokDiBeli = $this->request->getPost('jumlah');
            
            $stokProduk = $stokLama - $stokDiBeli;
            
            $transaksiModel->save([
                'id_user' => session()->get('id'),
                'produk' => $this->request->getPost('produk'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'telepon' => $this->request->getPost('telepon'),
                'jumlah' => $this->request->getPost('jumlah'),
                'berat' => $this->request->getPost('berat'),
                'total_harga' => $this->request->getPost('total'),
                'alamat' => $this->request->getPost('alamat'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kota' => $this->request->getPost('kota'),
                'kurir' => $this->request->getPost('kurir'),
                'ongkir' => $this->request->getPost('ongkir'),
                'gambar' => $namaGambar,
                'status' => 0
                ]);
                
                $produkModel->save([
                    'id' => $id,
                    'stok' => $stokProduk
                    ]);
                
                session()->setFlashdata('beli', 'Pesanan kamu siap dikirimkan! silahkan cek di menu pesanan');
                
                return redirect()->to(base_url('user/index'));
        }
    }
}