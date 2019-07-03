<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/4/19
 * Time: 1:08 AM
 */

namespace OwllabApp\Repository;

use OwllabApp\Entity\Post;
use OwllabApp\Repository\Interfaces\PostRepositoryInterface;

/**
 * Class Post
 * @package OwllabApp\Repository
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends EntityRepository implements PostRepositoryInterface
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Post::class;
    }
}