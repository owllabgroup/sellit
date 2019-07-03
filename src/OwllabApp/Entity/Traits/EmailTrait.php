<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:32 PM
 */

namespace OwllabApp\Entity\Traits;

use OwllabApp\Entity\Interfaces\EmailInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Trait EmailTrait
 * @package OwllabApp\Entity\Traits
 */
trait EmailTrait
{
    /**
     * @var string
     *
     * @ORM\Column(
     *     type = "string",
     *     nullable = true,
     * )
     * @Assert\Type(type="string")
     * @Assert\Length(
     *      min = OwllabApp\Entity\Interfaces\ConstantInterface::EMAIL_LENGTH_MIN,
     *      max = OwllabApp\Entity\Interfaces\ConstantInterface::EMAIL_LENGTH_MAX
     * )
     * @Groups({"get", "post"})
     * @Assert\NotNull(groups={"post"})
     * @Assert\NotBlank(groups={"post"})
     * @Assert\Email(checkMX = true)
     */
    protected $email;

    /**
     * @return string|null
     */
    public function getEmail(): ? string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     *
     * @return EmailInterface
     */
    public function setEmail(? string $email): EmailInterface
    {
        $this->email = $email;

        return $this;
    }
}