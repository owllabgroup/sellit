<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 10:17 PM
 */

namespace OwllabApp\Entity\Interfaces;

use Doctrine\Common\Collections\Collection;

/**
 * Interface PostInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface PostInterface extends EntityInterface,
    TitleInterface,
    DescriptionInterface,
    PublishDateInterface,
    AuthoredInterface,
    SlugInterface
{
    /**
     * @return null|string
     */
    public function getPrice(): ? string;

    /**
     * @param string|null $price
     *
     * @return PostInterface
     */
    public function setPrice(? string $price): PostInterface;

    /**
     * @return CategoryInterface|null
     */
    public function getCategory(): ? CategoryInterface;

    /**
     * @param CategoryInterface|null $category
     *
     * @return PostInterface
     */
    public function setCategory(? CategoryInterface $category): PostInterface;

    /**
     * @return Collection
     */
    public function getComments(): Collection;

    /**
     * @return int
     */
    public function getCommentCount(): int;

    /**
     * @param CommentInterface $comment
     *
     * @return postInterface
     */
    public function addComment(CommentInterface $comment): PostInterface;

    /**
     * @param CommentInterface $comment
     *
     * @return PostInterface
     */
    public function removeComment(CommentInterface $comment): PostInterface;

    /**
     * @return Collection
     */
    public function getImages(): Collection;

    /**
     * @param PostImageInterface $image
     *
     * @return self
     */
    public function addImage(PostImageInterface $image): self;

    /**
     * @param PostImageInterface $image
     *
     * @return self
     */
    public function removeImage(PostImageInterface $image): self;

    /**
     * @return Collection
     */
    public function getTags(): Collection;

    /**
     * @param TagInterface $tag
     *
     * @return self
     */
    public function addTag(TagInterface $tag): self;

    /**
     * @param TagInterface $tag
     *
     * @return self
     */
    public function removeTag(TagInterface $tag): self;
}