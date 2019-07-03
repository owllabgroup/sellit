<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 11:51 PM
 */

namespace OwllabApp\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\CategoryInterface;
use OwllabApp\Entity\Interfaces\PostInterface;
use OwllabApp\Entity\Traits\TitleTrait;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Category
 * @package OwllabApp\Entity
 * @ORM\Entity(repositoryClass="OwllabApp\Repository\CategoryRepository")
 * @ORM\Table(name="`category`")
 * @ORM\HasLifecycleCallbacks()
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     collectionOperations={
 *          "get"
 *     }
 * )
 */
class Category extends Entity implements CategoryInterface
{
    use TitleTrait;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="OwllabApp\Entity\Post", mappedBy="category")
     * @Groups({"post"})
     */
    protected $posts;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    /**
     * @param PostInterface $post
     *
     * @return categoryInterface
     */
    public function addPost(PostInterface $post): CategoryInterface
    {
        if (!$this->getPosts()->contains($post)) {

            $this->getPosts()->add($post);
            $post->setCategory($this);
        }
        return $this;

    }

    /**
     * @param PostInterface $post
     *
     * @return CategoryInterface
     */
    public function removePost(PostInterface $post): CategoryInterface
    {
        if ($this->getPosts()->contains($post)) {

            $this->getPosts()->add($post);
            $post->setCategory(null);
        }
        return $this;

    }
}