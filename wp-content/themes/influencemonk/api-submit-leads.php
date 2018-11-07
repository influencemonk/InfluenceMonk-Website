<?php
/*
    Template Name: Api Submit Leads
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $insta = $_POST['userinstaid'];

    echo $useremail;
    echo $username;
    echo $insta;


    global $wpdb;

    $wpdb->insert(
        'leads',
        array(
            'username' => $username,
            'useremail' => $useremail,
            'instaid' => $insta
        ),
        array(
            '%s',
            '%s',
            '%s'
        )
    );
}

