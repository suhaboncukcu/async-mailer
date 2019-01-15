<?php

namespace App\Exception;


use Throwable;

/**
 * Class NoProviderFoundException
 * @package App\Exceptions
 */
class NoProviderFoundException extends \Exception
{
    /**
     * NoProviderFoundException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}