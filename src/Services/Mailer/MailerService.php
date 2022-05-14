<?php

namespace App\Services\Mailer;

use App\Entity\Contact;
use App\Exception\CustomBadRequestException;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class MailerService
{
    private MailerInterface $mailer;

    private Environment $twig;

    /**
     * @param MailerInterface $mailer
     * @param Environment $twig
     */
    public function __construct(MailerInterface $mailer, Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }


    public function send(string $to, string $subject, string $template , object $object)
    {
        try {
            $email = (new TemplatedEmail())
                ->from($object->getEmail())
                ->to(new Address($to, 'Anne Everard'))
                ->subject($subject)
                ->htmlTemplate($template)
                ->context(['mail' => $object]);

            $this->mailer->send($email);

        }catch (TransportExceptionInterface)
        {
            throw new CustomBadRequestException();
        }

    }
}