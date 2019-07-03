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
use OwllabApp\Entity\Interfaces\AvatarInterface;
use OwllabApp\Entity\Interfaces\UserInterface;
use OwllabApp\Controller\UploadImageAction;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class Avatar
 * @package OwllabApp\Entity
 * @ApiResource(
 *     attributes={
 *          "order"={"id": "ASC"},
 *     },
 *     collectionOperations={
 *          "get",
 *          "delete"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_ANONYMOUSLY')",
 *          },
 *     },
 *     itemOperations={
 *          "get",
 *          "delete"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_ANONYMOUSLY')",
 *          },
 *          "post"={
 *             "method"="POST",
 *             "path"="/images/avatar",
 *             "controller"=UploadImageAction::class,
 *             "validation_groups"={"registration"},
 *             "defaults"={"_api_receive"=false},
 *             "swagger_context"={
 *                 "consumes"={
 *                     "multipart/form-data",
 *                 },
 *                 "parameters"={
 *                     {
 *                         "in"="formData",
 *                         "name"="file",
 *                         "type"="file",
 *                         "description"="The file to upload",
 *                     },
 *                 },
 *             },
 *          },
 *     }
 * )
 * @ORM\Entity(repositoryClass="OwllabApp\Repository\AvatarRepository")
 * @ORM\Table(name="`avatar`")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable()
 */
class Avatar extends Image implements AvatarInterface
{
    /**
     * @var UserInterface
     *
     * @ORM\OneToOne(targetEntity="OwllabApp\Entity\User", inversedBy="avatar")
     */
    protected $user;

    /**
     * @return UserInterface|null
     */
    public function getUser(): ?UserInterface
    {
        return $this->user;
    }

    /**
     * @param UserInterface|null $user
     *
     * @return AvatarInterface
     */
    public function setUser(? UserInterface $user): AvatarInterface
    {
        $this->user = $user;

        return $this;
    }
}