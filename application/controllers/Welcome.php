<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{	
		$this->data['hasil'] = $this->model_crud->getUser('crud_table');
		$this->load->view('welcome_message', $this->data);
	}
	public function form_input(){
		$this->load->view('form-input');
	}

	public function insert(){
		$Nama = $_POST['Nama'];
		$Alamat = $_POST['Alamat'];
		$NIM = $_POST['NIM'];
		$Motivasi_hidup = $_POST['Motivasi_hidup'];
		$data = array('Nama' => $Nama,'NIM' => $NIM,'Alamat' => $Alamat,'Motivasi_hidup' => $Motivasi_hidup);
		$tambahin = $this->model_crud->tambah('crud_table',$data);
		if($tambahin > 0){
			echo 'Berhasil disimpan! :-)<br>';

			ob_start();

			echo "redirecting ....";
			header("Refresh: 2; index");
			exit();

			ob_end_flush();
		}else{
			echo 'Gagal disimpan :(<br>';
			ob_start();

			echo "redirecting ....";
			header("Refresh: 2; index");
			exit();

			ob_end_flush();
		}
	}
	public function delete($id){
		$del = $this->model_crud->hapus('crud_table',$id);
		if($del > 0){
			echo 'Berhasil dihapus! :-)<br>';

			ob_start();

			echo "redirecting ....";
			header("Refresh: 2; ../index");
			exit();

			ob_end_flush();
		}else{
			echo 'Gagal dihapus :( :(<br>';
			ob_start();

			echo "redirecting ....";
			header("Refresh: 2; ../index");
			exit();

			ob_end_flush();
		}
	}

	public function form_edit($id){
		$this->data['edit'] = $this->model_crud->edit('crud_table',$id);
		$this->load->view('form-edit',$this->data);
	}

	public function update($id){
		$Nama = $_POST['Nama'];
		$Alamat = $_POST['Alamat'];
		$NIM = $_POST['NIM'];
		$Motivasi_hidup = $_POST['Motivasi_hidup'];
		$data = array('Nama' => $Nama,'NIM' => $NIM,'Alamat' => $Alamat,'Motivasi_hidup' => $Motivasi_hidup);
		$edot = $this->model_crud->editdata('crud_table',$data,$NIM);
		if($edot > 0){
			echo 'Berhasil diedit! :-)<br>';

			ob_start();

			echo "redirecting ....";
			header("Refresh: 2; ../index");
			exit();

			ob_end_flush();
		}else{
			echo 'Gagal :(<br>';
			ob_start();

			echo "redirecting ....";
			header("Refresh: 2; ../index");
			exit();

			ob_end_flush();
		}
	}
}
