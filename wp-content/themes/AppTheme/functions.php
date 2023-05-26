<?php

function enqueue_scripts()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', [], '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'enqueue_scripts');

/**
 * 
 * Assessment 8
 */
global $allowed_attempts;
$allowed_attempts = 5;

global $time_blocked;
$time_blocked = 3 * 60; // 3 mins (180 seconds) blocked

global $transient_name;
$transient_name = 'attempts';

global $trials;
$trials = 'trials';


function check_attempts($user)
{
    global $transient_name;
    global $trials;
    global $allowed_attempts;
    global $time_blocked;

    $transient = get_transient($transient_name);

    if ($transient) {
        $user_trials = $transient[$trials];
        if ($transient[$trials] >= $allowed_attempts) {
            return new WP_Error('login_error', "Too many attempts. Try again in " . convert_seconds($time_blocked));
        }
        return new WP_Error('login_error', "Wrong password. " . $allowed_attempts - $user_trials . " trials remaining");
    }

    return $user;
}

add_filter('authenticate', 'check_attempts', 20, 3);


function login_failure()
{
    global $allowed_attempts;
    global $time_blocked;
    global $transient_name;
    global $trials;

    $transient = get_transient($transient_name);


    if ($transient) {
        $transient_data = $transient;
        $transient_data[$trials]++;

        if ($transient_data[$trials] <= $allowed_attempts) {
            set_transient($transient_name, $transient_data, $time_blocked);
        }
    } else {
        $transient_data = [$trials => 1];
        set_transient($transient_name, $transient_data, $time_blocked);
    }
}

add_action('wp_login_failed', 'login_failure', 10, 1);

function convert_seconds($seconds)
{
    if ($seconds < 60) {
        return $seconds . " seconds";
    } else {
        $minutes = floor($seconds / 60);
        $remaining_seconds = $seconds % 60;

        return $minutes . " minutes " . ($remaining_seconds > 0 ? " and " . $remaining_seconds . " seconds" : "");
    }
}
