<?php

/**
 * @name progress 於 cli 介面印出進度條
 * @author bency
 *
 * @param current 目前數量
 * @param total 總共數量
 * @output asci 進度條
 */

define('TERM_WIDTH', exec('tput cols'));
define('DONE_COLOR', "\033[1;44m");
define('RESET_COLOR', "\033[0m");
define('RESET_POSITION', "\033[" . TERM_WIDTH . "D");

function progress($current, $total)
{
    $width = TERM_WIDTH - 20;
    $rotate = ['-', '\\', '|', '/'];
    $percentage = floor($current / $total * 100);
    $progress = $width * $percentage / 100;
    echo RESET_POSITION;
    printf("[ %s ]         %s %3d%%", str_pad(str_pad('', $progress, '=-'), $width), $rotate[$current % 4], $percentage);
}
