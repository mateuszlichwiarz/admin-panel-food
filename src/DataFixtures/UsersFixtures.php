<?php

    namespace App\DataFixtures;
    
    use App\Entity\Users;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\Persistence\ObjectManager;
    use Doctrine\ORM\EntityManager;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

    /**
     * Class UsersFixtures
     * @package App\DataFixtures
     */
    class UsersFixtures extends Fixture
    {
        /**
         * @var UserPasswordEncoderInterface
         */
        private $encoder;

        /**
         * @var EntityManager
         */
        private $entityManager;

        /**
         * UserFixtures constructor
         * @param UserPasswordEncoderInterface $encoder Password encoder instance
         */
        public function __construct(UserPasswordEncoderInterface $encoder, EntityManagerInterface $entityManager) {
            $this->encoder = $encoder;
            $this->entityManager = $entityManager;
        }

        /**
         * @param ObjectManager $manager Object manager instance
         * 
         * @return void
         */
        public function load(ObjectManager $manager) : void {
            $user = new Users('Admin');
            $password = $this->encoder->encodePassword($user, 'secret');
            $user->setPassword($password)->setEmail('user@email.com');

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }
    }