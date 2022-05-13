<?php

namespace App\EventSubscriber;

use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityDeletedEvent;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{

    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;

    public function __construct(ParameterBagInterface   $parameterBag){
        $this->parameterBag = $parameterBag;
    }

    public static function getSubscribedEvents(){
        return [
            AfterEntityDeletedEvent::class => ['deletePhysicalImage'],
        ];
    }

    public function deletePhysicalImage(AfterEntityDeletedEvent $event){
        $entity = $event->getEntityInstance();
        if (!property_exists($entity, 'image'))return;
        if (get_class($entity) === "App\Entity\Book"){
            $dirUploads = '/books';
        }
        if (get_class($entity) === "App\Entity\Speaker"){
            $dirUploads = '/speakers';
        }
        $imgpath = $this->parameterBag->get('kernel.project_dir').'/public/uploads/images'.$dirUploads.'/'.
        $entity->getImage();
        if(file_exists($imgpath)) unlink($imgpath);

    }
}