<?php
class Feedback_model extends CI_Model {
  public function get_all() {
    return $this->db->get('feedback')->result();
  }

  public function insert($data) {
    $this->db->insert('feedback', $data);
  }

  public function count() {
    return $this->db->count_all('feedback');
  }
}

?>