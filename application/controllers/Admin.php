<?php
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // ← Tambahkan ini
        $this->load->helper('url');
        $this->load->model(['Artikel_model', 'Feedback_model']);
    }

    public function index() {
        $this->load->model(['Artikel_model', 'Feedback_model']);
        $data['total_artikel'] = $this->Artikel_model->count();
        $data['total_feedback'] = $this->Feedback_model->count();
        $this->load->view('partials/head');
        $this->load->view('partials/side_nav');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('partials/footer');
    }
}
?>