<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Petugas;
class PetugasController extends BaseController{
    protected $petugass;
    function __construct()
    {
        $this->petugass = new Petugas;
    }
    public function index()
    {
        $data['petugas'] = $this->petugass->findAll();
        return view('petugas_view', $data);
    }
    public function save()
    {
        $data = array(
            'nama_petugas' =>$this->request->getPost('nama_petugas'),
            'username' =>$this->request->getPost('username'),
            'password' =>password_hash($this->request->getPost('password')."", PASSWORD_DEFAULT),
            'telp' =>$this->request->getPost('telp'),
            'status' =>$this->request->getPost('status'),
        );
        $this->petugass->insert($data);
        session()->setFlashdata("message" ,"data berhasil disimpan");
        return $this->response->redirect('/petugas');
    }
    public function edit($id)
    {
        $data = array(
            'nama_petugas' =>$this->request->getPost('nama_petugas'),
            'username' =>$this->request->getPost('username'),
            'passowrd' =>password_hash($this->request->getPost('password')."", PASSWORD_DEFAULT),
            'telp' =>$this->request->getPost('telp'),
            'status' =>$this->request->getPost('status'),
        );
        $this->petugass->update($id ,$data);
        session()->setFlashdata("message","data berhasil di update");
        return $this->response->redirect('/petugas');
    }
    public function delete($id)
    {
        $this->petugass->delete($id);
        session()->setFlashdata("message","data berhasil di hapus");
        return $this->response->redirect('/petugas');
    }
}