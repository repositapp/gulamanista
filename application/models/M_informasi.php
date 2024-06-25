<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_informasi extends CI_Model
{
   // Data Agenda
   public function getAgenda($where)
   {
      $this->db->select('*');
      $this->db->from('agenda');
      if (isset($where)) {
         $this->db->where($where);
      }
      $this->db->order_by('id', 'DESC');
      return $this->db->get();
   }

   // Data Pojok Informasi
   public function getPojok($where)
   {
      $this->db->select('*');
      $this->db->from('pojok_informasi');
      if (isset($where)) {
         $this->db->where($where);
      }
      $this->db->order_by('id', 'DESC');
      return $this->db->get();
   }
}
