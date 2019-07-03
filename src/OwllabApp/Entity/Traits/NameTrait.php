<?php
/**
 * This file is part of cardioclinic
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshadi
 * Date: 2018/04/01
 */

namespace NarmafzamApp\Model\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\NameInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait NameTrait
 * @package NarmafzamApp\Model\Entity\Traits
 */
trait NameTrait
{
    /**
     * @var string
     *
     * @ORM\Column(type = "string")
     *
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Length(
     *     min = OwllabApp\Entity\Interfaces\ConstantInterface::NAME_LENGTH_MIN,
     *     max = OwllabApp\Entity\Interfaces\ConstantInterface::NAME_LENGTH_MAX
     * )
     */
    protected $name;

    /**
     * @return null|string
     */
    public function getName(): ? string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return NameInterface
     */
    public function setName(? string $name): NameInterface
    {
        $this->name = $name;

        return $this;
    }
}