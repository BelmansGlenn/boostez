<?php

namespace App\Factory;

use App\Entity\BusinessConference;
use App\Repository\BusinessConferenceRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<BusinessConference>
 *
 * @method static BusinessConference|Proxy createOne(array $attributes = [])
 * @method static BusinessConference[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static BusinessConference|Proxy find(object|array|mixed $criteria)
 * @method static BusinessConference|Proxy findOrCreate(array $attributes)
 * @method static BusinessConference|Proxy first(string $sortedField = 'id')
 * @method static BusinessConference|Proxy last(string $sortedField = 'id')
 * @method static BusinessConference|Proxy random(array $attributes = [])
 * @method static BusinessConference|Proxy randomOrCreate(array $attributes = [])
 * @method static BusinessConference[]|Proxy[] all()
 * @method static BusinessConference[]|Proxy[] findBy(array $attributes)
 * @method static BusinessConference[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static BusinessConference[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static BusinessConferenceRepository|RepositoryProxy repository()
 * @method BusinessConference|Proxy create(array|callable $attributes = [])
 */
final class BusinessConferenceFactory extends ModelFactory
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
            'name' => self::faker()->name(),
            'slug' => self::faker()->slug(),
            'video' => 'https://www.youtube.com/embed/VReQNyWYKXE',
            'point' => [' La diff??rence entre fatigue, burn-out et d??pression','Qui est ?? risque de faire un burn-out ?',
                'Y???a-t???il plus de burn-out qu???avant ?', 'Quels sont les 4 changements majeurs qui expliquent ces burn-out ?',
                'Comment reconnaitre les 3 signes annonciateurs du burn-out ?', 'Comment faire marche arri??re quand on commence ?? s?????puiser ?',
                'La th??orie des 50 petites cuill??res pour nous aider ?? g??rer notre ??nergie de mani??re durable'
                ],
            'language' => self::faker()->randomElement(['FR','NL','EN']),
            'inOrder' => self::faker()->randomElement([1,2,3,4,5,6]),
            'isVisible' => 'true',
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(BusinessConference $businessConference): void {})
        ;
    }

    protected static function getClass(): string
    {
        return BusinessConference::class;
    }
}
