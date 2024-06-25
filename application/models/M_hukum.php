<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_hukum extends CI_Model
{
   // Data Regulasi
   public function getListRegulasi()
   {
      $this->db->select('*');
      $this->db->from('rel_regulasi');
      $this->db->order_by('id', 'ASC');
      return $this->db->get();
   }

   // Data Produk Hukum
   public function getListProdukHukum($slug)
   {
      $this->db->select('*');
      $this->db->from('produk_hukum');
      $this->db->join('rel_regulasi', 'rel_regulasi.id=produk_hukum.regulasi_id');
      $this->db->where('rel_regulasi.slug_regulasi', $slug);
      $this->db->order_by('id_hukum', 'DESC');
      return $this->db->get();
   }

   // Data Produk Hukum
   public function getDetailProdukHukum($id)
   {
      $this->db->select('*');
      $this->db->from('produk_hukum');
      $this->db->where('id_hukum', $id);
      return $this->db->get();
   }
}
