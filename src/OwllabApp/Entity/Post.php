<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 10:17 PM
 */

namespace OwllabApp\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter as Filter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\AuthoredInterface;
use OwllabApp\Entity\Interfaces\CategoryInterface;
use OwllabApp\Entity\Interfaces\CommentInterface;
use OwllabApp\Entity\Interfaces\PostImageInterface;
use OwllabApp\Entity\Interfaces\PostInterface;
use OwllabApp\Entity\Interfaces\TagInterface;
use OwllabApp\Entity\Interfaces\UserInterface;
use OwllabApp\Entity\Traits\DescriptionTrait;
use OwllabApp\Entity\Traits\PublishedTrait;
use OwllabApp\Entity\Traits\SlugTrait;
use OwllabApp\Entity\Traits\TitleTrait;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Post
 * @package OwllabApp\Entity
 * @ApiFilter(
 *     Filter\SearchFilter::class,
 *     properties={
 *          "id": "exact",
 *          "title": "partial",
 *          "description": "partial",
 *          "author": "exact",
 *          "author.name": "patrial",
 *          "category": "exact",
 *          "category.id": "exact"
 *     }
 * )
 * @ApiFilter(
 *     Filter\DateFilter::class,
 *     properties={
 *          "published"
 *     }
 * )
 * @ApiFilter(
 *     Filter\RangeFilter::class,
 *     properties={
 *          "id"
 *     }
 * )
 * @ApiFilter(
 *     Filter\OrderFilter::class,
 *     properties={
 *          "id",
 *          "published",
 *          "title",
 *     },
 *     arguments={"orderParameterName"="order"}
 * )
 * @ApiFilter(
 *     PropertyFilter::class,
 *     arguments={
 *          "parameterName": "properties",
 *          "overrideDefaultProperties": false,
 *          "whitelist": {"id", "author", "slug", "title", "content"},
 *     },
 * )
 * @ApiResource(
 *     attributes={
 *          "order"={"published": "DESC"},
 *          "maximum_items_per_page"=12,
 *          "items_per_page"=12,
 *     },
 *     itemOperations={
 *          "get"={
 *             "normalization_context"={
 *                 "groups"={"get-post-with-author"}
 *             }
 *          },
 *          "put"={
 *              "access_control"="is_granted('ROLE_EDITOR') or (is_granted('ROLE_USER') and object.getAuthor() == user)"
 *          }
 *      },
 *     collectionOperations={
 *          "get"={
 *             "normalization_context"={
 *                 "groups"={"get-post-with-author"}
 *             }
 *          },
 *          "post"={
 *              "access_control"="is_granted('ROLE_USER')"
 *          }
 *      },
 *     denormalizationContext={
 *          "group"={"post"}
 *     }
 * )
 * @ORM\Entity(repositoryClass="OwllabApp\Repository\PostRepository")
 * @ORM\Table(name="`post`")
 * @ORM\HasLifecycleCallbacks()
 */
class Post extends Entity implements PostInterface
{
    use TitleTrait,
        SlugTrait,
        DescriptionTrait,
        PublishedTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Regex(
     *     pattern="/\d+/"
     * )
     * @Groups({"post", "get-post-with-author"})
     */
    protected $price;

    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="OwllabApp\Entity\User", inversedBy="posts")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"get-post-with-author"})
     */
    protected $author;

    /**
     * @var CategoryInterface
     *
     * @ORM\ManyToOne(targetEntity="OwllabApp\Entity\Category", inversedBy="posts")
     * @Groups({"get-post-with-author"})
     */
    protected $category;

    /**
     * @var Collection
     *
     * @ApiSubresource()
     * @ORM\OneToMany(targetEntity="OwllabApp\Entity\Comment", mappedBy="post")
     * @Groups({"get-post-with-author"})
     */
    protected $comments;

    /**
     * @var Collection
     *
     * @ORM\JoinTable()
     * @ApiSubresource()
     * @ORM\OneToMany(targetEntity="OwllabApp\Entity\PostImage", mappedBy="post")
     * @Groups({"post", "get-post-with-author"})
     */
    protected $images;

    /**
     * @var Collection
     *
     * @ORM\JoinTable()
     * @ApiSubresource()
     * @ORM\ManyToMany(targetEntity="OwllabApp\Entity\Tag")
     * @Groups({"post", "get-post-with-author"})
     */
    protected $tags;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    /**
     * @return null|string
     */
    public function getPrice(): ? string
    {
        return $this->price;
    }

    /**
     * @param string|null $price
     *
     * @return PostInterface
     */
    public function setPrice(? string $price): PostInterface
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return CategoryInterface|null
     */
    public function getCategory(): ? CategoryInterface
    {
        return $this->category;
    }

    /**
     * @param CategoryInterface|null $category
     *
     * @return PostInterface
     */
    public function setCategory(? CategoryInterface $category): PostInterface
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    /**
     * @return int
     */
    public function getCommentCount(): int
    {
        return $this->getComments()->count();
    }

    /**
     * @param CommentInterface $comment
     *
     * @return postInterface
     */
    public function addComment(CommentInterface $comment): PostInterface
    {
        if (!$this->getComments()->contains($comment)) {

            $this->getComments()->add($comment);
        }
        return $this;

    }

    /**
     * @param CommentInterface $comment
     *
     * @return PostInterface
     */
    public function removeComment(CommentInterface $comment): PostInterface
    {
        if ($this->getComments()->contains($comment)) {

            $this->getComments()->add($comment);
        }
        return $this;

    }

    /**
     * @return Collection
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    /**
     * @param PostImageInterface $image
     *
     * @return PostInterface
     */
    public function addImage(PostImageInterface $image): PostInterface
    {
        if (!$this->getImages()->contains($image)) {

            $image->setPost($this);
            $this->getImages()->add($image);
        }
        return $this;

    }

    /**
     * @param PostImageInterface $image
     *
     * @return postInterface
     */
    public function removeImage(PostImageInterface $image): PostInterface
    {
        if ($this->getImages()->contains($image)) {

            $this->getImages()->add($image);
        }
        return $this;

    }

    /**
     * @return Collection
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * @param TagInterface $tag
     *
     * @return postInterface
     */
    public function addTag(TagInterface $tag): PostInterface
    {
        if (!$this->getTags()->contains($tag)) {

            $tag->setUsageCount($tag->getUsageCount() + 1);
            $this->getTags()->add($tag);
        }
        return $this;

    }

    /**
     * @param TagInterface $tag
     *
     * @return postInterface
     */
    public function removeTag(TagInterface $tag): PostInterface
    {
        if ($this->getTags()->contains($tag)) {

            $this->getTags()->add($tag);
        }
        return $this;

    }

    /**
     * @return UserInterface|null
     */
    public function getAuthor(): ? UserInterface
    {
        return $this->author;
    }

    /**
     * @param UserInterface $author
     *
     * @return AuthoredInterface
     */
    public function setAuthor(UserInterface $author): AuthoredInterface
    {
        $this->author = $author;

        return $this;
    }
}