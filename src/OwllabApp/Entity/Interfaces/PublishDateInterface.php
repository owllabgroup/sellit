<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:51 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Class PublishDateInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface PublishDateInterface
{
    /**
     * @return \DateTimeInterface|null
     */
    public function getPublished(): ? \DateTimeInterface;

    /**
     * @param \DateTimeInterface|null $published
     *
     * @return self
     */
    public function setPublished(? \DateTimeInterface $published): self;
}