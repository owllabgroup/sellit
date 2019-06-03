<?php
/**
 * Created by PhpStorm.
 * User: farshad
 * Date: 5/31/19
 * Time: 10:46 AM
 */

namespace OwllabApp\Serializer;

use ApiPlatform\Core\Serializer\SerializerContextBuilderInterface;
use OwllabApp\Serializer\Interfaces\UserContextBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class UserContextBuilder
 * @package App\Serializer
 */
class UserContextBuilder implements UserContextBuilderInterface
{
    /**
     * @var SerializerContextBuilderInterface
     */
    private $decorated;

    /**
     * @var AuthorizationCheckerInterface
     */
    private $authorizationChecker;

    public function __construct(
        SerializerContextBuilderInterface $decorated,
        AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->decorated = $decorated;
        $this->authorizationChecker = $authorizationChecker;
    }

    /**
     * @return SerializerContextBuilderInterface
     */
    public function getDecorated(): SerializerContextBuilderInterface
    {
        return $this->decorated;
    }

    /**
     * @return AuthorizationCheckerInterface
     */
    public function getAuthorizationChecker(): AuthorizationCheckerInterface
    {
        return $this->authorizationChecker;
    }

    /**
     * @param Request $request
     * @param bool $normalization
     * @param array|null $extractedAttributes
     *
     * @return array
     */
    public function createFromRequest(
        Request $request,
        bool $normalization,
        array $extractedAttributes = null): array
    {
        $context = $this->getDecorated()->createFromRequest(
            $request, $normalization, $extractedAttributes
        );
        $resourceClass = $context['resource_class'] ?? null;
        if (User::class === $resourceClass
            && isset($context["groups"])
            && $normalization === true
            && $this->getAuthorizationChecker()->isGranted(User::ROLE_ADMIN)) {

            $context["groups"][] = 'get-admin';
        }

        return $context;
    }
}