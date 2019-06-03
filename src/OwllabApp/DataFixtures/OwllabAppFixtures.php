<?php

namespace OwllabApp\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

class OwllabAppFixtures extends Fixture
{
    /**
     * @var UserManagerInterface
     */
    protected $userManager;

    /**
     * @var Generator
     */
    protected $faker;

    public function __construct(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
        $this->faker = Factory::create();
    }

    /**
     * @return UserManagerInterface
     */
    public function getUserManager(): UserManagerInterface
    {
        return $this->userManager;
    }

    /**
     * @return Generator
     */
    public function getFaker(): Generator
    {
        return $this->faker;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        try {
            $this->loadUsers($manager);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param ObjectManager $manager
     */
    public function loadUsers(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $userName = $this->getFaker()->userName;
            $user = $this->getUserManager()->createUser();
            $user->setUsername($userName)
                ->setEmail($this->getFaker()->email)
                ->setPlainPassword('Secret123')
                ->setRoles(['ROLE_ADMIN'])
                ->setEnabled(true);
            $this->addReference('user_' . $userName, $user);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
