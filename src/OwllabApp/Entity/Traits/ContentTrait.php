<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 10:23 PM
 */

namespace OwllabApp\Entity\Traits;

use OwllabApp\Entity\Interfaces\ContentInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait ContentTrait
 * @package OwllabApp\Entity\Traits
 */
trait ContentTrait
{
    /**
     * @var string
     *
     * @Assert\Length(
     *      min = OwllabApp\Entity\Interfaces\ConstantInterface::DESCRIPTION_LENGTH_MIN,
     *      max = OwllabApp\Entity\Interfaces\ConstantInterface::DESCRIPTION_LENGTH_MAX,
     * )
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"get-comment-with-author"})
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(min=5, max=3000)
     */
    protected $content;

    /**
     * @return string|null
     */
    public function getContent(): ? string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     *
     * @return ContentInterface
     */
    public function setContent(? string $content): ContentInterface
    {
        $this->content = $content;

        return $this;
    }
}