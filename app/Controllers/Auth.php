<?php namespace App\Controllers;

class Auth extends BaseController
    {
        
        public function __construct(){
            $this->session = session();
            $this->validation = \Config\Services::validation();
        }
        
        public function register(){
            
            if($this->request->getPost()){
                $data = $this->request->getPost();
                $this->validation->run($data, 'register');
                $errors = $this->validation->getErrors();
                
                //jika tidak ada error
                if(!$errors){
                    
                    $salt = uniqid('', true);
                    $pass = md5($salt.$this->request->getPost('password'));
                    
                    $userModel = new \App\Models\UserModel();
                    $userModel->save([
                        'username' => $this->request->getPost('username'),
                        'password' => $pass,
                        'salt' => $salt,
                        ]);
                        
                        $this->session->setFlashdata('sukses', 'Anda berhasil mendaftar! Silahkan login');
                      return redirect()->to(base_url('auth/login'));
                }
                
                //kalau ada error 
                $this->session->setFlashdata('errors', $errors);
                return redirect()->to(base_url('auth/register'));
            }
            
            return view('auth/register');
        }
        
        
        public function login(){
            
            if($this->request->getPost()){
                $userModel = new \App\Models\UserModel();
                
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                
                $cekUser = $userModel->where('username', $username)->first();
                
                //cek username
                if($cekUser){
                    $salt = $cekUser['salt'];
                    
                    //cek password
                    //jika password beda
                    if($cekUser['password'] !== md5($salt.$password)){
                        $this->session->setFlashdata('errors', 'Password Salah');
                        return redirect()->to(base_url('auth/login'));
                    }
                    
                    //kalau password benar
                    $sessData = [
                        'username' => $cekUser['username'],
                        'role' => $cekUser['role'],
                        'id' => $cekUser['id'],
                        'isLoggedIn' => TRUE
                        ];
                    
                    $this->session->set($sessData);
                    
                    return redirect()->to(base_url('admin/index'));
                }
                
                //kalau username tidak ada
                $this->session->setFlashdata('errors', 'Username tidak ditemukan');
            }
            
            
            return view('auth/login');
        }
        
        public function logout(){
            $this->session->destroy();
            return redirect()->to(base_url('auth/login'));
        }
        
    }