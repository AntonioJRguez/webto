<?php

namespace Database\Seeders;

use App\Models\Crop;
use Carbon\Carbon;

use App\Models\Event;
use App\Models\Plot;
use App\Models\Task;
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
            'event_date' => Carbon::parse('2025-05-23'),
            'location' => 'ciudad real',
            'duration' => '01:00',
            'capacity' => 5,
        ]);
        Event::factory()->create([
            'name' => 'evento 2aaaaaaaaaaaa de prueba',
            'description' => 'esto es un evento de prueba y no deberia salir',
            'event_date' => Carbon::yesterday(),
            'location' => 'ciudad real',
            'duration' => '01:00',
            'capacity' => 5,
        ]);
        Event::factory()->create([
            'name' => 'evento 3 de prueba',
            'description' => 'esto es un evento 2 de prueba',
            'event_date' => Carbon::now(),
            'location' => 'ciudad real',
            'duration' => '01:00',
            'capacity' => 5,
        ]);
        Event::factory()->create([
            'name' => 'evento 4 de prueba',
            'description' => 'esto es un evento 2 de prueba',
            'event_date' => Carbon::now(),
            'location' => 'ciudad real',
            'duration' => '01:00',
            'capacity' => 5,
        ]);
        Event::factory()->create([
            'name' => 'evento 5 de prueba',
            'description' => 'esto es un evento 2 de prueba',
            'event_date' => Carbon::now(),
            'location' => 'ciudad real',
            'duration' => '01:00',
            'capacity' => 5,
        ]);
        Event::factory()->create([
            'name' => 'evento 6  de prueba',
            'description' => 'esto es un evento 2 de prueba',
            'event_date' => Carbon::now(),
            'location' => 'ciudad real',
            'duration' => '01:00',
            'capacity' => 5,
        ]);
        Event::factory()->create([
            'name' => 'evento 7 de prueba',
            'description' => 'esto es un evento 2 de prueba',
            'event_date' => Carbon::now(),
            'location' => 'ciudad real',
            'duration' => '01:00',
            'capacity' => 5,
        ]);

        Task::factory()->create([
            'task_name' => 'tarea 7 de prueba',
            'plot_id' => '1',
            'description' => 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion',
            'limit_date' => Carbon::tomorrow(),
        ]);
        Task::factory()->create([
            'task_name' => 'tarea asdf de prueba',
            'plot_id' => '1',
            'description' => 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion',
            'limit_date' => Carbon::tomorrow(),
        ]);
        Task::factory()->create([
            'task_name' => 'tarea rrrr de prueba',
            'plot_id' => '1',
            'description' => 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion',
            'limit_date' => Carbon::tomorrow(),
        ]);
        Task::factory()->create([
            'task_name' => 'tarea aaa de prueba',
            'plot_id' => '1',
            'description' => 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion',
            'limit_date' => Carbon::tomorrow(),
        ]);
        Task::factory()->create([
            'task_name' => 'tarea pa hoy7 de prueba',
            'plot_id' => '1',
            'description' => 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion',
            'limit_date' => Carbon::today(),
        ]);
        Task::factory()->create([
            'task_name' => 'tarea para hoy de prueba',
            'plot_id' => '1',
            'description' => 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion',
            'limit_date' => Carbon::today(),
        ]);
        Task::factory()->create([
            'task_name' => 'tarea pa hoy de prueba',
            'plot_id' => '1',
            'description' => 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion',
            'limit_date' => Carbon::today(),
        ]);
        Task::factory()->create([
            'task_name' => 'tarea para ayer de prueba',
            'plot_id' => '1',
            'description' => 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion',
            'limit_date' => Carbon::yesterday(),
        ]);
        Task::factory()->create([
            'task_name' => 'tarea pa ayer de prueba',
            'plot_id' => '1',
            'description' => 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion',
            'limit_date' => Carbon::yesterday(),
        ]);
        Task::factory()->create([
            'task_name' => 'tarea pa ver si se repite diariamente',
            'plot_id' => '1',
            'description' => 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion',
            'limit_date' => Carbon::tomorrow(),
            'is_periodic' => true,
            'time_period' => 1
        ]);
        Crop::factory()->create([
            'name' => 'tomate',
            'sowing_date' => Carbon::today(),
            'harvest_date' => Carbon::parse('2025-05-24'),
            'status' => 'sowed',
            'description' => 'tomate sembrado un dia de sol',
            'plot_id' => 1
        ]);
        Crop::factory()->create([
            'name' => 'pimiento',
            'sowing_date' => Carbon::today(),
            'harvest_date' => Carbon::parse('2025-05-26'),
            'status' => 'sowed',
            'description' => 'pimiento sembrado un dia de sol',
            'plot_id' => 1
        ]);
        Crop::factory()->create([
            'name' => 'cebolla',
            'sowing_date' => Carbon::today(),
            'harvest_date' => Carbon::parse('2025-05-29'),
            'status' => 'sowed',
            'description' => 'cebolla sembrado un dia de sombra',
            'plot_id' => 1
        ]);
        $user = User::find(1);
        $user->events()->attach(1);
    }
}
