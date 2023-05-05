<?php

namespace core;

class View
{
    public static function render($view, $template, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../app/views/$view";
        $layout = "../app/views/layouts/$template";

        if (!is_readable($file))
        {
            echo "$file not found";
        }

        if (!is_readable($layout))
        {
            echo "Layout $layout does not exist";
        }

        ob_start();
        require $file;
        $content = ob_get_clean();

        require $layout;
    }
}
