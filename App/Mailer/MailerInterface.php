<?php

namespace App\Mailer;


/**
 * Interface MailerInterface
 * @package App\Mailer
 */
interface MailerInterface
{
    /**
     * @param string $message
     * @return mixed
     */
    public function send($message);
}