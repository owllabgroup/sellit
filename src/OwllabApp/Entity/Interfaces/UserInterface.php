<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:21 PM
 */

namespace OwllabApp\Entity\Interfaces;

use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface as BaseUserInterface;

/**
 * Interface UserInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface UserInterface extends BaseUserInterface,EntityInterface,
    PhoneInterface,
    EmailInterface,
    FullNameInterface
{
    const ROLE_USER        = 'ROLE_USER';
    const ROLE_ADMIN       = 'ROLE_ADMIN';
    const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';

    const DEFAULT_ROLES    = [self::ROLE_USER];

    /**
     * @return string|null
     */
    public function getUsername(): ?string;

    /**
     * @param string $username
     *
     * @return self
     */
    public function setUsername(string $username): self;

    /**
     * @return string|null
     */
    public function getPassword(): ?string;

    /**
     * @param string $password
     *
     * @return UserInterface
     */
    public function setPassword(string $password): UserInterface;

    /**
     * @return string|null
     */
    public function getRetypedPassword(): ?string;

    /**
     * @param $retypedPassword
     *
     * @return UserInterface
     */
    public function setRetypedPassword($retypedPassword): UserInterface;

    /**
     * @return AvatarInterface|null
     */
    public function getAvatar(): ? AvatarInterface;

    /**
     * @param AvatarInterface|null $avatar
     *
     * @return UserInterface
     */
    public function setAvatar(? AvatarInterface $avatar): UserInterface;

    /**
     * @return Collection
     */
    public function getPosts(): Collection;

    /**
     * @param PostInterface $post
     *
     * @return UserInterface
     */
    public function addPost(PostInterface $post): UserInterface;

    /**
     * @param PostInterface $post
     *
     * @return UserInterface
     */
    public function removePost(PostInterface $post): UserInterface;

    /**
     * @return Collection
     */
    public function getComments(): Collection;

    /**
     * @param CommentInterface $comment
     *
     * @return UserInterface
     */
    public function addComment(CommentInterface $comment): UserInterface;

    /**
     * @param CommentInterface $comment
     *
     * @return UserInterface
     */
    public function removeComment(CommentInterface $comment): UserInterface;

    /**
     * @return string|null
     */
    public function getNewPassword(): ?string;

    /**
     * @param $newPassword
     *
     * @return UserInterface
     */
    public function setNewPassword($newPassword): UserInterface;

    /**
     * @return string|null
     */
    public function getNewRetypedPassword(): ?string;

    /**
     * @param $newRetypedPassword
     *
     * @return UserInterface
     */
    public function setNewRetypedPassword($newRetypedPassword): UserInterface;

    /**
     * @return string|null
     */
    public function getOldPassword(): ?string;

    /**
     * @param $oldPassword
     *
     * @return UserInterface
     */
    public function setOldPassword($oldPassword): UserInterface;

    /**
     * @return int|null
     */
    public function getPasswordChangeDate(): ?int;

    /**
     * @param $passwordChangeDate
     *
     * @return UserInterface
     */
    public function setPasswordChangeDate($passwordChangeDate): UserInterface;

    /**
     * @return bool
     */
    public function getEnabled(): bool;

    /**
     * @param bool $enabled
     *
     * @return UserInterface
     */
    public function setEnabled(bool $enabled): UserInterface;

    /**
     * @return string|null
     */
    public function getConfirmationToken(): ?string;

    /**
     * @param string|null $confirmationToken
     *
     * @return UserInterface
     */
    public function setConfirmationToken(? string $confirmationToken): UserInterface;
}