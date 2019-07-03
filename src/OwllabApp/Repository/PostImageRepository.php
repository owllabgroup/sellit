<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/4/19
 * Time: 1:08 AM
 */

namespace OwllabApp\Repository;

use OwllabApp\Entity\PostImage;
use OwllabApp\Repository\Interfaces\PostImageRepositoryInterface;

/**
 * Class PostImageRepository
 * @package OwllabApp\Repository
 * @method PostImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostImage[]    findAll()
 * @method PostImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostImageRepository extends EntityRepository implements PostImageRepositoryInterface
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return PostImage::class;
    }
}