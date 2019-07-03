<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/4/19
 * Time: 1:08 AM
 */

namespace OwllabApp\Repository;

use OwllabApp\Entity\Tag;
use OwllabApp\Repository\Interfaces\TagRepositoryInterface;

/**
 * Class Tag
 * @package OwllabApp\Repository
 * @method Tag|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tag|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tag[]    findAll()
 * @method Tag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagRepository extends EntityRepository implements TagRepositoryInterface
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Tag::class;
    }
}