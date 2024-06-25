<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function is_logged_in($title)
{
   $ci = get_instance();
   if (empty($ci->session->userdata('GM_LOGGED_IN'))) {
      redirect('auth');
   } else {
      $role_id = $ci->session->userdata('role_id');
      $modul = $title;

      $queryMenu = $ci->db->get_where('set_modul', ['modul' => $modul])->row_array();
      $modul_id = $queryMenu['id'];

      $userAccess = $ci->db->get_where('user_access', [
         'role_id' => $role_id,
         'modul_id' => $modul_id
      ]);

      if ($userAccess->num_rows() == 0) {
         redirect('auth/blocked');
      }
   }
}

function generate_modul($role, $title, $treeview)
{
   $ci = get_instance();

   $menu_modul = '<ul class="sidebar-menu" data-widget="tree">';
   $header = $ci->db->get_where('set_modul', array('header' => 0))->result_array();

   foreach ($header as $h) {
      $menu_modul .= '<li class="header">' . $h['modul'] . '</li>';
      $modul = $ci->m_helper->getModul($role, $h['id']);

      foreach ($modul as $m) {
         if ($m['level'] == 2) {
            $m_active = $treeview ===  $m['modul'] ? "active" : "";

            $menu_modul .= '<li class="' . $m_active . '"><a href="' . base_url() . '' . $m['url'] . '"><i class="' . $m['icon'] . '"></i> <span>' . $m['modul'] . '</span></a></li>';
         } elseif ($m['level'] == 3) {
            $m_active = $treeview ===  $m['modul'] ? "active" : "";

            $menu_modul .= '<li class="treeview ' . $m_active . '">
                              <a href="#">
                                 <i class="' . $m['icon'] . '"></i> <span>' . $m['modul'] . '</span>
                                 <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                 </span>
                              </a>
                              <ul class="treeview-menu">';

            $sub_modul = $ci->m_helper->getSubModul($role, $m['modul_id']);

            foreach ($sub_modul as $sm) {
               $sm_active = $title ===  $sm['modul'] ? "active" : "";

               $menu_modul .= '<li class="' . $sm_active . '"><a href="' . base_url() . '' . $sm['url'] . '"><i class="' . $sm['icon'] . '"></i> ' . $sm['modul'] . '</a></li>';
            }

            $menu_modul .= '</ul></li>';
         }
      }
   }

   $menu_modul .= '</ul>';

   return $menu_modul;
}

function generate_breadcrumb($title, $sub_menu, $menu_link)
{
   $breadcrumb = '<h1>' . $title . '</h1>
                  <ol class="breadcrumb">
                  <li><a href="' . base_url() . 'dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>';

   if ($title != 'Dashboard') {
      if (empty($sub_menu)) {
         $breadcrumb .= '<li class="active"><a>' . $title . '</a></li>';
      } else {
         $breadcrumb .= '<li><a href="' . base_url() . '' . $menu_link . '">' . $title . '</a></li>';
         $breadcrumb .= '<li class="active">' . $sub_menu . '</li>';
      }
   }

   $breadcrumb .= '</ol>';

   return $breadcrumb;
}

function slug($text)
{
   // replace non letter or digits by -
   $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
   // trim
   $text = trim($text, '-');
   // transliterate
   $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
   // lowercase
   $text = strtolower($text);
   // remove unwanted characters
   $text = preg_replace('~[^-\w]+~', '', $text);
   if (empty($text)) {
      return 'n-a';
   }
   return $text;
}

function time_zone($date)
{
   $ci = get_instance();
   $aplikasi = $ci->m_action->getData('set_aplikasi', null, 'id', null)->row_array();
   date_default_timezone_set($aplikasi['time_zone']);

   if ($date == 'date_time') {
      $d = date("Y-m-d H:i:s");
   } elseif ($date == 'date') {
      $d = date("Y-m-d");
   }

   return $d;
}

function zone()
{
   $ci = get_instance();
   $aplikasi = $ci->m_action->getData('set_aplikasi', null, 'id', null)->row_array();

   if ($aplikasi['time_zone'] == 'Asia/Jakarta') {
      $z = 'WIB';
   } elseif ($aplikasi['time_zone'] == 'Asia/Makassar') {
      $z = 'WITA';
   } elseif ($aplikasi['time_zone'] == 'Asia/Jayapura') {
      $z = 'WIT';
   }

   return $z;
}
