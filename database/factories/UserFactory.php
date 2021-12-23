<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => $this->faker->randomElement([User::ROLE['author'], User::ROLE['reader']]), //要隨機拿的要被[]陣列包起來(兩個一起包起來)
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */

    /** email 沒有認證的時候*/
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function author()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => User::ROLE['author']
            ];
        });
    }

    public function reader()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => User::ROLE['reader']
            ];
        });
    }


    public function configure()
    {
        $permissions = Role::with('permissions')
            ->get()
            ->keyBy('name')
            ->map(function ($item, $key) {
                return $item->permissions->pluck('name')->toArray(); //pluck():只留下name
            })
            ->toArray();

        return $this->afterCreating(
            function (User $user) use ($permissions) {
                if ($user->role === User::ROLE['author']) {
                    $user->articles()
                        ->saveMany(
                            Article::factory()->count(2)->make()
                        );
                    $user->syncPermissions($permissions['author']);
                } else if ($user->role === User::ROLE['reader']) {
                    $user->syncPermissions($permissions['reader']);
                }
            }
        );
    }
}
