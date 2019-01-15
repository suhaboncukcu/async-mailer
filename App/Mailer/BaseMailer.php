<?php

namespace App\Mailer;


/**
 * Class BaseMailer
 *
 * @method mixed send($message)
 *
 * @package App\Mailer
 */
abstract class BaseMailer
{
    /** @var mixed $handler */
    protected $handler;

    /** @var string $template */
    protected $template;

    /** @var array $vars */
    protected $vars;

    /** @var array $settings */
    protected $settings;

    /**
     * BaseMailer constructor.
     * @param mixed $handler
     * @param string $template
     * @param array $vars
     * @param array $settings
     */
    public function __construct($handler, $template, array $vars, array $settings)
    {
        $this->handler = $handler;
        $this->template = $template;
        $this->vars = $vars;
        $this->settings = $settings;
    }

    /**
     * @return mixed
     */
    public function getHandler()
    {
        return $this->handler;
    }


    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return array
     */
    public function getVars()
    {
        return $this->vars;
    }

    /**
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }


}