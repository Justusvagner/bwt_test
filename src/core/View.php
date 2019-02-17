<?php
namespace JustusParser\core;

class View
{
    function generate($content_view, $template_view = 'template_view.php', $data = null)
    {
        include "src/views/".$template_view;
    }
}
