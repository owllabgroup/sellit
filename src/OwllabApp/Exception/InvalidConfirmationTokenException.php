<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 7:39 PM
 */

namespace OwllabApp\Exception;

use OwllabApp\Exception\Interfaces\InvalidConfirmationExceptionInterface;
use Throwable;

/**
 * Class InvalidConfirmationTokenException
 * @package OwllabApp\Exception
 */
class InvalidConfirmationTokenException extends \Exception implements InvalidConfirmationExceptionInterface
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct('Confirm token is invalid.', $code, $previous);
    }
}