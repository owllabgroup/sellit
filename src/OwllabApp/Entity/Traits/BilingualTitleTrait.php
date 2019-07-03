<?php
/**
 * This file is part of cardioclinic
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshadi
 * Date: 2018/04/01
 */

namespace OwllabApp\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait BilingualTitleTrait
 * @package OwllabApp\Entity\Traits
 */
trait BilingualTitleTrait
{
    use LabelTrait;

    /**
     * @var string
     *
     * @Assert\Length(
     *      min = OwllabApp\Entity\Interfaces\ConstantInterface::TITLE_LENGTH_MIN,
     *      max = OwllabApp\Entity\Interfaces\ConstantInterface::TITLE_LENGTH_MAX,
     * )
     * @ORM\Column(type="string", nullable = true)
     */
    protected $faTitle;

    /**
     * @var string
     *
     * @Assert\Length(
     *      min = OwllabApp\Entity\Interfaces\ConstantInterface::TITLE_LENGTH_MIN,
     *      max = OwllabApp\Entity\Interfaces\ConstantInterface::TITLE_LENGTH_MAX,
     * )
     * @ORM\Column(type="string", nullable = true)
     */
    protected $enTitle;

    /**
     * @return string|null
     */
    public function getFaTitle(): ?string
    {
        return $this->faTitle;
    }

    /**
     * @param string|null $faTitle
     *
     * @return BilingualTitleTrait
     */
    public function setFaTitle(? string $faTitle): BilingualTitleTrait
    {
        $this->faTitle = $faTitle;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEnTitle(): ?string
    {
        return $this->enTitle;
    }

    /**
     * @param string|null $enTitle
     *
     * @return BilingualTitleTrait
     */
    public function setEnTitle(? string $enTitle): BilingualTitleTrait
    {
        $this->enTitle = $enTitle;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFaLabel(): ?string
    {
        return $this->getFaTitle();
    }

    /**
     * @return string|null
     */
    public function getEnLabel(): ?string
    {
        return $this->getEnTitle();
    }
}