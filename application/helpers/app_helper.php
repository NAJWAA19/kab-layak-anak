<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('active_menu')) {
    function active_menu($segments, $uri_string = NULL) {
        $CI =& get_instance();
        $current = $CI->uri->segment(1);
        if ($uri_string === NULL) $uri_string = '';
        if (!is_array($segments)) $segments = array($segments);
        // Beranda = segment kosong
        if (in_array('', $segments, TRUE) && ($current === NULL || $current === '')) return 'active';
        return in_array($current, $segments, TRUE) ? 'active' : '';
    }
}

if (!function_exists('tgl_indo')) {
    function tgl_indo($date, $with_time = FALSE) {
        if (empty($date) || $date === '0000-00-00') return '-';
        $bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        $ts = strtotime($date);
        if (!$ts) return $date;
        $out = date('d', $ts).' '.$bulan[(int)date('m',$ts)].' '.date('Y',$ts);
        if ($with_time && strlen($date) > 10) $out .= ' '.date('H:i',$ts);
        return $out;
    }
}

if (!function_exists('potong_teks')) {
    function potong_teks($text, $limit = 150) {
        $text = strip_tags((string)$text);
        if (mb_strlen($text) <= $limit) return $text;
        return mb_substr($text, 0, $limit).'...';
    }
}

if (!function_exists('format_size')) {
    function format_size($bytes) {
        $bytes = (int)$bytes;
        if ($bytes < 1024) return $bytes.' B';
        if ($bytes < 1048576) return round($bytes/1024,1).' KB';
        return round($bytes/1048576,2).' MB';
    }
}
