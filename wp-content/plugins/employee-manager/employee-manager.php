<?php

/**
 * Plugin Name: Assessment 7
 * Plugin URI: http://example.com
 * Description: Assessment plugin: for manageing employees
 * Version: 1.0
 * Author: Brian
 * Author URI: https://example.com
 */

use Inc\Base\Activate;
use Inc\Base\Deactivate;
use Inc\Init;

//security
defined('ABSPATH') or die('Stopped');


if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once(dirname(__FILE__) . '/vendor/autoload.php');
}

function activate_employee_plugin()
{
    Activate::activate();
}

function deactivate_employee_plugin()
{
    Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_employee_plugin');
register_deactivation_hook(__FILE__, 'deactivate_employee_plugin');


if (class_exists('Inc\\Init')) {
    Init::register_services();
}
