<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_sambutan extends CI_Model
{
   // Data Sambutan
   public function getSambutan()
   {
      $this->db->select('*');
      $this->db->from('sambutan');
      $this->db->order_by('id', 'DESC');
      return $this->db->get();
   }
}
