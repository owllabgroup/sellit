<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 10:18 PM
 */

namespace OwllabApp\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\AuthoredInterface;
use OwllabApp\Entity\Interfaces\CommentInterface;
use OwllabApp\Entity\Interfaces\PostInterface;
use OwllabApp\Entity\Interfaces\UserInterface;
use OwllabApp\Entity\Traits\ContentTrait;
use OwllabApp\Entity\Traits\PublishedTrait;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Comment
 * @package OwllabApp\Entity
 * @ApiResource(
 *     attributes={
 *          "order"={"published": "DESC"},
 *           "pagination_enabled"=true,
 *           "pagination_client_enabled"=true,
 *           "pagination_client_items_per_page"=true,
 *     },
 *     itemOperations={
 *          "get"={},
 *          "put"={
 *              "access_control"="is_granted('ROLE_ADMIN') or (is_granted('ROLE_USER') and object.getAuthor() == user)"
 *          }
 *      },
 *     collectionOperations={
 *          "get",
 *          "post"={
 *              "access_control"="is_granted('ROLE_USER')",
 *              "normalization_context"={
 *                 "groups"={"get-comment-with-author"}
 *             }
 *          },
 *      },
 *     subresourceOperations={
 *          "get"={
 *             "normalization_context"={
 *                 "groups"={"get-comment-with-author"}
 *             }
 *          }
 *     },
 *     normalizationContext={
 *         "groups"={"get-comment-with-author"}
 *     },
 *     denormalizationContext={
 *          "group"={"post"}
 *     }
 * )
 * @ORM\Entity(repositoryClass="OwllabApp\Repository\CommentRepository")
 * @ORM\Table(name="`comment`")
 * @ORM\HasLifecycleCallbacks()
 */
class Comment extends Entity implements CommentInterface
{
    use ContentTrait,
        PublishedTrait;

    /**
     * @var PostInterface
     *
     * @ORM\ManyToOne(targetEntity="OwllabApp\Entity\Post", inversedBy="comments")
     */
    protected $post;

    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="OwllabApp\Entity\User", inversedBy="comments")
     * @Groups({"get-comment-with-author"})
     */
    protected $author;

    /**
     * @return PostInterface|null
     */
    public function getPost(): ? PostInterface
    {
        return $this->post;
    }

    /**
     * @param PostInterface|null $post
     *
     * @return CommentInterface
     */
    public function setPost(? PostInterface $post): CommentInterface
    {
        $this->post = $post;

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