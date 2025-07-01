<?php


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

if (!function_exists('lightenColor')) {
    function lightenColor(string $hex, int $percent = 80): string
    {
        $hex = ltrim($hex, '#');

        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        $r = min(255, intval($r + (255 - $r) * $percent / 100));
        $g = min(255, intval($g + (255 - $g) * $percent / 100));
        $b = min(255, intval($b + (255 - $b) * $percent / 100));

        return sprintf("#%02x%02x%02x", $r, $g, $b);
    }
}
