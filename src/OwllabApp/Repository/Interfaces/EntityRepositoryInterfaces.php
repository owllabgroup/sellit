<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 11:56 PM
 */

namespace OwllabApp\Repository\Interfaces;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepositoryInterface;

/**
 * Class EntityRepositoryInterfaces
 * @package OwllabApp\Repository\Interfaces
 */
interface EntityRepositoryInterfaces extends ServiceEntityRepositoryInterface
{
    /**
     * @return string
     */
    public function getEntityClass(): string;
}