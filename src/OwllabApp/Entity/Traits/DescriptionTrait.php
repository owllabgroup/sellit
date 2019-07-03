<?php
/**
 * This file is part of cardioclinic
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshadi
 * Date: 2018/04/01
 */

namespace OwllabApp\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\DescriptionInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait DescriptionTrait
 * @package OwllabApp\Entity\Traits
 */
trait DescriptionTrait
{
    /**
     * @var string
     *
     * @Assert\Length(
     *      min = OwllabApp\Entity\Interfaces\ConstantInterface::DESCRIPTION_LENGTH_MIN,
     *      max = OwllabApp\Entity\Interfaces\ConstantInterface::DESCRIPTION_LENGTH_MAX,
     * )
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"post", "get-post-with-author"})
     */
    protected $description;

    /**
     * @return string|null
     */
    public function getDescription(): ? string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return DescriptionInterface
     */
    public function setDescription(? string $description): DescriptionInterface
    {
        $this->description = $description;

        return $this;
    }
}