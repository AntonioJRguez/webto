<?php

namespace Database\Seeders;
use Carbon\Carbon;

use App\Models\Event;
use App\Models\Plot;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Plot::create([
            'name' => 'los rikitauners',
            'description' => 'Somos los rikitauners y venimos a joaer',
            'plot_code' => 'asdf'
        ]);
        Plot::create([
            'name' => 'los tarabados',
            'description' => 'Somos los tarabados y venimos a joaer',
            'plot_code' => 'tarabars'
        ]);
        User::factory()->create([
            'name' => 'asdf',
            'email' => 'asdfasdf@asdfasdf.com',
            'password' => 'asdf',
            'is_admin' => true,
            'plot_code' => 'asdf'
        ]);
        User::factory()->create([
            'name' => 'noadmin',
            'email' => 'noadmin@noadmin.com',
            'password' => 'noadmin',
            'is_admin' => false,
            'plot_code' => 'asdf'
        ]);

        Event::factory()->create([
            'name' => 'evento de prueba',
            'description' => 'esto es un evento de prueba',
            'event_date' => Carbon::now(),
            'location' => 'ciudad real',
            'capacity' => 5,
        ]);
    }
}
