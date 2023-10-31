<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

class UserCommand extends Command
{

    protected ?string $defaultTable = 'Users';
    
    protected function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser->addArgument('email', [
            'help' => __('What is your email'),
        ]);
            $parser->addArgument('name', [
            'help' => __('What is your name'),
            ]);
            $parser->addArgument('last_name', [
            'help' => __('What is your last name'),
        ]);
        return $parser;
    }

    public function execute(Arguments $args, ConsoleIo $io): int
    {

        $user = $this->fetchTable()->newEmptyEntity();
        $user->password = $io->ask('New password');
        $email = $args->getArgument('email');
        $user->email = $email;
        $user->name = $args->getArgument('name');
        $user->last_name =  $args->getArgument('last_name');
        $user->enabled = true;
        $user->role = "admin";

        $this->fetchTable()->save($user);


        $io->out("User {$email} created.");

        return static::CODE_SUCCESS;
    }
}

?>