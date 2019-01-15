<?php

namespace App\Factory;


use App\Exception\NoProviderFoundException;
use App\Mailer\BaseMailer;
use App\Mailer\MandrillMailer;

/**
 * Class MailerFactory
 * @package App\Factory
 */
class MailerFactory
{

    /**
     * @var array
     */
    protected  $classMap = [
        'mandrill' => MandrillMailer::class
    ];

    /**
     * MailerFactory constructor.
     * @param $provider
     * @param $template
     * @param array $vars
     * @param array $settings
     * @throws NoProviderFoundException
     */
    public function __construct($provider, $template, array $vars, array $settings)
    {
        if(empty($this->classMap[$provider])) {
            throw new NoProviderFoundException();
        }

        return new $this->classMap[$provider]($template, $vars, $settings);
    }
}