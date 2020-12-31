<?php namespace App\Controllers;
use \App\Models\ProdukModel;
use \App\Models\UserModel;
use \App\Models\TransaksiModel;

class Admin extends BaseController
{
    
    public function __construct(){
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }
    
    public function index(){
        $produkModel = new ProdukModel();
        $transaksiModel = new TransaksiModel();
        
        $pesananBaru = $transaksiModel->where('status', 0)->findAll();
        
        if($pesananBaru){
            session()->setFlashdata('pesananBaru', 'Ada pesanan baru!');
        }
        
        if(session()->get('role') != 'admin')
        {
            return redirect()->to(base_url('user/index'));
        }
        
        if(!session()->has('isLoggedIn'))
        {
            return redirect()->to(base_url('auth/login'));
        }
        
        $data['pesanan'] = $transaksiModel->findAll();
        $data['title'] = 'Halaman Admin';
        $data['produk'] = $produkModel->getProduk();
        
        if(empty($data['produk'])){
            session()->setFlashdata('kosong', 'Tidak ada produk');
        }
       
        return view('admin/index', $data);
    }
    
    public function detail($slug){
        $produkModel = new ProdukModel();
        $data['title'] = 'Detail Produk';
        $data['produk'] = $produkModel->getProduk($slug);
        $transaksiModel = new TransaksiModel();
        
        $produk = $produkModel->getProduk($slug);
        
	    $namaProduk = $produk['nama'];
	    
	    $transaksi = $transaksiModel->where('produk', $namaProduk)->findAll();
	    $terjual = count($transaksi);
	    $data['jumlah'] = $terjual;
        
        return view('admin/detail', $data);
    }
    
    public function tambah(){
        $data['title'] = 'Tambah Produk';
        return view('admin/tambah', $data);
    }
    
    public function save(){
        $produkModel = new ProdukModel();
        $slug = url_title($this->request->getPost('nama'), '-', true);
        
        $data = $this->request->getPost();
        $this->validation->run($data, 'tambah');
        $errors = $this->validation->getErrors();
        
        if($errors){
            session()->setFlashdata('errors', $errors);
            return redirect()->to(base_url('admin/tambah'))->withInput();  
        }
        
        //ambil gambar
        $gambar = $this->request->getFile('gambar');
        $namaGambar = $gambar->getRandomName();
        $gambar->move('img', $namaGambar);
        

        $produkModel->save([
            'nama' => $this->request->getPost('nama'),
            'stok' => $this->request->getPost('stok'),
            'berat' => $this->request->getPost('berat'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'slug' => $slug,
            'gambar' => $namaGambar
            ]);
            
            session()->setFlashdata('tambah', 'Produk berhasil ditambahkan');
            
            return redirect()->to(base_url('admin/index'));
    }
    
    public function hapus(){
        $id = $this->request->getPost('id_produk');
        $produkModel = new ProdukModel();
        $data = $produkModel->find($id);
        unlink('img/'.$data['gambar']);
        
        $produkModel->delete($id);
        
            session()->setFlashdata('hapus', 'Produk berhasil dihapus');
            return redirect()->to(base_url('admin/index'));
            
    }
    
    public function update($slug){
        $produkModel = new ProdukModel();
        $data['title'] = 'Update Produk';
        $data['produk'] = $produkModel->getProduk($slug);
        return view('admin/update', $data);
    }
    
    public function edit(){
        $id = $this->request->getPost('idproduk');
        $produkModel = new ProdukModel();
        
        //ambil data sesuai id 
        $produk = $produkModel->find($id);
        
        //validasi inputan
        $data = $this->request->getPost();
        $this->validation->run($data, 'edit');
        $errors = $this->validation->getErrors();
        
        if($errors){
            session()->setFlashdata('errors', $errors);
            return redirect()->to('/admin/update/'.$this->request->getPost('slug'))->withInput();
        }
        
        //buat slug 
        $slug = url_title($this->request->getPost('nama'), '-', true);
        
        //cek apakah ganti gambar 
       
        $gambar = $this->request->getFile('gambar');
        
        //kalau tidak ganti gambar 
        if($gambar->getError() == 4){
            $namaGambar = $this->request->getPost('gambarLama');
        }
        else{
            //jika ganti gambar 
            $fileGambar = $this->request->getFile('gambar');
            
            //buat nama random 
            $namaGambar = $fileGambar->getRandomName();
            
            //pindahkan gambarnya
            $fileGambar->move('img', $namaGambar);
            
            //hapus gambar lamanya
            unlink('img/'.$produk['gambar']);
        }
        
        //save datanya
        $produkModel->save([
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'stok' => $this->request->getPost('stok'),
            'berat' => $this->request->getPost('berat'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'slug' => $slug,
            'gambar' => $namaGambar
            ]);
        
        session()->setFlashdata('update', 'Produk berhasil di update');
        return redirect()->to(base_url('admin/index'));
        
    }
    
    public function pelanggan(){
        
        $data['title'] = 'Daftar Pelanggan';
        
        $userModel = new UserModel();
        
        $data['user'] = $userModel->findAll();
        
        if(empty($data['user'])){
            session()->setFlashdata('kosong', 'Tidak ada pelanggan');
        }
        
        return view('admin/pelanggan', $data);
    }
    
    public function pesanan()
    {
        $data['title'] = 'Daftar Pesanan';
        
        $transaksiModel = new TransaksiModel();
        
        $data['pesanan'] = $transaksiModel->findAll();
        
        if(empty($data['pesanan'])){
        session()->setFlashdata('empty', 'Belum ada transaksi');
        }
        
        return view('admin/pesanan', $data);
    }
    
    public function detailpesanan($id)
    {
        $transaksiModel = new TransaksiModel();
        
        $data['transaksi'] = $transaksiModel->find($id);
        $data['title'] = 'Detail Pesanan';
        
        $transaksiModel->save([
            'id' => $id,
            'status' => 1
            ]);
        
        return view('admin/detailpesanan', $data);
    }
   	//--------------------------------------------------------------------

}
