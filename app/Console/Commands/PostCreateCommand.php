<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class PostCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create 10 Posts';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Post::factory(10)->create();
        $this->info('Create Posts Successful');
    }
}
