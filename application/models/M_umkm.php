<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_umkm extends CI_Model
{
   // Data UMKM
   public function getUmkm($where)
   {
      $this->db->select('*');
      $this->db->from('umkm');
      if (isset($where)) {
         $this->db->where($where);
      }
      $this->db->order_by('id_umkm', 'DESC');
      return $this->db->get();
   }

   // Data UMKM Kota
   public function getUmkmKota()
   {
      $this->db->select('*');
      $this->db->from('umkm');
      $this->db->order_by('id_umkm', 'ASC');
      return $this->db->get();
   }

   // Data Total Data UMKM Per Kecamatan
   function getUmkmKecamatan()
   {
      $this->db->select('id_umkm, kecamatan, kelurahan, komoditas, nama_usaha, nama_pemilik, jenis_kelamin, alamat_pemilik, alamat_usaha, tahun_berdiri, ijin_usaha, tipe_kelas_digital, COUNT(kecamatan) as total');
      $this->db->group_by('kecamatan');
      $this->db->order_by('total', 'DESC');
      return $this->db->get('umkm');
   }

   // Data Detail UMKM Kecamatan
   public function getDetailKecamatan($kecamatan)
   {
      $this->db->select('*');
      $this->db->from('umkm');
      $this->db->where('kecamatan', $kecamatan);
      return $this->db->get();
   }

   // Data Total Data UMKM Per Komoditas
   function getUmkmKomoditas()
   {
      $this->db->select('id_umkm, kecamatan, kelurahan, komoditas, nama_usaha, nama_pemilik, jenis_kelamin, alamat_pemilik, alamat_usaha, tahun_berdiri, ijin_usaha, tipe_kelas_digital, COUNT(komoditas) as total');
      $this->db->group_by('komoditas');
      $this->db->order_by('total', 'DESC');
      return $this->db->get('umkm');
   }

   // Data Detail UMKM Kecamatan
   public function getDetailKomoditas($komoditas)
   {
      $this->db->select('*');
      $this->db->from('umkm');
      $this->db->where('komoditas', $komoditas);
      return $this->db->get();
   }
}
