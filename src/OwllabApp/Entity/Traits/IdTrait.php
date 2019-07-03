<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:25 PM
 */

namespace OwllabApp\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Trait IdTrait
 * @package OwllabApp\Entity\Traits
 */
trait IdTrait
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"get", "get-post-with-author", "get-comment-with-author"})
     */
    protected $id;

    /**
     * @return int|null
     */
    public function getId(): ? int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function hasId(): bool
    {
        return !is_null($this->getId());
    }
}