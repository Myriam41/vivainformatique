<?php

namespace App\Controller;

use App\Model\Connect;

/**
 * Class FormController
 */
class FormController  extends Connect
{
    /**
     * send message to administrator
     * @var $posts
     */

    public function sendMessage()
    {
//        $data = $this->secure_db();

        $to = 'lieninformatique9@gmail.com';
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $sujet = $name.' depuis le site viva Informatique';
        $headers = 'From : ' . $email . "\r\n";

        mail($to, $sujet, $message, $headers);
    }
}
