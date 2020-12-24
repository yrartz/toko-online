<?php namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
	    $data['title'] = 'Halaman Admin';
		return view('admin/index', $data);
	}
	
	public function tambah(){
	    $data['title'] = 'Tambah Produk';
	    return view('admin/tambah', $data);
	}
	
	public function update(){
	    $data['title'] = 'Update Produk';
	    return view('admin/update', $data);
	}

	//--------------------------------------------------------------------

}
