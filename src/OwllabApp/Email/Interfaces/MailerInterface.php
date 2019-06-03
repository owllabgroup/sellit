<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 8:18 PM
 */

namespace OwllabApp\Email\Interfaces;

use OwllabApp\Entity\User;
use Swift_Mailer;
use Twig\Environment;

/**
 * Interface MailerInterface
 * @package OwllabApp\Email\Interfaces
 */
interface MailerInterface
{

    /**
     * @return Swift_Mailer
     */
    public function getMailer(): Swift_Mailer;

    /**
     * @return Environment
     */
    public function getTwig(): Environment;

    public function sendConfirmationEmail(User $user);
}