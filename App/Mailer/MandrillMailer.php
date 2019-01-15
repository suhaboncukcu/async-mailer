<?php

namespace App\Mailer;


use josegonzalez\Dotenv\Loader;

final class MandrillMailer extends BaseMailer implements MailerInterface
{

    /**
     * MandrillMailer constructor.
     * @param $template
     * @param array $settings
     * @throws \Mandrill_Error
     */
    public function __construct($template, array $settings)
    {

        $config = (new Loader(CONFIG_FILE))
                    ->parse()
                    ->toArray();

        $mandrill = new \Mandrill($config['MANDRILLKEY']);

        parent::__construct($mandrill, $template, [], $settings);

    }


    /**
     * @param string $message
     * @return mixed
     */
    public function send($message)
    {
        $vars = $this->getVars();
        $settings = $this->getSettings();

        /** @var \Mandrill $mandrill */
        $mandrill = $this->getHandler();

        $async = $settings['async'] ?? true;
        $ipPool = $settings['ipPool'] ?? 'main';

        $result = $mandrill->messages->sendTemplate($this->getTemplate(), [], $message, $async, $ipPool, date('Y-m-d H:i:s'));

        return $result;
    }

}