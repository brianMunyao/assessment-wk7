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
            [
                'page_title' => 'Create employees',
                'menu_title' => 'Create employees',
                'capability' => 'manage_options',
                'menu_slug' => 'create_employees',
                'callback' => [$this->callbacks, 'create_employees_cb'],
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
                'page_title' => 'Register Employee',
                'menu_title' => 'Register Employee',
                'capability' => 'manage_options',
                'menu_slug' => 'register_employee',
                'callback' => [$this->callbacks, 'create_employees_cb']
            ], [
                'parent_slug' => 'view_employees',
                'page_title' => 'Register Employee',
                'menu_title' => 'Register Employee',
                'capability' => 'manage_options',
                'menu_slug' => 'register_employee',
                'callback' => [$this->callbacks, 'create_employees_cb']
            ]
        ];

        // add_submenu_page(
        //     'view_employees',
        //     'Register Employee',
        //     'Register Employee',
        //     'manage_options',
        //     'register_employee',
        //     [$this->callbacks, 'create_employees_cb']
        // );
    }
}
