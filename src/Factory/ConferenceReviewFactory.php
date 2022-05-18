<?php

namespace App\Factory;

use App\Entity\ConferenceReview;
use App\Repository\ConferenceReviewRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<ConferenceReview>
 *
 * @method static ConferenceReview|Proxy createOne(array $attributes = [])
 * @method static ConferenceReview[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static ConferenceReview|Proxy find(object|array|mixed $criteria)
 * @method static ConferenceReview|Proxy findOrCreate(array $attributes)
 * @method static ConferenceReview|Proxy first(string $sortedField = 'id')
 * @method static ConferenceReview|Proxy last(string $sortedField = 'id')
 * @method static ConferenceReview|Proxy random(array $attributes = [])
 * @method static ConferenceReview|Proxy randomOrCreate(array $attributes = [])
 * @method static ConferenceReview[]|Proxy[] all()
 * @method static ConferenceReview[]|Proxy[] findBy(array $attributes)
 * @method static ConferenceReview[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static ConferenceReview[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ConferenceReviewRepository|RepositoryProxy repository()
 * @method ConferenceReview|Proxy create(array|callable $attributes = [])
 */
final class ConferenceReviewFactory extends ModelFactory
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
            'company' => self::faker()->company(),
            'review' => self::faker()->text(),
            'language' => self::faker()->randomElement(['FR','NL','EN']),
            'inOrder' => self::faker()->randomElement([1,2,3,4,5,6]),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(ConferenceReview $conferenceReview): void {})
        ;
    }

    protected static function getClass(): string
    {
        return ConferenceReview::class;
    }
}
