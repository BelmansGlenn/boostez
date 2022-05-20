<?php

namespace App\Factory;

use App\Entity\Speaker;
use App\Repository\SpeakerRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Speaker>
 *
 * @method static Speaker|Proxy createOne(array $attributes = [])
 * @method static Speaker[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Speaker|Proxy find(object|array|mixed $criteria)
 * @method static Speaker|Proxy findOrCreate(array $attributes)
 * @method static Speaker|Proxy first(string $sortedField = 'id')
 * @method static Speaker|Proxy last(string $sortedField = 'id')
 * @method static Speaker|Proxy random(array $attributes = [])
 * @method static Speaker|Proxy randomOrCreate(array $attributes = [])
 * @method static Speaker[]|Proxy[] all()
 * @method static Speaker[]|Proxy[] findBy(array $attributes)
 * @method static Speaker[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Speaker[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static SpeakerRepository|RepositoryProxy repository()
 * @method Speaker|Proxy create(array|callable $attributes = [])
 */
final class SpeakerFactory extends ModelFactory
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
            'lastname' => self::faker()->lastName(),
            'image' => 'person-icon-default-profile-picture.png',
            'DescriptionFR' => self::faker()->text(),
            'DescriptionNL' => self::faker()->text(),
            'DescriptionEN' => self::faker()->text(),
            'language' => ['FR','NL'],
            'inOrder' => self::faker()->randomElement([1,2,3,4,5,6]),
            'isVisible' => 'true',
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Speaker $speaker): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Speaker::class;
    }
}
