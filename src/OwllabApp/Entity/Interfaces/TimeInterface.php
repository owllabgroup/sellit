<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/4/19
 * Time: 12:14 AM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface TimeInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface TimeInterface
{
    /**
     * @return \DateTimeInterface|null
     */
    public function getTime(): ? \DateTimeInterface;

    /**
     * @param \Datetime|null $time
     *
     * @return self
     */
    public function setTime(? \Datetime $time): self;

    /**
     * @param string $format
     *
     * @return null|string
     */
    public function getTimeToString(string $format = ConstantInterface::TIME_FORMAT): ? string;
}