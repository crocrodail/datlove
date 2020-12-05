<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class Mailer {

    private $mailerInterface;

    public function __construct(MailerInterface $mailer){
        $this->mailerInterface = $mailer;
    }

    public function sendMail($email){
        $email = new Email();
        $email->from('no-reply@datlove.fr')
        ->to('crocrodail@venato.com')
        ->subject('Bienvenue sur mon site internet')
        ->html('<h1>Bonjour</h1>');

        $this->mailerInterface->send($email);
    }

}
