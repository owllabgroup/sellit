<?php
/**
 *     _   __                           ____
 *    / | / /___ __________ ___  ____ _/ __/___ ____ _____ ___
 *   /  |/ / __ `/ ___/ __ `__ \/ __ `/ /_/_  // __ `/ __ `__ \
 *  / /|  / /_/ / /  / / / / / / /_/ / __/ / // /_/ / / / / / /
 * /_/ |_/\__,_/_/  /_/ /_/ /_/\__,_/_/   /___|__,_/_/ /_/ /_/
 *
 * This file is part of cardioclinic
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshad
 * Date: 11/11/18
 */

namespace OwllabApp\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\ConstantInterface;
use OwllabApp\Entity\Interfaces\TimeInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait TimeTrait
 * @package OwllabApp\Entity\Traits
 */
trait TimeTrait
{
    /**
     * @var \Datetime
     *
     * @ORM\Column(type="time")
     * @Assert\Time()
     */
    protected $time;

    /**
     * @return \DateTimeInterface|null
     */
    public function getTime(): ? \DateTimeInterface
    {
        return $this->time;
    }

    /**
     * @param \Datetime|null $time
     *
     * @return TimeInterface
     */
    public function setTime(? \Datetime $time): TimeInterface
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @param string $format
     *
     * @return null|string
     */
    public function getTimeToString(string $format = ConstantInterface::TIME_FORMAT): ? string
    {
        if (!empty($this->getTime())) {
            return $this->getTime()->format($format);
        }
        return null;
    }
}