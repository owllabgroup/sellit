<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:21 PM
 */

namespace OwllabApp\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Controller\ResetPasswordAction;
use OwllabApp\Entity\Interfaces\AvatarInterface;
use OwllabApp\Entity\Interfaces\CommentInterface;
use OwllabApp\Entity\Interfaces\ImageInterface;
use OwllabApp\Entity\Interfaces\PostInterface;
use OwllabApp\Entity\Interfaces\UserInterface;
use OwllabApp\Entity\Traits\EmailTrait;
use OwllabApp\Entity\Traits\FullNameTrait;
use OwllabApp\Entity\Traits\IdTrait;
use OwllabApp\Entity\Traits\PhoneTrait;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 *
 * @ApiResource(
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *          },
 *          "put"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object == user",
 *              "normalization_context"={
 *                  "groups"={"get"}
 *              },
 *              "denormalization_context"={
 *                  "groups"={"put"}
 *              }
 *          },
 *          "put-reset-password-with-id"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object == user",
 *              "method"="PUT",
 *              "path"="/users/{id}/reset-password",
 *              "controller"=ResetPasswordAction::class,
 *              "denormalization_context"={
 *                  "groups"={"put-reset-password"}
 *              },
 *              "validation_groups"={"post"},
 *          }
 *      },
 *     collectionOperations={
 *          "post"={
 *              "denormalization_context"={
 *                  "groups"={"post"}
 *              },
 *              "normalization_context"={
 *                  "groups"={"get"}
 *              },
 *              "validation_groups"={"post"},
 *          }
 *      },
 *     normalizationContext={
 *          "groups"={"get"}
 *     }
 * )
 *
 * @package OwllabApp\Entity
 * @ORM\Entity(repositoryClass="OwllabApp\Repository\UserRepository")
 * @ORM\Table(name="`user`")
 * @ORM\HasLifecycleCallbacks()
 * )
 */
