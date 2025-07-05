<?php
class Home extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url');
    $this->load->model(['Artikel_model', 'Feedback_model']);
    $this->load->library('form_validation');
  }

  public function index() {
    $data['artikel'] = $this->Artikel_model->get_all();
    $this->load->view('partials/head');
    $this->load->view('artikel_user', $data);
    $this->load->view('partials/footer');
  }

    public function feedback() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partials/head');
            $this->load->view('feedback_form');
            $this->load->view('partials/footer');
        } else {
            $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'pesan' => $this->input->post('pesan')
            ];
            $this->Feedback_model->insert($data);
            $this->session->set_flashdata('sukses', 'Feedback berhasil dikirim.');
            redirect('home');
        }
    }

  private function _rules() {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('pesan', 'Pesan', 'required');
  }
}
