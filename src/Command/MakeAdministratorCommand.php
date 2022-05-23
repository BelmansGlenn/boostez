<?php

namespace App\Command;

use App\Entity\Administrator;
use App\Repository\AdministratorRepository;
use App\Utils\CustomValidatorForCommand;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:make-administrator',
    description: 'Create an administrator',
)]
class MakeAdministratorCommand extends Command
{
    private CustomValidatorForCommand $validator;
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;
    private AdministratorRepository $administratorRepository;
    private SymfonyStyle $io;

    /**
     * @param CustomValidatorForCommand $validator
     * @param EntityManagerInterface $entityManager
     * @param UserPasswordHasherInterface $passwordHasher
     * @param AdministratorRepository $administratorRepository
     */
    public function __construct(CustomValidatorForCommand $validator, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher, AdministratorRepository $administratorRepository)
    {
        parent::__construct();
        $this->validator = $validator;
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
        $this->administratorRepository = $administratorRepository;
    }


    protected function configure(): void
    {
        $this
            ->addArgument('username', InputArgument::REQUIRED, 'Administrator username')
            ->addArgument('plainPassword', InputArgument::REQUIRED, 'Administrator password')
        ;
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->io = new SymfonyStyle($input, $output);
        if (!empty($this->administratorAlreadyExist()))
        {
            throw new RuntimeException('An admninistrator already exist');
        }
    }

    /**
     * Executed after initialize() and before execute().
     * Check if some options/arguments are missing and ask the user for those values.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {

        $this->io->section('ADD AN ADMINISTRATOR');
        $this->enterUsername($input, $output);
        $this->enterPassword($input, $output);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $username = $input->getArgument('username');

        $plainPassword = $input->getArgument('plainPassword');

        $administrator = new Administrator();

        $administrator
            ->setUsername($username)
            ->setPassword($this->passwordHasher->hashPassword($administrator, $plainPassword));

        $this->entityManager->persist($administrator);
        $this->entityManager->flush();

        $this->io->success('Administrator has been created!');

        return Command::SUCCESS;
    }

    /**
     * Sets the administrator username in $input if it's valid.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    private function enterUsername(InputInterface $input, OutputInterface $output):void
    {


        $helper = $this->getHelper('question');

        $usernameQuestion = new Question('Username of the administrator:');
        $usernameQuestion->setValidator([$this->validator, 'validateUsername']);

        $username = $helper->ask($input, $output, $usernameQuestion);



        $input->setArgument('username', $username);
    }

    /**
     * Sets the administrator password in $input if it's valid.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    private function enterPassword(InputInterface $input, OutputInterface $output):void
    {
        $helper = $this->getHelper('question');

        $passwordQuestion = new Question('Clear Password of the administrator:(hash bcrypt)');

        $passwordQuestion->setValidator([$this->validator, 'validatePassword']);
        $passwordQuestion->setHidden(true)
            ->setHiddenFallback(true);

        $password = $helper->ask($input, $output, $passwordQuestion);

        $input->setArgument('plainPassword', $password);
    }

    private function administratorAlreadyExist(): array
    {
        return $this->administratorRepository->findAll();
    }
}
