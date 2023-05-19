<?php

/**
 * @package assessment
 */

namespace Inc\Pages;

class ManageEmployees
{
    public function register()
    {
        $this->create_employees_table();
        $this->create_new_employee();
    }

    private function create_employees_table()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'employees';

        $wpdb->query("CREATE TABLE IF NOT EXISTS $table(
            e_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            e_name TEXT NOT NULL,
            e_email TEXT NOT NULL,
            e_gender TEXT NOT NULL
        );");
    }

    private function create_new_employee()
    {
        if (isset($_POST['create_employee'])) {
            $data = [
                'e_name' => $_POST['e_name'],
                'e_email' => $_POST['e_email'],
                'e_gender' => $_POST['e_gender'],
            ];

            global $wpdb;
            $table = $wpdb->prefix . 'employees';

            $result = $wpdb->insert($table, $data);

            if ($result) {
                echo "<script>alert('Employee created')</script>";
            } else {
                echo "<script>alert('Error creating employee')</script>";
            }
        }
    }
}
