<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 11:53 PM
 */

namespace OwllabApp\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\TagInterface;
use OwllabApp\Entity\Traits\TitleTrait;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Tag
 * @package OwllabApp\Entity
 * @ORM\Entity(repositoryClass="OwllabApp\Repository\TagRepository")
 * @ORM\Table(name="`tag`")
 * @ORM\HasLifecycleCallbacks()
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     itemOperations={
 *          "get",
 *          "post"={
 *              "access_control"="is_granted('ROLE_USER')"
 *          }
 *      },
 *     collectionOperations={
 *          "get",
 *          "post"={
 *              "access_control"="is_granted('ROLE_USER')"
 *          }
 *      },
 *     normalizationContext={
 *         "groups"={"get", "post"}
 *     },
 * )
 */
class Tag extends Entity implements TagInterface
{
    use TitleTrait;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"get"})
     */
    protected $usageCount;

    /**
     * Tag constructor.
     */
    public function __construct()
    {
        $this->usageCount = 0;
    }

    /**
     * @return int|null
     */
    public function getUsageCount(): ? int
    {
        return $this->usageCount;
    }

    /**
     * @param int|null $usageCount
     *
     * @return TagInterface
     */
    public function setUsageCount(? int $usageCount): TagInterface
    {
        $this->usageCount = $usageCount;

        return $this;
    }
}