<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        if(User::count() > 0)
        {
            foreach(User::all() as $user)
            {
                for($i=0; $i<50; $i++) {
                    Blog::factory()->create([
                        'user_id' => $user->id
                    ]);
                }
            }
        }

    }
}
