<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/8/19
 * Time: 11:19 PM
 */

namespace OwllabApp\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use OwllabApp\Entity\Interfaces\UserConfirmationInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserConfirmation
 * @package OwllabApp\Entity
 * @ApiResource(
 *     collectionOperations={
 *          "post"={
 *              "path"="users/confirm"
 *          }
 *     },
 *     itemOperations={}
 * )
 */
class UserConfirmation implements UserConfirmationInterface
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=30, max=30)
     */
    public $confirmationToken;

    /**
     * @return string|null
     */
    public function getConfirmationToken(): ? string
    {
        return $this->confirmationToken;
    }
}