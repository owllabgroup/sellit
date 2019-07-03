<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/4/19
 * Time: 1:08 AM
 */

namespace OwllabApp\Repository;

use OwllabApp\Entity\User;
use OwllabApp\Repository\Interfaces\UserRepositoryInterface;

/**
 * Class User
 * @package OwllabApp\Repository
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return User::class;
    }
}