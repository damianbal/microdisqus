<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:admin {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a user admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $user = $this->argument('user');

        $u = User::find($user);
        $u->update(['admin' => true]);
    }
}
