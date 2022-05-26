<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\UserModel;


class UserDatatables extends BaseController
{
    public function index()
    {
        $data = 
        [
            "title" => "User Datatables",
            "page" => "datatable",
        ];
        return view("dashboard/user_datatables", $data);
    }

    public function getdata()
    {
        if($this->request->isAJAX()){
            $userModel = new UserModel();
            $data = [
                'list' => $userModel->findAll()
            ];

            $hasil = [
                'data' => view('dashboard/list',$data)
            ];
            echo json_encode($hasil);
        } else {
            exit('Data tidak dapat diload');
        }
    }

    public function insertAjax()
    {


        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'nd' => [
                'label' => 'Nama Depan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
                ],
            'nb' => [
                    'label' => 'Nama Belakang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                    ],
            'username' => [
                    'label' => 'Username',
                    'rules' => 'required|is_unique[users.username]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah digunakan'
                    ]
                    ],
            'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        ]
                        ],
            'tempat_lahir' => [
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                        'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        ]
                        ],
            'tanggal_lahir' => [
                    'label' => 'Tanggal Lahir',
                    'rules' => 'required',
                            'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            ]
                            ],
            'jenis_kelamin' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                    'required' => '{field} tidak boleh kosong',
                            ]
                                ],
            'no_telepon' => [
                    'label' => 'No Telepon',
                    'rules' => 'required',
                    'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    ]
                    ],
            'email' => [
                        'label' => 'Email',
                        'rules' => 'required|is_unique[users.email]',
                        'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah digunakan',
                        ]
                        ],
            'password' => [
                            'label' => 'Password',
                            'rules' => 'required|min_length[8]',
                            'errors' => [
                                'required' => '{field} tidak boleh kosong',
                                'min_length' => '{field} harus lebih dari 8 karakter',
                            ]
                            ],
            're_password' => [
                                'label' => 'Ulangi Password',
                                'rules' => 'required|matches[password]',
                                'errors' => [
                                    'required' => '{field} tidak boleh kosong',
                                    'matches' => 'tidak sama dengan password yang sebelumnya anda tulis',
                                ]
                                ],
            'avatar' => [
                        'label' => 'Avatar',
                        'rules' => 'uploaded[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,500]',
                        'errors' => [
                                'uploaded' => '{field} tidak boleh kosong',
                                'mime_in' => '{field} harus berformat jpg/jpeg/png',
                                'max_size' => 'Ukuran file {field} harus kurang dari 500kb',
                                ]
                                ],
        ]);

        if (!$valid){
            $pesan = [
                'error' => [
                    'nd' => $validasi->getError('nd'),
                    'nb' => $validasi->getError('nb'),
                    'username' => $validasi->getError('username'),
                    'alamat' => $validasi->getError('alamat'),
                    'tempat_lahir' => $validasi->getError('tempat_lahir'),
                    'tanggal_lahir' => $validasi->getError('tanggal_lahir'),
                    'jenis_kelamin' => $validasi->getError('jenis_kelamin'),
                    'no_telepon' => $validasi->getError('no_telepon'),
                    'email' => $validasi->getError('email'),
                    'password' => $validasi->getError('password'),
                    're_password' => $validasi->getError('re_password'),
                    'avatar' => $validasi->getError('avatar'),
                           
                ]
                ];
                echo json_encode($pesan);

        }else {
            $this->userModel = new userModel();

            //preprocessing
            $nama = $this->request->getVar('nd') ." ". $this->request->getVar('nb');
            
            if($this->request->getFile('avatar')->getName() !=''){
                $avatar = $this->request->getFile('avatar');
                $avatar->move(ROOTPATH . 'public\assets\img\photo-profile');
                $namaavatar = $avatar->getName();
            } else {
                $namaavatar = 'default-pp.jpg';
            }
    
     
            $data = array(
                'nama' => $nama,
                'alamat' => $this->request->getPost('alamat'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'telepon' => $this->request->getPost('no_telepon'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => md5($this->request->getPost('password')),
                'avatar' => $namaavatar,
            );
            $insert = $this->userModel->user_add($data);
            //  

            $pesan = [
                'sukses' => 'Data anggota berhasil diinput'
            ];

            echo json_encode($pesan);
        }





    }

    public function getform()
    {
        if ($this->request->isAJAX()){
            $hasil = [
                'data' => view('dashboard/form')
            ];
            echo json_encode($hasil);
        } else {
            exit('Data tidak bisa diload');
        }
    }
}
