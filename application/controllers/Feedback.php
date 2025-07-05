<?php
class Feedback extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Feedback_model');
    $this->load->library('form_validation');
  }

  public function index() {
    $data['feedback'] = $this->Feedback_model->get_all();
    $this->load->view('partials/head');
    $this->load->view('partials/side_nav');
    $this->load->view('admin/feedback_list', $data);
    $this->load->view('partials/footer');
  }

  public function kirim() {
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
      // tampilkan form lagi
    } else {
      $data = [
        'nama' => $this->input->post('nama'),
        'email' => $this->input->post('email'),
        'pesan' => $this->input->post('pesan')
      ];
      $this->Feedback_model->insert($data);
      echo "<script>
        Swal.fire('Terima kasih', 'Feedback Anda telah dikirim', 'success').then(() => window.history.back());
      </script>";
    }
  }

  private function _rules() {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('pesan', 'Pesan', 'required');
  }
}
?>