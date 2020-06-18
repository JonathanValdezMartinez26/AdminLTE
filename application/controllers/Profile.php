<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		
		$data['page'] 			= "profile";
		$data['judul'] 			= "Mi perfil";
		$data['deskripsi'] 		= "Configuraciones";
		$this->template->views('profile', $data);
	}

	public function update() {
		$this->form_validation->set_rules('username', 'Nombre de Usuario', 'trim|required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('nama', 'Nombre Completo', 'trim|required');

		$id = $this->userdata->id;
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|png';
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data_foto = $this->upload->data();
				$data['foto'] = $data_foto['file_name'];
			}

			$result = $this->M_admin->update($data, $id);
			if ($result > 0) {
				$this->updateProfil();
				$this->session->set_flashdata('msg', show_succ_msg('Perfil de datos cambiado correctamente'));
				redirect('Profile');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('No se pudieron cambiar los datos del perfil'));
				redirect('Profile');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Profile');
		}
	}

	public function ubah_password() {
		$this->form_validation->set_rules('passLama', 'Contraseña Anterior', 'trim|required');
		$this->form_validation->set_rules('passBaru', 'Nueva Contraseña', 'trim|required');
		$this->form_validation->set_rules('passKonf', 'Confirmar Contraseña', 'trim|required');

		$id = $this->userdata->id;
		if ($this->form_validation->run() == TRUE) {
			if (md5($this->input->post('passLama')) == $this->userdata->password) {
				if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
					$this->session->set_flashdata('msg', show_err_msg('Nueva contraseña y Confirmar contraseña deben ser las mismas'));
					redirect('Profile');
				} else {
					$data = [
						'password' => md5($this->input->post('passBaru'))
					];

					$result = $this->M_admin->update($data, $id);
					if ($result > 0) {
						$this->updateProfil();
						$this->session->set_flashdata('msg', show_succ_msg('Contraseña cambiada correctamente'));
						redirect('Profile');
					} else {
						$this->session->set_flashdata('msg', show_err_msg('La contraseña no se pudo cambiar'));
						redirect('Profile');
					}
				}
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Contraseña incorrecta'));
				redirect('Profile');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Profile');
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */