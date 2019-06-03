<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 6:58 PM
 */

namespace OwllabApp\Exception;

use OwllabApp\Exception\Interfaces\EmptyBodyExceptionInterface;
use Throwable;

/**
 * Class EmptyBodyException
 * @package OwllabApp\Exception
 */
class EmptyBodyException extends \Exception implements EmptyBodyExceptionInterface
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct('The body of the POST/PUT cannot be empty', $code, $previous);
    }
}