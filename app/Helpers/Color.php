<?php

namespace App\Helpers;


if (!function_exists('contrastColor')) {
    function contrastColor($hex): string
    {
        $hex = ltrim($hex, '#');
        if (strlen($hex) !== 6) {
            return '#000000'; // fallback
        }

        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        $brightness = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;

        return $brightness > 125 ? '#000000' : '#ffffff';
    }
}