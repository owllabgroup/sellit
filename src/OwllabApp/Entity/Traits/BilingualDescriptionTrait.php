<?php
/**
 * This file is part of cardioclinic
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshadi
 * Date: 2018/04/01
 */

namespace OwllabApp\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\BilingualDescriptionInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait BilingualDescriptionTrait
 * @package OwllabApp\Entity\Traits
 */
trait BilingualDescriptionTrait
{
    /**
     * @var string
     *
     * @Assert\Length(
     *      min = OwllabApp\Entity\Interfaces\ConstantInterface::DESCRIPTION_LENGTH_MIN,
     *      max = OwllabApp\Entity\Interfaces\ConstantInterface::DESCRIPTION_LENGTH_MAX,
     * )
     * @ORM\Column(type="text", nullable=true)
     */
    protected $faDescription;

    /**
     * @var string
     *
     * @Assert\Length(
     *      min = OwllabApp\Entity\Interfaces\ConstantInterface::DESCRIPTION_LENGTH_MIN,
     *      max = OwllabApp\Entity\Interfaces\ConstantInterface::DESCRIPTION_LENGTH_MAX,
     * )
     * @ORM\Column(type="text", nullable=true)
     */
    protected $enDescription;

    /**
     * @return string|null
     */
    public function getFaDescription(): ? string
    {
        return $this->faDescription;
    }

    /**
     * @param string|null $faDescription
     *
     * @return BilingualDescriptionInterface
     */
    public function setFaDescription(? string $faDescription): BilingualDescriptionInterface
    {
        $this->faDescription = $faDescription;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEnDescription(): ? string
    {
        return $this->enDescription;
    }

    /**
     * @param string|null $enDescription
     *
     * @return BilingualDescriptionInterface
     */
    public function setEnDescription(? string $enDescription): BilingualDescriptionInterface
    {
        $this->enDescription = $enDescription;

        return $this;
    }
}