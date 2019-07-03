<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 11:34 PM
 */

namespace OwllabApp\Entity\Traits;

use OwllabApp\Entity\Interfaces\PhoneInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait PhoneTrait
 * @package OwllabApp\Entity\Traits
 */
trait PhoneTrait
{
    /**
     * @var string
     *
     * @ORM\Column(type = "string")
     *
     * @Groups({"get", "post"})
     * @Assert\NotNull(groups={"post"})
     * @Assert\NotBlank(groups={"post"})
     * @Assert\Type(type="str`ing")
     * @Assert\Length(
     *     min = OwllabApp\Entity\Interfaces\ConstantInterface::PHONE_LENGTH_MIN,
     *     max = OwllabApp\Entity\Interfaces\ConstantInterface::PHONE_LENGTH_MAX
     * )
     */
    protected $phone;

    /**
     * @return null|string
     */
    public function getPhone(): ? string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     *
     * @return PhoneInterface
     */
    public function setPhone(? string $phone): PhoneInterface
    {
        $this->phone = $phone;

        return $this;
    }
}