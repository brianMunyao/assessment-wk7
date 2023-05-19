<?php
/*
Template Name: Home Template
*/
get_header(); ?>


<div class="container">

    <h1>Available Employees</h1>

    <?php
    global $wpdb;

    $employees_table = $wpdb->prefix . 'employees';

    $employees = $wpdb->get_results("SELECT * FROM $employees_table");


    ?>

    <a href="<?php echo admin_url('admin.php?page=create_employees') ?>">
        <button>
            Add An Employee
        </button></a>
    <table>
        <tr>
            <th>No.</th>
            <th>Employee Name</th>
            <th>Employee Email</th>
            <th>Gender</th>
        </tr>

        <?php
        if (count($employees) > 0) {
            $counter = 0;
            foreach ($employees as $employee) {
                $counter++;
        ?>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $employee->e_name; ?></td>
                    <td><?php echo $employee->e_email; ?></td>
                    <td><?php echo $employee->e_gender; ?></td>

                </tr>
            <?php

            }
        } else {
            ?>
            <tr>
                <td colspan="4">No employees available</td>
            </tr>

        <?php
        }
        ?>
    </table>
</div>


<style>
    .container * {
        font-size: 16px;
    }

    .container h1 {
        font-size: 30px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin: 10px 10px 10px 0;
    }

    table,
    th,
    td {
        border: 1.5px solid rgba(222, 154, 58, 0.5);
    }

    td,
    th {
        text-align: left;
        padding: 10px;
    }

    button {
        margin-top: 10px;
        background: teal;
        color: #fff;
        padding: 5px 10px;
        font-size: 15px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        margin-bottom: 10px;
    }

    button:hover {
        background: #055658;
    }
</style>

<?php get_footer(); ?>