<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_photos extends CI_Model
{
   // Hitung Jumlah Galeri Foto Publish
   public function get_published_count()
   {
      $query = $this->db->get_where('galeri_gambar', ['enabled' => 1]);
      return $query->num_rows();
   }

   public function get_published($limit = null, $offset = null)
   {
      if (!$limit && $offset) {
         $query = $this->db
            ->get_where('galeri_gambar', ['enabled' => 1]);
      } else {
         $this->db->from('galeri_gambar');
         $this->db->where('enabled', 1);
         $this->db->limit($limit, $offset);
         $this->db->order_by('id', 'DESC');
         $query = $this->db->get();
      }
      return $query->result_array();
   }
}
