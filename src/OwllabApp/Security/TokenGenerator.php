<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 3:02 PM
 */

namespace OwllabApp\Security;

use OwllabApp\Security\Interfaces\TokenGeneratorInterface;

/**
 * Class TokenGenerator
 * @package OwllabApp\Security
 */
class TokenGenerator implements TokenGeneratorInterface
{
    /**
     * @param int $length
     * @return string
     * @throws \Exception
     */
    public function getRandomSecureToken(int $length = 30): string
    {
       $token = '';
       $maxNumber = strlen(self::ALPHABET);
       for ($i = 0; $i < $length; $i++) {
           $token .= self::ALPHABET[random_int(0, $maxNumber - 1)];
       }

       return $token;
    }
}