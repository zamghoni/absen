<?php
/**
 * Fungsi konversi format tanggal ala Instagram.
 *
 */
function igDate($datetime)
{
    $time_ago        = strtotime($datetime);
    $current_time    = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes = round($seconds / 60 );       // value 60 is seconds
    $hours   = round($seconds / 3600);      // value 3600 is 60 minutes * 60 sec
    $days    = round($seconds / 86400);     // 86400 = 24*60*60;
    $weeks   = round($seconds / 604800);    // 7*24*60*60;
    $months  = round($seconds / 2629440);   // ((365+365+365+365+366)/5/12)*24*60*60
    $years   = round($seconds / 31553280);  // (365+365+365+365+366)/5*24*60*60

    if ($seconds <= 60) {
        return "baru saja";
    } elseif ($minutes <= 60) {
        if ($minutes == 1) {
            return "1 menit yang lalu";
        } else {
            return "$minutes menit yang lalu";
        }
    } elseif ($hours <= 24) {
        if ($hours == 1) {
            return "1 jam yang lalu";
        } else {
            return "$hours jam yang lalu";
        }
    } elseif ($days <= 7) {
        if ($days == 1) {
            return "kemarin";
        } else {
            return "$days hari yang lalu";
        }
    } elseif ($weeks <= 4.3) { //4.3 == 52/12
        if ($weeks == 1) {
            return "1 minggu yang lalu";
        } else {
            return "$weeks minggu yang lalu";
        }
    } elseif ($months <= 12) {
        if ($months == 1) {
            return "1 bulan yang lalu";
        } else {
            return "$months bulan yang lalu";
        }
    } else {
        if ($years == 1) {
            return "1 tahun yang lalu";
        } else {
            return "$years tahun yang lalu";
        }
    }
}
