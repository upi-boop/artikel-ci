<?php
class Artikel_model extends CI_Model {
  public function get_all() {
    return $this->db->get('artikel')->result();
  }

  public function count_all($keyword = null) {
    if ($keyword) {
        $this->db->like('judul', $keyword);
    }
    return $this->db->get('artikel')->num_rows();
  }

  public function get_paginated($limit, $offset, $keyword = null) {
      if ($keyword) {
          $this->db->like('judul', $keyword);
      }
      $this->db->limit($limit, $offset);
      return $this->db->get('artikel')->result();
  }


  public function get_by_id($id) {
    return $this->db->get_where('artikel', ['id' => $id])->row();
  }

  public function insert($data) {
    $this->db->insert('artikel', $data);
  }

  public function update($id, $data) {
    $this->db->where('id', $id)->update('artikel', $data);
  }

  public function delete($id) {
    $this->db->delete('artikel', ['id' => $id]);
  }

  public function count() {
    return $this->db->count_all('artikel');
  }
}
?>