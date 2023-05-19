<?php

/**
 * @package assessment
 */

namespace Inc\Api;

class SettingsApi
{
    public $admin_pages = array();
    public $admin_subpages = array();


    public function register()
    {
        if (!empty($this->admin_pages)) {
            add_action('admin_menu', [$this, 'add_admin_menu_fn']);
        }
    }

    public function add_pages_fn(array $pages)
    {
        $this->admin_pages = $pages;
        return $this;
    }

    public function has_subpages_fn(string $title = null)
    {
        if (empty($this->admin_pages)) {
            return $this;
        }

        $admin_page = $this->admin_pages[0];

        $first_page = [
            'parent_slug' => $admin_page['menu_slug'],
            'page_title' => $admin_page['page_title'],
            'menu_title' => $title ?? $admin_page['menu_title'],
            'capability' => $admin_page['capability'],
            'menu_slug' => $admin_page['menu_slug'],
            'callback' => $admin_page['callback']
        ];

        $this->admin_subpages = $first_page;
        return $this;
    }

    public function add_subpage_fn(array $subpages)
    {
        $this->admin_subpages = array_merge($this->admin_subpages, $subpages);
        return $this;
    }

    public function add_admin_menu_fn()
    {
        foreach ($this->admin_pages as $page) {
            add_menu_page(
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback'],
                $page['icon_url'],
                $page['position']
            );
        }

        // foreach ($this->admin_subpages as $subpage) {
        //     add_submenu_page(
        //         $subpage['parent_slug'],
        //         $subpage['page_title'],
        //         $subpage['menu_title'],
        //         $subpage['capability'],
        //         $subpage['menu_slug'],
        //         $subpage['callback']
        //     );
        // }
    }
}
