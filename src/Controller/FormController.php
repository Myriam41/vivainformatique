<?php

namespace App\Controller;

use App\Model\Connect;

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

    public function sendMessage()
    {
        $to = 'lieninformatique9@gmail.com';
        $name = secure_db($_POST['name']);
        $email = secure_db($_POST['email']);
        $message = secure_db($_POST['message']);
        $sujet = $name.' depuis le site viva Informatique';
        $headers = 'From : ' . $email . "\r\n";

        mail($to, $sujet, $message, $headers);
    }
}
