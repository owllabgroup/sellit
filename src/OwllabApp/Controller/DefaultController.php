<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/8/19
 * Time: 10:53 PM
 */

namespace OwllabApp\Controller;

use OwllabApp\Controller\Interfaces\DefaultControllerInterface;
use OwllabApp\Security\UserConfirmationService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package OwllabApp\Controller
 */
class DefaultController extends Controller implements DefaultControllerInterface
{
    /**
     * @return Response
     *
     * @Route("/", name="default_index")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    /**
     * @param string $token
     * @param UserConfirmationService $userConfirmationService
     *
     * @return Response
     *
     * @Route("/confirm-user/{token}", name="default_confirmation_token")
     *
     * @throws \OwllabApp\Exception\InvalidConfirmationTokenException
     */
    public function confirmUser(
        string $token,
        UserConfirmationService $userConfirmationService
    ): Response
    {
        $userConfirmationService->confirmUser($token);
        return $this->redirectToRoute('default_index');
    }
}