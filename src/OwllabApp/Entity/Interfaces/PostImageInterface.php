<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/12/19
 * Time: 2:08 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface PostImageInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface PostImageInterface extends ImageInterface
{
    /**
     * @return PostInterface|null
     */
    public function getPost(): ? PostInterface;

    /**
     * @param PostInterface|null $post
     *
     * @return PostImageInterface
     */
    public function setPost(? PostInterface $post): PostImageInterface;
}