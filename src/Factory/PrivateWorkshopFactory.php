<?php

namespace App\Factory;

use App\Entity\PrivateWorkshop;
use App\Repository\PrivateWorkshopRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<PrivateWorkshop>
 *
 * @method static PrivateWorkshop|Proxy createOne(array $attributes = [])
 * @method static PrivateWorkshop[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static PrivateWorkshop|Proxy find(object|array|mixed $criteria)
 * @method static PrivateWorkshop|Proxy findOrCreate(array $attributes)
 * @method static PrivateWorkshop|Proxy first(string $sortedField = 'id')
 * @method static PrivateWorkshop|Proxy last(string $sortedField = 'id')
 * @method static PrivateWorkshop|Proxy random(array $attributes = [])
 * @method static PrivateWorkshop|Proxy randomOrCreate(array $attributes = [])
 * @method static PrivateWorkshop[]|Proxy[] all()
 * @method static PrivateWorkshop[]|Proxy[] findBy(array $attributes)
 * @method static PrivateWorkshop[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static PrivateWorkshop[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PrivateWorkshopRepository|RepositoryProxy repository()
 * @method PrivateWorkshop|Proxy create(array|callable $attributes = [])
 */
final class PrivateWorkshopFactory extends ModelFactory
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
            'point' => [' La différence entre fatigue, burn-out et dépression','Qui est à risque de faire un burn-out ?',
                'Y’a-t’il plus de burn-out qu’avant ?', 'Quels sont les 4 changements majeurs qui expliquent ces burn-out ?',
                'Comment reconnaitre les 3 signes annonciateurs du burn-out ?', 'Comment faire marche arrière quand on commence à s’épuiser ?',
                'La théorie des 50 petites cuillères pour nous aider à gérer notre énergie de manière durable'
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
            // ->afterInstantiate(function(PrivateWorkshop $privateWorkshop): void {})
        ;
    }

    protected static function getClass(): string
    {
        return PrivateWorkshop::class;
    }
}
