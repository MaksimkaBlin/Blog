<?php

namespace App\DataFixtures;

use App\Entity\Article;

use App\Entity\Comment;
use App\Entity\Tag;
use App\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixture extends BaseFixture implements DependentFixtureInterface
{


    private static $articleImages = [
        'asteroid.jpeg',
        'mercury.jpeg',
        'lightspeed.png',
    ];



    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Article::class, 10, function (Article $article, $count) use ($manager){

            $article->setTitle($this->faker->title);


            if ($this->faker->boolean(70)) {
                $article->setPublishedAt($this->faker->dateTimeBetween('-100 days', '-1 days' ));
            }

            $article->setAuthor($this->getRandomReference(User::class))
                ->setHeartCount($this->faker->numberBetween(5, 100))
                ->setImageFilename($this->faker->randomElement(self::$articleImages));

            $tags =$this->getRandomReferences(Tag::class, $this->faker->numberBetween(0, 5));
            foreach ($tags as $tag){
                $article->addTag($tag);

            }
        });
        $manager->flush();
    }
    public function getDependencies()
    {
     return [
         TagFixture::class,
         UserFixture::class,
     ];
    }
}
