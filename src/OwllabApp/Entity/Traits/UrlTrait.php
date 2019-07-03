<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 11:58 PM
 */

namespace OwllabApp\Entity\Traits;

use OwllabApp\Entity\Interfaces\UrlInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Trait UrlTrait
 * @package OwllabApp\Entity\Traits
 */
trait UrlTrait
{
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Groups({"get", "get-comment-with-author", "get-post-with-author"})
     */
    protected $url;

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     *
     * @return UrlInterface
     */
    public function setUrl(? string $url): UrlInterface
    {
        $this->url = strtolower(rtrim (strtolower ($url), '/'));

        return $this;
    }
}