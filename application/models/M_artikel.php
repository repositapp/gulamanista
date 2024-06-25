<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_artikel extends CI_Model
{
   // Data Kategori Artikel
   public function getWebKategori($where)
   {
      $this->db->select('*');
      $this->db->from('kategori');
      if (isset($where)) {
         $this->db->where($where);
      }
      $this->db->order_by('id', 'DESC');
      return $this->db->get();
   }

   // Data Artikel
   public function getWebArtikel($where)
   {
      $this->db->select('*');
      $this->db->from('artikel');
      $this->db->join('kategori', 'kategori.id=artikel.id_kategori');
      if (isset($where)) {
         $this->db->where($where);
      }
      $this->db->order_by('artikel.id_artikel', 'DESC');
      return $this->db->get();
   }

   // Data Artikel
   public function getWebNew($where)
   {
      $this->db->select('*');
      $this->db->from('artikel');
      $this->db->join('kategori', 'kategori.id=artikel.id_kategori');
      if (isset($where)) {
         $this->db->where($where);
      }
      $this->db->order_by('RAND()');
      $this->db->limit(7);
      return $this->db->get();
   }

   // Hitung Jumlah Artikel Publish
   public function get_published_count()
   {
      $query = $this->db->get_where('artikel', ['enabled' => 1]);
      return $query->num_rows();
   }

   public function get_published($limit = null, $offset = null)
   {
      if (!$limit && $offset) {
         $query = $this->db
            ->get_where('artikel', ['enabled' => 1]);
      } else {
         $query =  $this->db
            ->get_where('artikel', ['enabled' => 1], $limit, $offset);
      }
      return $query->result_array();
   }
}