class User implements UserInterface
{
    use IdTrait,
        EmailTrait,
        FullNameTrait,
        PhoneTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"get", "post", "get-comment-with-author", "get-post-with-author"})
     * @Assert\NotBlank(groups={"post"})
     * @Assert\Length(min=6, max=255, groups={"post"})
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"post"})
     * @Assert\NotBlank(groups={"post"})
     * @Assert\Regex(
     *     pattern="/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{7,}/",
     *     message="Password must be seven characters long and contain at least one digit, one upper case letter and one lower case letter",
     *     groups={"post"}
     * )
     */
    protected $password;

    /**
     * @var string
     *
     * @Groups({"post"})
     * @Assert\NotBlank(groups={"put-reset-password"})
     * @Assert\Expression(
     *     "this.getPassword() === this.getRetypedPassword()",
     *     message="Passwords does not match",
     *     groups={"put-reset-password"}
     * )
     */
    protected $retypedPassword;

    /**
     * @var string
     *
     * @Groups({"put-reset-password"})
     * @Assert\NotBlank(groups={"put-reset-password"})
     * @Assert\Regex(
     *     pattern="/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{7,}/",
     *     message="Password must be seven characters long and contain at least one digit, one upper case letter and one lower case letter",
     *     groups={"put-reset-password"}
     * )
     */
    protected $newPassword;

    /**
     * @var string
     *
     * @Groups({"put-reset-password"})
     * @Assert\NotBlank(groups={"put-reset-password"})
     * @Assert\Expression(
     *     "this.getNewPassword() === this.getNewRetypedPassword()",
     *     message="Passwords does not match",
     *     groups={"put-reset-password"}
     * )
     */
    protected $newRetypedPassword;

    /**
     * @var string
     *
     * @Groups({"put-reset-password"})
     * @Assert\NotBlank(groups={"put-reset-password"})
     * @UserPassword(groups={"put-reset-password"})
     */
    protected $oldPassword;

    /**
     * @var string
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $passwordChangeDate;

    /**
     * @var array
     *
     * @ORM\Column(type="simple_array", length=200)
     * @Groups({"get-admin", "get-owner"})
     */
    protected $roles;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $enabled;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    protected $confirmationToken;

    /**
     * @var AvatarInterface
     *
     * @ORM\OneToOne(targetEntity="OwllabApp\Entity\Avatar", mappedBy="user")
     * @Groups({"get", "get-comment-with-author", "post"})
     */
    protected $avatar;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="OwllabApp\Entity\Post", mappedBy="author")
     */
    protected $posts;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="OwllabApp\Entity\Comment", mappedBy="author")
     */
    protected $comments;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->posts = new ArrayCollection();
        $this->enabled = false;
        $this->roles = self::DEFAULT_ROLES;
        $this->confirmationToken = null;

    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return UserInterface
     */
    public function setUsername(string $username): UserInterface
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return UserInterface
     */
    public function setPassword(string $password): UserInterface
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRetypedPassword(): ?string
    {
        return $this->retypedPassword;
    }

    /**
     * @param $retypedPassword
     *
     * @return UserInterface
     */
    public function setRetypedPassword($retypedPassword): UserInterface
    {
        $this->retypedPassword = $retypedPassword;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array|null $roles
     *
     * @return User
     */
    public function setRoles(? array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return AvatarInterface|null
     */
    public function getAvatar(): ? AvatarInterface
    {
        return $this->avatar;
    }

    /**
     * @param AvatarInterface|null $avatar
     *
     * @return UserInterface
     */
    public function setAvatar(? AvatarInterface $avatar): UserInterface
    {
        if ($avatar instanceof AvatarInterface) {
            $avatar->setUser($this);
        }
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    /**
     * @param PostInterface $post
     *
     * @return UserInterface
     */
    public function addPost(PostInterface $post): UserInterface
    {
        if (!$this->getPosts()->contains($post)) {

            $this->getPosts()->add($post);
        }
        return $this;

    }

    /**
     * @param PostInterface $post
     *
     * @return UserInterface
     */
    public function removePost(PostInterface $post): UserInterface
    {
        if ($this->getPosts()->contains($post)) {

            $this->getPosts()->add($post);
        }
        return $this;

    }

    /**
     * @return Collection
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    /**
     * @param CommentInterface $comment
     *
     * @return UserInterface
     */
    public function addComment(CommentInterface $comment): UserInterface
    {
        if (!$this->getComments()->contains($comment)) {

            $this->getComments()->add($comment);
        }
        return $this;

    }

    /**
     * @param CommentInterface $comment
     *
     * @return UserInterface
     */
    public function removeComment(CommentInterface $comment): UserInterface
    {
        if ($this->getComments()->contains($comment)) {

            $this->getComments()->add($comment);
        }
        return $this;

    }

    /**
     * @return string|null
     */
    public function getNewPassword(): ?string
    {
        return $this->newPassword;
    }

    /**
     * @param $newPassword
     *
     * @return UserInterface
     */
    public function setNewPassword($newPassword): UserInterface
    {
        $this->newPassword = $newPassword;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNewRetypedPassword(): ?string
    {
        return $this->newRetypedPassword;
    }

    /**
     * @param $newRetypedPassword
     *
     * @return UserInterface
     */
    public function setNewRetypedPassword($newRetypedPassword): UserInterface
    {
        $this->newRetypedPassword = $newRetypedPassword;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOldPassword(): ?string
    {
        return $this->oldPassword;
    }

    /**
     * @param $oldPassword
     *
     * @return UserInterface
     */
    public function setOldPassword($oldPassword): UserInterface
    {
        $this->oldPassword = $oldPassword;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPasswordChangeDate(): ?int
    {
        return $this->passwordChangeDate;
    }

    /**
     * @param $passwordChangeDate
     *
     * @return UserInterface
     */
    public function setPasswordChangeDate($passwordChangeDate): UserInterface
    {
        $this->passwordChangeDate = $passwordChangeDate;

        return $this;
    }

    /**
     * @return bool
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     *
     * @return UserInterface
     */
    public function setEnabled(bool $enabled): UserInterface
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getConfirmationToken(): ?string
    {
        return $this->confirmationToken;
    }

    /**
     * @param string|null $confirmationToken
     *
     * @return UserInterface
     */
    public function setConfirmationToken(? string $confirmationToken): UserInterface
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    public function __toString(): ?string
    {
        return $this->getFullName();
    }
}