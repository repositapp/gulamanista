<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model
{
   // Data User
   public function getUser($id)
   {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->join('user_role', 'user_role.id=user.role_id');
      $this->db->where_not_in('user.id_user', $id);
      $this->db->order_by('user.role_id', 'ASC');
      return $this->db->get();
   }

   // Data User Baru
   public function getUserNew()
   {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->order_by('id_user', 'DESC');
      $this->db->limit(1);
      return $this->db->get();
   }

   // Data Detail User
   public function getDetailUser($id)
   {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->join('user_role', 'user_role.id=user.role_id');
      $this->db->where('user.id_user', $id);
      return $this->db->get();
   }

   // Data Role
   public function getRole()
   {
      $this->db->select('*');
      $this->db->from('user_role');
      $this->db->order_by('id', 'ASC');
      return $this->db->get();
   }

   // Data Akun User
   public function getAkun($id)
   {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->join('user_role', 'user_role.id=user.role_id');
      $this->db->where('user.id_user', $id);
      return $this->db->get();
   }

   // Data Petugas Pelayanan Per Akun
   public function getPetugasLayanan($id)
   {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->join('layanan_klinik', 'layanan_klinik.id=user.petugas_pelayanan');
      $this->db->where('user.id_user', $id);
      return $this->db->get();
   }

   // Data Biodata UMKM
   public function getBioUMKM($id)
   {
      $this->db->select('*');
      $this->db->from('umkm');
      $this->db->join('user', 'user.id_user=umkm.id_akun');
      $this->db->where('umkm.id_akun', $id);
      return $this->db->get();
   }
}
