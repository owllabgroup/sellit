<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/4/19
 * Time: 1:08 AM
 */

namespace OwllabApp\Repository;

use OwllabApp\Entity\Avatar;
use OwllabApp\Repository\Interfaces\AvatarRepositoryInterface;

/**
 * Class AvatarRepository
 * @package OwllabApp\Repository
 * @method Avatar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avatar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avatar[]    findAll()
 * @method Avatar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvatarRepository extends EntityRepository implements AvatarRepositoryInterface
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Avatar::class;
    }
}