<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_konsultasi extends CI_Model
{
   // Data Pesan Masuk
   public function getAllInbox($penerima)
   {
      $this->db->select('*');
      $this->db->from('konsultasi');
      $this->db->join('layanan_klinik', 'layanan_klinik.id=konsultasi.kategori');
      $this->db->where('konsultasi.penerima', $penerima);
      $this->db->order_by('konsultasi.id_konsultasi', 'DESC');
      return $this->db->get();
   }

   // Data Lihat Pesan Masuk
   public function getReadInbox($id)
   {
      $this->db->select('*');
      $this->db->from('konsultasi');
      $this->db->join('layanan_klinik', 'layanan_klinik.id=konsultasi.kategori');
      $this->db->where('konsultasi.id_konsultasi', $id);
      return $this->db->get();
   }

   // Data Pesan Terkirim
   public function getAllSent($pengirim)
   {
      $this->db->select('*');
      $this->db->from('konsultasi');
      $this->db->join('layanan_klinik', 'layanan_klinik.id=konsultasi.kategori');
      $this->db->where('konsultasi.pengirim', $pengirim);
      $this->db->order_by('konsultasi.id_konsultasi', 'DESC');
      return $this->db->get();
   }

   // Data Lihat Pesan Terkirim
   public function getReadSent($id)
   {
      $this->db->select('*');
      $this->db->from('konsultasi');
      $this->db->join('layanan_klinik', 'layanan_klinik.id=konsultasi.kategori');
      $this->db->where('konsultasi.id_konsultasi', $id);
      return $this->db->get();
   }

   // Kode Pesan
   public function kodeInbox($panjang_angka)
   {
      $code = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789' . time();
      $string = '';
      for ($i = 0; $i < $panjang_angka; $i++) {
         $pos = rand(0, strlen($code) - 1);
         $string .= $code[$pos];
      }

      $kodetampil = $string;
      return $kodetampil;
   }

   // Kode Berkas
   public function kodeBerkas($panjang_angka)
   {
      $code = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789' . time();
      $string = '';
      for ($i = 0; $i < $panjang_angka; $i++) {
         $pos = rand(0, strlen($code) - 1);
         $string .= $code[$pos];
      }

      $kodetampil = $string;
      return $kodetampil;
   }
}
