<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/9/19
 * Time: 1:19 AM
 */

namespace OwllabApp\Controller;

use ApiPlatform\Core\Validator\Exception\ValidationException;
use ApiPlatform\Core\Validator\ValidatorInterface;
use OwllabApp\Entity\Avatar;
use OwllabApp\Entity\PostImage;
use OwllabApp\Form\AvatarType;
use Doctrine\ORM\EntityManagerInterface;
use OwllabApp\Controller\Interfaces\UploadImageActionInterface;
use OwllabApp\Form\PostImageType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class UploadImageAction
 * @package OwllabApp\Controller
 */
class UploadImageAction extends Controller implements UploadImageActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var EntityManagerInterface
     */
    private $entityManger;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    public function __construct(
        FormFactoryInterface $formFactory,
        EntityManagerInterface $entityManager,
        ValidatorInterface $validator
    )
    {
        $this->entityManger = $entityManager;
        $this->formFactory = $formFactory;
        $this->validator = $validator;
    }

    /**
     * @return FormFactoryInterface
     */
    public function getFormFactory(): FormFactoryInterface
    {
        return $this->formFactory;
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEntityManger(): EntityManagerInterface
    {
        return $this->entityManger;
    }

    /**
     * @return ValidatorInterface
     */
    public function getValidator(): ValidatorInterface
    {
        return $this->validator;
    }

    /**
     * @param Request $request
     * @return Avatar|Response
     */
    public function __invoke(Request $request)
    {
        $uploadedFile = $request->files->get('file');
        $isAvatarRoute = preg_match("/avatars/i", $request->get('_route'));
        $image = $isAvatarRoute ? new Avatar() : new PostImage();
        if (!$uploadedFile) {
            throw new ValidationException(
                $this->getValidator()->validate($image)
            );
        }
        $image->setFile($uploadedFile);
        $this->getEntityManger()->persist($image);
        $this->getEntityManger()->flush();
        $image->setFile(null);
        return $image;
    }
}