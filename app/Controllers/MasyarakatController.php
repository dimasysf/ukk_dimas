<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Masyarakat;
class MasyarakatController extends BaseController{
    protected $masyarakats;
    function __construct()
    {
        $this->masyarakats = new Masyarakat;  
    }
    public function index()
    {
        $data['masyarakat'] = $this->masyarakats->findAll();
        return view('masyarakat_view',$data);
    }
    public function save()
    {
        $data = array(
            'nik' =>$this->request->getPost('nik'),
            'nama' =>$this->request->getPost('nama'),
            'username' =>$this->request->getPost('username'),
            'password' =>password_hash($this->request->getPost('password')."", PASSWORD_DEFAULT),
            'telp' =>$this->request->getPost('telp'),
        );
        $this->masyarakats->insert($data);
        session()->setFlashdata("data berhasi di simpan");
        return $this->response->redirect('/masyarakat');
    }
    public function edit($id)
    {
        $data = array(
            'nik'=>$this->request->getPost('nik'),
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password')."", PASSWORD_DEFAULT),
            'telp'=>$this->request->getPost('telp'),
        );
        $this->masyarakats->update($id ,$data);
        session()->setFlashdata("data berhasil di update");
        return $this->response->redirect('/masyarakat');
    }
    public function delete($id)
    {
        $this->masyarakats->delete($id);
        session()->setFlashdata("message","data berhasil di hapus");
        return $this->response->redirect('/masyarakat');
    }
}