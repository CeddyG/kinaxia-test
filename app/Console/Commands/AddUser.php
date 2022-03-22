<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Str;
use Sentinel;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:user {role?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a user with a specific role.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->argument('role')) {
            $oRole = Sentinel::findRoleBySlug($this->argument('role'));
            
            if (is_null($oRole)) {
                $this->error('Role '. $this->argument('role') .' not found !');
                exit(1);
            }
        }
        
        $oUser = Sentinel::register([
            'first_name'    => $this->ask('What is the firstname ?'),
            'last_name'     => $this->ask('What is the name ?'),
            'email'         => $this->ask('What is the e-mail ?'),
            'password'      => $this->secret('What is the password?'),
            'api_token'     => Str::random(60)
        ], true);
        
        if (isset($oRole)) {
            $oUser->roles()->attach($oRole);
        }
        
        $oUser->save();
    }
}
