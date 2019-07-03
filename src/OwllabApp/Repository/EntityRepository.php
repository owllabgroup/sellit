<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 11:55 PM
 */

namespace OwllabApp\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use OwllabApp\Repository\Interfaces\EntityRepositoryInterfaces;

/**
 * Class EntityRepository
 * @package OwllabApp\Repository
 */
abstract class EntityRepository extends ServiceEntityRepository implements EntityRepositoryInterfaces
{
    /**
     * EntityRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, $this->getEntityClass());
    }
}