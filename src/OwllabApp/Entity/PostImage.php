<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/12/19
 * Time: 2:11 PM
 */

namespace OwllabApp\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\PostImageInterface;
use OwllabApp\Entity\Interfaces\PostInterface;
use OwllabApp\Controller\UploadImageAction;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class PostImage
 * @ApiResource(
 *     attributes={
 *          "order"={"id": "ASC"},
 *     },
 *     collectionOperations={
 *          "get",
 *          "post"={
 *              "method"="POST",
 *              "path"="/images/post_images",
 *              "controller"=UploadImageAction::class,
 *              "defaults"={"_api_receive"=false},
 *          }
 *     },
 *     itemOperations={
 *          "get",
 *          "delete"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY')"
 *          }
 *     }
 * )
 * @ORM\Entity(repositoryClass="OwllabApp\Repository\PostImageRepository")
 * @ORM\Table(name="`post_image`")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable()
 */
class PostImage extends Image implements PostImageInterface
{
    /**
     * @var PostInterface
     *
     * @ORM\ManyToOne(targetEntity="OwllabApp\Entity\Post", inversedBy="images")
     */
    protected $post;

    /**
     * @return PostInterface|null
     */
    public function getPost(): ? PostInterface
    {
        return $this->post;
    }

    /**
     * @param PostInterface|null $post
     *
     * @return PostImageInterface
     */
    public function setPost(? PostInterface $post): PostImageInterface
    {
        $this->post = $post;

        return $this;
    }
}