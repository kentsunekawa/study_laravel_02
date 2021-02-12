<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use App\Person;

class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my:cmd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is my first command.';

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
        $min = (int)$this->ask('min age:');
        $max = (int)$this->ask('max age:');
        $headers = ['id', 'name', 'age', 'mail'];
        $result = Person::select($headers)
            ->where('age', '>=' , $min)
            ->where('age', '<=', $max)
            ->orderBy('age')->get();
        if ($result->count() == 0)
        {
            $this->error("can't find Person.");
            return;
        }
        $data = $result->toArray();
        $this->table($headers, $data);
    }


}
