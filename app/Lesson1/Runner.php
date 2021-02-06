<?php

declare(strict_types=1);

namespace App\Lesson1;

use App\Lesson1\NamedArguments;
use App\Lesson1\ConstructorPropPromotion;
use App\Lesson1\ConstructorNoPromotionPhp7;
use App\Lesson1\ConstructorPropPromotionMix;

class Runner
{
    public static function run()
    {
        // Named arguments
        $object = self::createObject();

        // pomijamy domyślny argument
        $object->foo(title: 'Title', options: ['value1']);
        $object->foo(options: [], title: 'MyTitle', description: 'Mój opis');
    }

    public static function run2()
    {
        // Constructor property promotion

        //$noPromotion = new ConstructorNoPromotionPhp7('foo', 22, new stdClass());
        //print_r($noPromotion);

        $promotion = new ConstructorPropPromotion('foo', 22, self::createObject());
        print_r($promotion);

        $promotionMix = new ConstructorPropPromotionMix('foo', 100, 33);
        print_r($promotionMix);
    }

    public static function run3()
    {
        // Trailing commas
    }

    /**
     * @return NamedArguments
     */
    public static function createObject(): NamedArguments
    {
        return new NamedArguments(
            count: 21,
            page: 2
        );
    }
}