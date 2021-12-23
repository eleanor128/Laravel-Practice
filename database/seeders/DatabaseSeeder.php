<?php

namespace Database\Seeders;

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
        $this->call([
            PermissionSeeder::class,
            // ArticleSeeder::class, 不需要了，不然會跳author_id 沒有default value 的錯
            AdminSeeder::class,
            UserSeeder::class,
        ]);
    }
}
