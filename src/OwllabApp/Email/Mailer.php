<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 8:18 PM
 */

namespace OwllabApp\Email;

use OwllabApp\Email\Interfaces\MailerInterface;
use OwllabApp\Entity\User;
use Swift_Mailer;
use Symfony\Component\Config\Definition\Exception\Exception;
use Twig\Environment;

class Mailer implements MailerInterface
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var Environment
     */
    private $twig;

    public function __construct(
        \Swift_Mailer $mailer,
        Environment $twig
    )
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    /**
     * @return Swift_Mailer
     */
    public function getMailer(): Swift_Mailer
    {
        return $this->mailer;
    }

    /**
     * @return Environment
     */
    public function getTwig(): Environment
    {
        return $this->twig;
    }

    /**
     * @param User $user
     */
    public function sendConfirmationEmail(User $user): void
    {
        try {
            $body = $this->getTwig()->render(
                'email/confirmation.html.twig',
                [
                    'user' => $user
                ]
            );

            $message = (new \Swift_Message('Hello From API PLATFORM!'))
                ->setFrom('farshadasgharzade@gmail.com')
                ->setTo($user->getEmail())
                ->setBody($body, 'text/html')
            ;

            $this->getMailer()->send($message);
        } catch (\Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}