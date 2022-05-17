<?php

namespace App\Factory;

use App\Entity\BookReview;
use App\Repository\BookReviewRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<BookReview>
 *
 * @method static BookReview|Proxy createOne(array $attributes = [])
 * @method static BookReview[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static BookReview|Proxy find(object|array|mixed $criteria)
 * @method static BookReview|Proxy findOrCreate(array $attributes)
 * @method static BookReview|Proxy first(string $sortedField = 'id')
 * @method static BookReview|Proxy last(string $sortedField = 'id')
 * @method static BookReview|Proxy random(array $attributes = [])
 * @method static BookReview|Proxy randomOrCreate(array $attributes = [])
 * @method static BookReview[]|Proxy[] all()
 * @method static BookReview[]|Proxy[] findBy(array $attributes)
 * @method static BookReview[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static BookReview[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static BookReviewRepository|RepositoryProxy repository()
 * @method BookReview|Proxy create(array|callable $attributes = [])
 */
final class BookReviewFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'firstname' => self::faker()->firstName(),
            'lastname' => self::faker()->lastName,
            'reviewFR' => self::faker()->text(),
            'reviewNL' => self::faker()->text(),
            'reviewEN' => self::faker()->text(),
            'inOrder' => self::faker()->randomNumber(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(BookReview $bookReview): void {})
        ;
    }

    protected static function getClass(): string
    {
        return BookReview::class;
    }
}
