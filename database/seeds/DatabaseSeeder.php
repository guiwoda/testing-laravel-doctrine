<?php

use App\Model\Category;
use App\Model\Tag;
use Doctrine\ORM\EntityManager;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var EntityManager $em */
        $em = app('em');

        DB::table('categories')->truncate();

        $faker = \Faker\Factory::create();

        $pcat = null;
        $ptag = null;
        for ($i = 0; $i < 1000; $i++) {
            $category = new Category($faker->word, $faker->randomElement([null, $pcat]));
            $tag = new Tag($faker->word, $faker->randomElement([null, $ptag]));

            $pcat = $faker->randomElement([$category, $pcat, null]);
            $ptag = $faker->randomElement([$tag, $ptag, null]);

            $em->persist($category);
            $em->persist($tag);
        }

        $em->flush();
    }
}
