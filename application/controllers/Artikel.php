<?php
class Artikel extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->database(); // ← Tambahkan ini
    $this->load->helper('url');
    $this->load->model('Artikel_model');
    $this->load->library('form_validation');
  }

  public function index() {
    $data['artikel'] = $this->Artikel_model->get_all();
    $this->load->view('partials/head');
    $this->load->view('partials/side_nav');
    $this->load->view('admin/artikel_list', $data);
    $this->load->view('partials/footer');
  }

  public function create() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partials/head');
            $this->load->view('partials/side_nav');
            $this->load->view('admin/artikel_form');
            $this->load->view('partials/footer');
        } else {
            $data = [
            'judul' => $this->input->post('judul'),
            'status' => $this->input->post('status')
            ];
            $this->Artikel_model->insert($data);
            $this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
            redirect('artikel');
        }
    }

    public function edit($id) {
        $this->_rules();
        $data['artikel'] = $this->Artikel_model->get_by_id($id);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partials/head');
            $this->load->view('partials/side_nav');
            $this->load->view('admin/artikel_form', $data);
            $this->load->view('partials/footer');
        } else {
            $update = [
            'judul' => $this->input->post('judul'),
            'status' => $this->input->post('status')
            ];
            $this->Artikel_model->update($id, $update);
            $this->session->set_flashdata('sukses', 'Data berhasil diperbarui.');
            redirect('artikel');
        }
    }

    public function delete($id) {
        $this->Artikel_model->delete($id);
        $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
        redirect('artikel');
    }

    private function _rules() {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    } 
}
?>