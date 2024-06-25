<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_klinik extends CI_Model
{
   // Data Layanan Klinik
   public function getListKlinik()
   {
      $this->db->select('*');
      $this->db->from('layanan_klinik');
      $this->db->order_by('id', 'DESC');
      return $this->db->get();
   }

   // Data Detail Layanan Klinik
   public function getDetailKlinik($id)
   {
      $this->db->select('*');
      $this->db->from('layanan_klinik');
      $this->db->where('id', $id);
      return $this->db->get();
   }

   // Data Detail Layanan
   public function getDetailLayanan($slug)
   {
      $this->db->select('*');
      $this->db->from('layanan_klinik');
      $this->db->where('slug_klinik', $slug);
      return $this->db->get();
   }
}
