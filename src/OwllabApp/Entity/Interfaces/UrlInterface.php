<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/4/19
 * Time: 12:22 AM
 */

namespace OwllabApp\Entity\Interfaces;

/**
 * Interface UrlInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface UrlInterface
{
    /**
     * @return string|null
     */
    public function getUrl(): ?string;

    /**
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(? string $url): self;
}