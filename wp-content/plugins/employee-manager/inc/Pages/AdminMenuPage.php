<?php

/**
 * @package assessment
 */

namespace Inc\Pages;

use Inc\Api\CallBacks;
use Inc\Api\SettingsApi;

class AdminMenuPage
{
    public $settings;
    public $callbacks;
    public $pages;
    public $subpages;

    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new CallBacks();

        $this->initialize_admin_pages();
        $this->initialize_admin_subpages();

        //add the pages
        $this->settings->add_pages_fn($this->pages)->has_subpages_fn()->add_subpage_fn($this->subpages)->register();

        add_action('admin_menu', [$this, 'submenu_func']);
    }

    public function initialize_admin_pages()
    {
        $this->pages = [
            [
                'page_title' => 'View employees',
                'menu_title' => 'View employees',
                'capability' => 'manage_options',
                'menu_slug' => 'view_employees',
                'callback' => [$this->callbacks, 'view_employees_cb'],
                'icon_url' => 'dashicons-list-view',
                'position' => 100
            ],
        ];
    }

    public function initialize_admin_subpages()
    {
        $this->subpages = [
            [
                'parent_slug' => 'view_employees',
                'page_title' => 'create Employees',
                'menu_title' => 'create Employees',
                'capability' => 'manage_options',
                'menu_slug' => 'create_employees',
                'callback' => [$this->callbacks, 'create_employees_cb']
            ]
        ];
    }

    public function submenu_func()
    {
        add_submenu_page(
            'view_employees',
            'Create Employees',
            'Create Employees',
            'manage_options',
            'create_employees',
            [$this->callbacks, 'create_employees_cb']
        );
    }
}
