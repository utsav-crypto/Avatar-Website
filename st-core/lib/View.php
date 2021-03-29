<?php
namespace lib;

use core\Exceptions\_404_NOT_FOUND;

class View
{
    public static function render($str, ...$data)
    {
        extract($data);
        ob_start();
        try {
            if (!\file_exists(ROOT."res/".$str.".php")) {
                throw new _404_NOT_FOUND();
            }
            require_once(ROOT."res/".$str.".php");
            $content = ob_get_clean();
            $pos = 0;
            $temp=null;
            while ($pos = strpos($content, "{{", $pos)) {
                $pos2 = strpos($content, "}}", $pos);
                $length = $pos2 - $pos-2;
                $temp = "";
                $widget = "";
                if ($length>0) {
                    $temp = substr($content, $pos+2, $length);
                    ob_start();
                    if ($temp&&file_exists(ROOT."res/cmn/".$temp.".php")) {
                        require_once(ROOT."res/cmn/".$temp.".php");
                        $widget = ob_get_clean();
                        $content = str_replace("{{".$temp."}}", $widget, $content);
                    }
                }
                $pos = $pos2;
            }
            echo($content);
        } catch (\Exception $e) {
            $e->errorMessage();
        }
    }
}
