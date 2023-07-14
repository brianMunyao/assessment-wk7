<?php

/**
 * 
 * @package assessment
 */

namespace Inc\Base;

class Deactivate
{
    static function deactivate()
    {
        flush_rewrite_rules();
    }
}
