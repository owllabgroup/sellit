<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 11:54 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface TagInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface TagInterface extends EntityInterface, TitleInterface
{
    /**
     * @return int|null
     */
    public function getUsageCount(): ? int;

    /**
     * @param int|null $usageCount
     *
     * @return self
     */
    public function setUsageCount(? int $usageCount): self;
}