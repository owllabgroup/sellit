<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 11:57 PM
 */

namespace OwllabApp\Entity;

use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\ImageInterface;
use OwllabApp\Entity\Traits\UrlTrait;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class Image
 * @package OwllabApp\Entity
 * @ORM\MappedSuperclass()
 */
abstract class Image extends Entity implements ImageInterface
{
    use UrlTrait;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="images", fileNameProperty="url")
     * @Assert\NotNull(groups={"post"})
     */
    protected $file;

    /**
     * @return File|null
     */
    public function getFile(): ? File
    {
        return $this->file;
    }

    /**
     * @param File|null $file
     *
     * @return ImageInterface
     */
    public function setFile(? File $file): ImageInterface
    {
        $this->file = $file;

        return $this;
    }

    public function getUrl(): ?string
    {
        if (!empty($this->url)) {

            return 'images/' . $this->url;
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function __toString()
    {
        return $this->getId() . ':' . $this->getUrl();
    }
}