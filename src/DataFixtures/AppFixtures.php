<?php

namespace App\DataFixtures;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Category;
use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // création d'une variable param faker
        $faker = Faker\Factory::create('fr_FR');
        // tableau vide qui stock les utilisateurs
        $users = [];
        // boucle qui va itérer des utilisateur
        for ($i=0; $i <50 ; $i++) { 
            $user = new User();
            // génerer des utilisateur
            $user->setName($faker->lastName());
            $user->setFirstName($faker->firstname());
            $user->setMail($faker->email());
            $user->setPassword($faker->password());
            $user->setCreatedAt(new \DateTimeImmutable());
            //stockage dans le manager
            $manager->persist($user);
            $users[] = $user;
        }

        // tableau pour stocker les categories
        $cats = [];
        // boucle pour génerer des categories
        for ($i=0; $i <50 ; $i++) { 
            $cat = new Category();
            $cat->setTitle($faker->lastName());
            $cat->setDescription($faker->text(200));
            $cat->setCreatedAt(new \DateTimeImmutable());
            // stockage dans le manager
            $manager->persist($cat);
            $cats[]=$cat;
        }

        // tableau pour stocker articles
        $articles = [];
        $photos = ['https://www.i-cad.fr/uploads/Connaitre_chat.jpg',
        'https://ikonal.com/wp-content/uploads/2021/03/100-chats-1662085-1.jpg',
        'https://ikonal.com/wp-content/uploads/2021/03/100-chats-1662097-2.jpg',
        'https://i.pinimg.com/550x/dc/65/3d/dc653d98978cc148fcce1d62e0f6f999.jpg',
        'https://i.pinimg.com/600x315/1a/d3/65/1ad365f3fc5255743c3739e8d631fca1.jpg',
        'https://jardinage.lemonde.fr/images/dossiers/2017-07/mini/british-shorthair-1-111316-650-325.jpg'];
        // boucle pour génerer des articles
        for ($i=0; $i <200 ; $i++) { 
            $art = new Article();
            $art->setTitle($faker->lastName());
            $art->setImage($faker->randomElement($photos));
            $art->setContenu($faker->text(300));
            $art->setCreatedAt(new \DateTimeImmutable());
            $art->setWriteBy($faker->randomElement($users));
            $art->addCategory($faker->randomElement($cats));
            // stockage dans le manager
            $manager->persist($art);
            $articles[]=$art;
            
        }

        $manager->flush();
    }
}
