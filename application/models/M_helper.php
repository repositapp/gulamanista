<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_helper extends CI_Model
{
   // Data Modul Parent
   public function getModul($role, $header)
   {
      $this->db->select('*');
      $this->db->from('set_modul');
      $this->db->join('user_access', 'user_access.modul_id=set_modul.id');
      $this->db->where('user_access.role_id', $role);
      $this->db->where('set_modul.parent', 0);
      $this->db->where('set_modul.header', $header);
      $this->db->where('set_modul.modul_active', 1);
      $this->db->order_by('set_modul.urut', 'ASC');
      return $this->db->get()->result_array();
   }

   // Data Sub Modul
   public function getSubModul($role, $parent)
   {
      $this->db->select('*');
      $this->db->from('set_modul');
      $this->db->join('user_access', 'user_access.modul_id=set_modul.id');
      $this->db->where('user_access.role_id', $role);
      $this->db->where('set_modul.parent', $parent);
      $this->db->where('set_modul.modul_active', 1);
      $this->db->order_by('set_modul.urut', 'ASC');
      return $this->db->get()->result_array();
   }
}
