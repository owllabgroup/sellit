<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/9/19
 * Time: 6:39 PM
 */

namespace OwllabApp\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\SlugInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait SlugTrait
 * @package OwllabApp\Entity\Traits
 */
trait SlugTrait
{
    /**
     * @var string
     *
     * @ORM\Column(
     *     type = "string",
     * )
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = OwllabApp\Entity\Interfaces\ConstantInterface::SLUG_LENGTH_MIN,
     *      max = OwllabApp\Entity\Interfaces\ConstantInterface::SLUG_LENGTH_MAX
     * )
     * @Groups({"post", "get-post-with-author"})
     */
    protected $slug;

    /**
     * @return string|null
     */
    public function getSlug(): ? string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     *
     * @return SlugInterface
     */
    public function setSlug(? string $slug): SlugInterface
    {
        $this->slug = $slug;

        return $this;
    }
}