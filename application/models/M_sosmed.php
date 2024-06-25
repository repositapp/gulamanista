<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_sosmed extends CI_Model
{
   // Data Sosial Media
   public function getSosmed()
   {
      $this->db->select('*');
      $this->db->from('media_sosial');
      $this->db->order_by('id', 'ASC');
      return $this->db->get();
   }
}
