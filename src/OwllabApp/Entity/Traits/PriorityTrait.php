<?php
/**
 * This file is part of cardioclinic
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshad
 * Date: 7/10/18
 */

namespace OwllabApp\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\PriorityInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait PriorityTrait
 * @package OwllabApp\Entity\Traits
 */
trait PriorityTrait
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    protected $priority;

    /**
     * @return int|null
     */
    public function getPriority(): ? int
    {
        return $this->priority;
    }

    /**
     * @param int|null $priority
     *
     * @return PriorityInterface
     */
    public function setPriority(? int $priority): PriorityInterface
    {
        $this->priority = $priority;

        return $this;
    }
}