<?php
/**
 * This file is part of cardioclinic
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshadi
 * Date: 2018/04/01
 */

namespace OwllabApp\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\TitleInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait TitleTrait
 * @package OwllabApp\Entity\Traits
 */
trait TitleTrait
{
    /**
     * @var string
     *
     * @ORM\Column(
     *     type = "string",
     * )
     *
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = OwllabApp\Entity\Interfaces\ConstantInterface::TITLE_LENGTH_MIN,
     *      max = OwllabApp\Entity\Interfaces\ConstantInterface::TITLE_LENGTH_MAX
     * )
     * @Groups({"get", "post", "get-post-with-author"})
     */
    protected $title;

    /**
     * @return string|null
     */
    public function getTitle(): ? string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return TitleInterface
     */
    public function setTitle(? string $title): TitleInterface
    {
        $this->title = $title;

        return $this;
    }
}