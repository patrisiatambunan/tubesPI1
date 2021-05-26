<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signin extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// if ($this->session->userdata('uname')) {
			// redirect('auth');
		// } else {

			// RULES
			$this->form_validation->set_rules(
				'uname',
				'Username',
				'required|trim|min_length[4]',
				['min_length' => 'Username minimal terdiri dari 4 karakter, cek kembali username anda']
			);

			$this->form_validation->set_rules(
				'password',
				'Password',
				'required|trim|min_length[8]',
				['min_length' => 'Password minimal terdiri dari 8 karakter, cek kembali password anda']
			);

			// CHECK INPUT
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('sign_in');
			}

			// jika form yang diisi sudah sesuai rules
			else {
				// get input
				$uname = $this->input->post('uname');
				$password = $this->input->post('password');

				$user = $this->db->get_where('user', ['uname' => $uname])->row_array();			//retrieve user data from db

				//check username
				if ($user) {
					//check password
					if ($user['password'] == $password) {
						$data = [
							'uname' => $user['uname'],
							'role_id' => $user['role_id']
						];

						$this->session->set_userdata($data);
						redirect('auth');
					}

					//jika password salah
					else {
						$this->session->set_flashdata('message_wrong', 'Password tidak sesuai');
						redirect('Signin');
					}
				}

				//jika username tidak terdaftar atau user tidak ada dalam db
				else {
					$this->session->set_flashdata('message_wrong', 'Username yang anda masukkan belum terdaftar');
					redirect('Signin');
				}
			}
		// }
	}			//end index()

	public function logout()
	{

		$this->session->unset_userdata('uname');
		$this->session->unset_userdata('role_id');

		$this->session->sess_destroy();

		$this->session->set_flashdata('message_success', 'Berhasil Logout');
		redirect('Signin');
	}		//end logout()
}
