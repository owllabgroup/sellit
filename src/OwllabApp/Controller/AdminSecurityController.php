<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 9:35 PM
 */

namespace OwllabApp\Controller;

use OwllabApp\Controller\Interfaces\AdminSecurityControllerInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminSecurityController
 * @package OwllabApp\Controller
 */
class AdminSecurityController extends Controller implements AdminSecurityControllerInterface
{
    /**
     * @Route("/login", name="security_login")
     */
    public function login()
    {
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {

    }
}