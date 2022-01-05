<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;

class DeleteOlderBlogPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:older-blog';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Used to delete blog posts older than last 30 days';

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
     * @return int
     */
    public function handle()
    {

        Blog::whereDate('created_at', '<=', now()->subDays(30))->delete();
    }
}
