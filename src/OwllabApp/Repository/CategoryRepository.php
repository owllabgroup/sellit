<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/4/19
 * Time: 1:03 AM
 */

namespace OwllabApp\Repository;

use OwllabApp\Entity\Category;
use OwllabApp\Repository\Interfaces\CategoryRepositoryInterface;

/**
 * Class CategoryRepository
 * @package OwllabApp\Repository
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends EntityRepository implements CategoryRepositoryInterface
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Category::class;
    }
}