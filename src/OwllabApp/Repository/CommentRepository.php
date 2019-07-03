<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/4/19
 * Time: 1:04 AM
 */

namespace OwllabApp\Repository;

use OwllabApp\Entity\Comment;
use OwllabApp\Repository\Interfaces\CommentRepositoryInterface;

/**
 * Class CommentRepository
 * @package OwllabApp\Repository
 * @method Comment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comment[]    findAll()
 * @method Comment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentRepository extends EntityRepository implements CommentRepositoryInterface
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Comment::class;
    }
}