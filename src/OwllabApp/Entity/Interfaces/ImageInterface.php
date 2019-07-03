<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 11:57 PM
 */

namespace OwllabApp\Entity\Interfaces;

use Symfony\Component\HttpFoundation\File\File;

/**
 * Interface ImageInterface
 * @package OwllabApp\Entity\Interfaces
 */
interface ImageInterface extends EntityInterface, UrlInterface
{
    /**
     * @return File|null
     */
    public function getFile(): ? File;

    /**
     * @param File|null $file
     *
     * @return ImageInterface
     */
    public function setFile(? File $file): ImageInterface;
}