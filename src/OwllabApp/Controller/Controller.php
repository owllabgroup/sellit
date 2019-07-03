<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/9/19
 * Time: 1:17 AM
 */

namespace OwllabApp\Controller;

use OwllabApp\Controller\Interfaces\ControllerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class Controller
 * @package OwllabApp\Controller
 */
abstract class Controller extends AbstractController implements ControllerInterface
{

}