<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class ProductCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create 10 products';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Product::factory(10)->create();
        $this->info('Create Products Successful');
    }
}
