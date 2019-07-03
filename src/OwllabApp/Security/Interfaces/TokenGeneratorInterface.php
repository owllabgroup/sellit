<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/8/19
 * Time: 10:58 PM
 */

namespace OwllabApp\Security\Interfaces;

/**
 * Interface TokenGeneratorInterface
 * @package OwllabApp\Security\Interfaces
 */
interface TokenGeneratorInterface
{
    const ALPHABET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    /**
     * @param int $length
     * @return string
     * @throws \Exception
     */
    public function getRandomSecureToken(int $length = 30): string;
}