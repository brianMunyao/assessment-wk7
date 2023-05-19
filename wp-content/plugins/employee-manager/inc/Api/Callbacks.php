<?php

/**
 * @package assessment
 */

namespace Inc\Api;

use Inc\Base\BaseController;

class CallBacks extends BaseController
{
    public function create_employees_cb()
    {
        return require_once $this->plugin_path . 'templates/create-employees.php';
    }
    public function view_employees_cb()
    {
        return require_once $this->plugin_path . 'templates/view-employees.php';
    }
}
