<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 6/3/19
 * Time: 9:20 PM
 */

namespace OwllabApp\Entity;

use Doctrine\ORM\Mapping as ORM;
use OwllabApp\Entity\Interfaces\EntityInterface;
use OwllabApp\Entity\Traits\IdTrait;

/**
 * Class Entity
 * @package OwllabApp\Entity
 * @ORM\MappedSuperclass()
 */
class Entity implements EntityInterface
{
    use IdTrait;
}