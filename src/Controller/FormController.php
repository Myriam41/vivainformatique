<?php

namespace App\Controller;

/**
 * Class FormController
 */
class FormController
{
    /**
     * send message to administrator 
     *
     * @var $posts
     */

    public function sendMessage() {

        $to = 'lieninformatique9@gmail.com';
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_post['message']);
        $sujet = $name.' depuis le site viva Informatique';
        $headers = 'From : ' . $email . "\r\n";

        mail($to, $sujet, $message, $headers);
    }
}