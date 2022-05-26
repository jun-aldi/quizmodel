<?php

namespace App\Controllers\Dashboard;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Table extends BaseController
{
    // public function index()
    // {
    // return redirect()->route('loadRecord');
    // }

    public function loadRecord()
    {
        
        $request = service('request');
		$searchData = $request->getGet();

        $search = "";
		if (isset($searchData) && isset($searchData['search'])) {
			$search = $searchData['search'];
		}
        
        $users = new UserModel();

        if ($search == '') {
			$paginateData = $users->paginate();
		} else {
			$paginateData = $users->select('*')
				->orLike('nama', $search)
				->orLike('email', $search)    			
				->paginate();
		}
        
        $data = 
        [
            "title" => "Table",
            "page" => "table",
            'users' => $paginateData,
			'search' => $search
            // "list" => $userModel->where('avatar', '')->find()
        ];
        return view("dashboard/table", $data);
    }

    public function create()
    {
        $userModel = new UserModel();
        $data =
        [
            "title" => "Form",
            "page" => "table",
            'nama' => 'Administrator',
            'link' => "user"
        ];
        return view('dashboard/form', $data);
    }

    public function insert()
    {
        $userModel = new UserModel();
        
        //preprocessing
        $nama = $this->request->getVar('nd') ." ". $this->request->getVar('nb');
        
        // if($this->request->getFile('avatar')->getName() !=''){
        //     $avatar = $this->request->getFile('avatar');
        //     $avatar->move(ROOTPATH . 'public\assets\img\photo-profile');
        //     $namaavatar = $avatar->getName();
        // } else {
        //     $namaavatar = 'default-pp.jpg';
        // }

        $data = [
            'nama' => $nama,
            'alamat' => $this->request->getPost('alamat'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),
            // 'avatar' => $namaavatar,
        ];

        $userModel->save($data);
        
        session()->setFlashdata('suskses', 'Data anggota berhasil ditambahkan');

        return redirect()->to('dashboard/table');
    }

    public function insertAjax()
    {
        $userModel = new UserModel();
        
        //preprocessing
        $nama = $this->request->getVar('nd') ." ". $this->request->getVar('nb');
        
        if($this->request->getFile('avatar')->getName() !=''){
            $avatar = $this->request->getFile('avatar');
            $avatar->move(ROOTPATH . 'public\assets\img\photo-profile');
            $namaavatar = $avatar->getName();
        } else {
            $namaavatar = 'default-pp.jpg';
        }

        $data = [
            'nama' => $nama,
            'alamat' => $this->request->getPost('alamat'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),
            'avatar' => $namaavatar,
        ];

        $userModel->save($data);
    }

    public function getform()
    {
        if ($this->request->isAjax()){
            $hasil = [
                'data' => view('/dashboard/form')
            ];
            echo json_encode($hasil);
        } else {
            exit('Data tidak dapat diload');
        }
    }

}
