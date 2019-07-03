<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:41 PM
 */

namespace OwllabApp\Entity\Traits;

use OwllabApp\Entity\Interfaces\PublishDateInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Trait PublishedTrait
 * @package OwllabApp\Entity\Traits
 */
trait PublishedTrait
{
    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     * @Groups({"get-comment-with-author", "get-post-with-author"})
     */
    protected $published;

    /**
     * @return \DateTimeInterface|null
     */
    public function getPublished(): ? \DateTimeInterface
    {
        return $this->published;
    }

    /**
     * @param \DateTimeInterface|null $published
     *
     * @return PublishDateInterface
     */
    public function setPublished(? \DateTimeInterface $published): PublishDateInterface
    {
        $this->published = $published;

        return $this;
    }
}