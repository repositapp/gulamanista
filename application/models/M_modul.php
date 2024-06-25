<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_modul extends CI_Model
{
    // Data Modul
    public function getListModul()
    {
        $this->db->select('*');
        $this->db->from('set_modul');
        $this->db->where('parent', 0);
        $this->db->order_by('id', 'ASC');
        return $this->db->get();
    }

    // Data Sub Modul
    public function getListSubModul($id)
    {
        $this->db->select('*');
        $this->db->from('set_modul');
        $this->db->where('parent', $id);
        $this->db->order_by('id', 'ASC');
        return $this->db->get();
    }

    // Data Sub Modul
    public function getDetailModul($id)
    {
        $this->db->select('*');
        $this->db->from('set_modul');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    // Data Icon List
    public function list_icon()
    {
        $list_icon = array();

        $file = FCPATH . 'assets/themes/plugins/fonts/fontawesome.txt';

        if (file_exists($file)) {
            $list_icon = file_get_contents($file);
            $list_icon = explode('.', $list_icon);
            $list_icon = array_map(function ($a) {
                return explode(':', $a)[0];
            }, $list_icon);
            return $list_icon;
        }

        return FALSE;
    }
}
