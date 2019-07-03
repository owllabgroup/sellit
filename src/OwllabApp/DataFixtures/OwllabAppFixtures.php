<?php

namespace OwllabApp\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use OwllabApp\Entity\Avatar;
use OwllabApp\Entity\Category;
use OwllabApp\Entity\Comment;
use OwllabApp\Entity\Post;
use OwllabApp\Entity\Tag;
use OwllabApp\Entity\User;
use OwllabApp\Security\TokenGenerator;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class OwllabAppFixtures
 * @package OwllabApp\DataFixtures
 */
class OwllabAppFixtures extends Fixture
{
    private const USERS = [
        [
            "username" => "farshad",
            "password" => "121231212",
            "roles" => [User::ROLE_SUPER_ADMIN],
            'enabled' => true,
        ],
        [
            "username" => "admin",
            "password" => "Secret123",
            "roles" => [User::ROLE_SUPER_ADMIN],
            'enabled' => true,
        ],
        [
            "username" => "john_done",
            "password" => "Secret123",
            "roles" => [User::ROLE_ADMIN],
            'enabled' => true,
        ],
        [
            "username" => "farshadi",
            "password" => "Secret123",
            "roles" => [User::ROLE_USER],
            'enabled' => true,
        ],
        [
            "username" => "vlc_ai",
            "password" => "Secret123",
            "roles" => [User::ROLE_USER],
            'enabled' => true,
        ],
        [
            "username" => "han_solo",
            "password" => "Secret123",
            "roles" => [User::ROLE_USER],
            'enabled' => false,
        ],
    ];

    /**
     * @var UserPasswordEncoderInterface
     */
    protected $passwordEncoder;

    /**
     * @var TokenGenerator
     */
    protected $tokenGenerator;

    /**
     * @var Generator
     */
    protected $faker;

    /**
     * OwllabAppFixtures constructor.
     *
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param TokenGenerator $tokenGenerator
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder, TokenGenerator $tokenGenerator)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->tokenGenerator = $tokenGenerator;
        $this->faker = Factory::create();
    }

    /**
     * @return UserPasswordEncoderInterface
     */
    public function getPasswordEncoder(): UserPasswordEncoderInterface
    {
        return $this->passwordEncoder;
    }

    /**
     * @return TokenGenerator
     */
    public function getTokenGenerator(): TokenGenerator
    {
        return $this->tokenGenerator;
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
            $this->loadImage($manager);
            $this->loadUsers($manager);
            $this->loadCategories($manager);
            $this->loadTags($manager);
            $this->loadPosts($manager);
            $this->loadComments($manager);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function loadImage(ObjectManager $manager)
    {
        for ($i = 0; $i < 6 ; $i++) {
            $avatar = new Avatar();
            $avatar->setUrl('images.png');
            $this->addReference('avatar_' . $i, $avatar);
            $manager->persist($avatar);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    public function loadUsers(ObjectManager $manager)
    {
        foreach (self::USERS as $index => $userFixture) {
            $userName = $userFixture['username'];
            $user = new User();
            $user->setUsername($userName)
                ->setPassword($this->getPasswordEncoder()->encodePassword(
                    $user,
                    $userFixture['password']
                ))
                ->setAvatar($this->getReference('avatar_' . $index))
                ->setRoles($userFixture['roles'])
                ->setEnabled(true)
                ->setEmail($this->getFaker()->email)
                ->setLastName($this->getFaker()->lastName)
                ->setFirstName($this->getFaker()->firstName)
                ->setPhone($this->getFaker()->phoneNumber);
            $this->addReference('user_' . $userName, $user);
            $manager->persist($user);
        }

        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    public function loadCategories(ObjectManager $manager)
    {
        for ($i = 0; $i <= 10; $i++) {
            $category = new Category();
            $category->setTitle($this->getFaker()->company);
            $this->addReference("category_$i", $category);
            $manager->persist($category);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    public function loadPosts(ObjectManager $manager)
    {
        for ($i = 0; $i <= 1000; $i++) {

            $post = new Post();
            $post->setTitle($this->getFaker()->realText(30))
                ->setPublished($this->getFaker()->dateTimeThisYear)
                ->setDescription($this->getFaker()->realText(200))
                ->setAuthor($this->getRandomUserReference($post))
                ->setSlug($this->getFaker()->slug)
                ->setPrice($this->getFaker()->numberBetween(100, 10000));
            for ($j = 0; $j <= rand(1, 5); $j++) {
                $randomTag = rand(0, 10);
                $post->addTag($this->getReference("tag_$randomTag"));
            }
            $randomCategory = rand(0, 10);
            $post->setCategory($this->getReference("category_$randomCategory"));
            $this->addReference("post_$i", $post);
            $manager->persist($post);
        }
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     *
     * @throws \Exception
     */
    public function loadComments(ObjectManager $manager)
    {
        for ($i = 0; $i <= 1000; $i++) {
            for ($j = 0; $j < random_int(1, 100); $j++) {
                $comment = new Comment();
                $comment->setContent($this->getFaker()->realText(200))
                    ->setPublished($this->getFaker()->dateTimeThisYear)
                    ->setAuthor($this->getRandomUserReference($comment))
                    ->setPost($this->getReference("post_$i"))
                ;
                $manager->persist($comment);
            }
        }

        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     */
    public function loadTags(ObjectManager $manager)
    {
        for ($i = 0; $i <= 10; $i++) {
            $tag = new Tag();
            $tag->setTitle($this->getFaker()->company);
            $this->addReference("tag_$i", $tag);
            $manager->persist($tag);
        }
        $manager->flush();
    }

    /**
     * @param $entity
     *
     * @return object
     */
    protected function getRandomUserReference($entity)
    {
        $randomUser = self::USERS[rand(0, 4)];
        return $this->getReference('user_' . $randomUser['username']);
    }
}
