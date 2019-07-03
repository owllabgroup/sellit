<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:44 PM
 */

namespace OwllabApp\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\FullNameInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait FullNameTrait
 * @package OwllabApp\Entity\Traits
 */
trait FullNameTrait
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"get", "post"})
     * @Assert\NotNull(groups={"post"})
     * @Assert\NotBlank(groups={"post"})
     * @Assert\Type(type="string")
     * @Assert\Length(
     *     min = OwllabApp\Entity\Interfaces\ConstantInterface::NAME_LENGTH_MIN,
     *     max = OwllabApp\Entity\Interfaces\ConstantInterface::NAME_LENGTH_MAX
     * )
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"get", "post"})
     * @Assert\NotNull(groups={"post"})
     * @Assert\NotBlank(groups={"post"})
     * @Assert\Type(type="string")
     * @Assert\Length(
     *     min = OwllabApp\Entity\Interfaces\ConstantInterface::NAME_LENGTH_MIN,
     *     max = OwllabApp\Entity\Interfaces\ConstantInterface::NAME_LENGTH_MAX
     * )
     */
    protected $lastName;

    /**
     * @return string
     */
    public function getFirstName(): ? string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     *
     * @return FullNameInterface
     */
    public function setFirstName(? string $firstName): FullNameInterface
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ? string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     *
     * @return FullNameInterface
     */
    public function setLastName(? string $lastName): FullNameInterface
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @Groups({"get", "get-comment-with-author", "get-post-with-author"})
     * @return string|null
     */
    public function getFullName(): ? string
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
}