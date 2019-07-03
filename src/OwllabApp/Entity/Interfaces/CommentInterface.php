<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 10:20 PM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface CommentInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface CommentInterface extends
    EntityInterface,
    ContentInterface,
    AuthoredInterface,
    PublishDateInterface
{
    /**
     * @return PostInterface|null
     */
    public function getPost(): ? PostInterface;

    /**
     * @param PostInterface|null $post
     *
     * @return CommentInterface
     */
    public function setPost(? PostInterface $post): CommentInterface;
}