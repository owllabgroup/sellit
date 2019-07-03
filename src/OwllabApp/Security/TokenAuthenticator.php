<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 12:54 PM
 */

namespace OwllabApp\Security;

use OwllabApp\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\ExpiredTokenException;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator;
use OwllabApp\Security\Interfaces\TokenAuthenticatorInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class TokenAuthenticator extends JWTTokenAuthenticator implements TokenAuthenticatorInterface
{
    /**
     * @param $preAuthToken
     * @param UserProviderInterface $userProvider
     * @return \Symfony\Component\Security\Core\User\UserInterface|null
     */
    public function getUser($preAuthToken, UserProviderInterface $userProvider)
    {
        $user = parent::getUser($preAuthToken, $userProvider);

        if ($user instanceof User
            && $user->getPasswordChangeDate()
            && $preAuthToken->getPayload()['iat'] < $user->getPasswordChangeDate()) {

            throw new ExpiredTokenException();
        }

        return $user;
    }
}