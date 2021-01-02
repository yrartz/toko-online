<?php namespace App\Controllers;
use \App\Models\ProdukModel;
use \App\Models\UserModel;
use \App\Models\TransaksiModel;

class User extends BaseController
{
    
    private $apiKey = '6cf0412839e99613153195dbd5b45191';
    private $url = 'https://api.rajaongkir.com/starter/';
    
	public function index()
	{
	    $produkModel = new produkModel();
	    
	    $data['title'] = 'Toko Online';
	    
        //searhing
        $keyword = $this->request->getPost('keyword');
        
        if($keyword){
            $cariProduk = $produkModel->search($keyword);
        }
        else {
            $cariProduk = $produkModel;
        }
        
        $data['produk'] = $cariProduk->paginate(3, 'produk');
	    $data['pager'] = $produkModel->pager;
	    $data['keyword'] = $keyword;
	    
	    if(empty($data['produk'])){
	        session()->setFlashdata('cari', 'Tidak ada produk');
	    }
	    
		return view('user/index', $data);
	}
	
	public function detail($slug){
	    $produkModel = new ProdukModel();
	    $transaksiModel = new TransaksiModel();
	    $data['title'] = 'Detail Produk';
	    $data['produk'] = $produkModel->getProduk($slug);
	    
	    //mendapat data total pembelian
	    $produk = $produkModel->getProduk($slug);
	    $namaProduk = $produk['nama'];
	    $transaksi = $transaksiModel->where('produk', $namaProduk)->findAll();
	    $terjual = count($transaksi);
	    $data['jumlah'] = $terjual;
	    
	    return view('user/detail', $data);
	}
	
	private function rajaongkir($method, $id_province=null)
	{
	    $curl = curl_init();
	    
	    $endPoint = $this->url.$method;
	    
	    if($id_province != null){
	        $endPoint = $endPoint."?province=".$id_province;
	    }

        curl_setopt_array($curl, array(
        CURLOPT_URL => $endPoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "key:" .$this->apiKey
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        
        return $response;
	}
	
	public function getCity(){
	    if($this->request->isAJAX())
	    {
	        $id_province = $this->request->getGet('id_province');
	        $data = $this->rajaongkir('city', $id_province);
	        return $this->response->setJSON($data);
	    }
	}
	
	public function beli($slug){
	    $produkModel = new ProdukModel();
	    $data['title'] = 'Beli Produk';
	    $data['produk'] = $produkModel->getProduk($slug);
	    
	    if(!session()->has('isLoggedIn'))
	    {
	        return redirect()->to(base_url('auth/login'));
	    }
	    
	    $daftarProvinsi = json_decode($this->rajaongkir('province'));
	    $data['provinsi'] = $daftarProvinsi->rajaongkir->results;
	    
	    return view('user/beli', $data);
	}
	
    private function rajaongkircost($origin, $destination, $weigth, $courier)
	{
	    $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$destination."&weight=".$weigth."&courier=".$courier,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: ".$this->apiKey
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        return $response;
	}
	
	public function getCost()
	{
	    if($this->request->isAJAX()){
	        $origin = $this->request->getGet('origin');
	        $destination = $this->request->getGet('destination');
	        $weigth = $this->request->getGet('weight');
	        $courier = $this->request->getGet('courier');
	        
	        $data = $this->rajaongkircost($origin, $destination, $weigth, $courier);
	        
	        return $this->response->setJSON($data);
	    }
	}
	
	public function pesanan(){
	    $transaksiModel = new TransaksiModel();
	    $transaksiModel->orderBy('id', 'DESC');
	    
	    $data['title'] = 'Data Pesanan';
	    $data['pesanan'] = $transaksiModel->where('username', session()->get('username'))->findAll();
	   
	    
	    if(!session()->has('isLoggedIn'))
	    {
	        return redirect()->to(base_url('user/index'));
	    }
	    
	    if(empty($data['pesanan'])){
	        session()->setFlashdata('kosong', 'Belum ada pesanan');
	    }
	    
	    return view('user/pesanan', $data);
	}

	//--------------------------------------------------------------------

}
