<?php

namespace App\Console\Commands;
use App\User;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user=1:The ID of the user} {--f|field=name:The field of data sheet}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send drip e-mails to a user';

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
        $this->info('Let\'s begin!');

        $name = $this->anticipate('What is your name?', ['Taylor', 'Dayle']);
    
        $times = $this->ask('How many times do you want to repeat?');

        if($times>10){
            $this->error('Something went wrong!');
            $times = $this->ask('How many times do you want to repeat?');
        }

        $seconds = $this->ask('How long does it sleep?');

        $user = User::where('id',$this->argument('user')[0])->first();

        $cc = $this->option('field');

        echo $user->$cc."\n";

        if ($this->confirm('Do you want to create '.$times.' controller repeatedly?')) {
            for ($i=0; $i < $times; $i++) { 
                $this->call('make:controller',[
                    'name'=>'Test/Xx'.$i.'Controller',
                    '--resource'=>true
                ]);
                sleep($seconds);
            }
        }

        $this->info('The following can arrange the data in a list！');
        $headers = ['Name', 'Email'];

        $users = User::all(['name', 'email'])->toArray();

        $this->table($headers, $users);

    }
}
