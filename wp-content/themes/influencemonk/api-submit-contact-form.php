<?php
/*
    Template Name: Api Submit Contact Form
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_to = $_POST['emailTo'];
    $email_from = $_POST['emailFrom'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: ' . $email_from . ' ' . "\r\n";

    wp_mail($email_to, $subject, $message, $headers);

    global $wpdb;

    $wpdb->insert(
        'contactForm',
        array(
            'subject' => $messages,
            'email' => $email_from
        ),
        array(
            '%s',
            '%s'
        )
    );
}