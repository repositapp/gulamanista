<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_action extends CI_Model
{
   // Get, Insert, Update, Deleted Data All DESC
   public function getData($tabel, $where, $id, $limit)
   {
      if (isset($where)) {
         $this->db->where($where);
      }
      if (isset($limit)) {
         $this->db->limit($limit);
      }
      $this->db->order_by($id, 'DESC');
      return $this->db->get($tabel);
   }

   // Get, Insert, Update, Deleted Data All ASC
   public function getDataASC($tabel, $where, $id, $limit)
   {
      if (isset($where)) {
         $this->db->where($where);
      }
      if (isset($limit)) {
         $this->db->limit($limit);
      }
      $this->db->order_by($id, 'ASC');
      return $this->db->get($tabel);
   }

   // Insert and Update
   public function insertData($tabel, $data, $where)
   {
      if (isset($where)) {
         $this->db->where($where);
         $this->db->update($tabel, $data);
      } else {
         $this->db->insert($tabel, $data);
      }
   }

   // Delete
   public function deleteData($tabel, $where)
   {
      $this->db->where($where);
      $this->db->delete($tabel);
   }
}
