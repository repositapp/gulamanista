<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_galeri extends CI_Model
{
   // Data Gambar
   public function getGambar($where)
   {
      $this->db->select('*');
      $this->db->from('galeri_gambar');
      if (isset($where)) {
         $this->db->where($where);
      }
      $this->db->order_by('id', 'DESC');
      return $this->db->get();
   }

   // Data Video
   public function getVideo($where)
   {
      $this->db->select('*');
      $this->db->from('galeri_video');
      if (isset($where)) {
         $this->db->where($where);
      }
      $this->db->order_by('id', 'DESC');
      return $this->db->get();
   }
}
