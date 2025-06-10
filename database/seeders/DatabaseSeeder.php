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
            'name' => 'Parcela los originales.',
            'description' => 'Somos los primeros usuarios de webto y es la primera parcela.',
            'plot_code' => 'original'
        ]);
        Plot::create([
            'name' => 'Parcela 2, los culipardos.',
            'description' => 'Somos gente de Ciudad Real con ganas de aprender mucho.',
            'plot_code' => 'culipardos'
        ]);
         Plot::create([
            'name' => 'Parcela 3',
            'description' => 'Parcela 3',
            'plot_code' => 'parcela3'
        ]);
        User::factory()->create([
            'name' => 'Antonio',
            'email' => 'antonio@antonio.com',
            'password' => 'antonio',
            'is_admin' => true,
            'plot_code' => 'original'
        ]);
        User::factory()->create([
            'name' => 'Juana',
            'email' => 'juana@hotmail.com',
            'password' => 'juana',
            'is_admin' => false,
            'plot_code' => 'original'
        ]);

        User::factory()->create([
            'name' => 'Isma',
            'email' => 'isma@hotmail.com',
            'password' => 'isma',
            'is_admin' => false,
            'plot_code' => 'original'
        ]);

        User::factory()->create([
            'name' => 'Sara',
            'email' => 'sara@hotmail.com',
            'password' => 'sara',
            'is_admin' => false,
            'plot_code' => 'original'
        ]);

        User::factory()->create([
            'name' => 'Isabel',
            'email' => 'isa@gmail.com',
            'password' => 'isabel',
            'is_admin' => true,
            'plot_code' => 'culipardos'
        ]);
        User::factory()->create([
            'name' => 'Carlos',
            'email' => 'carlos@hotmail.com',
            'password' => 'carlos',
            'is_admin' => false,
            'plot_code' => 'culipardos'
        ]);

        User::factory()->create([
            'name' => 'Manuela',
            'email' => 'manuela@hotmail.com',
            'password' => 'manuela',
            'is_admin' => false,
            'plot_code' => 'culipardos'
        ]);

        User::factory()->create([
            'name' => 'Javier',
            'email' => 'javier@hotmail.com',
            'password' => 'javier',
            'is_admin' => false,
            'plot_code' => 'original'
        ]);

        Event::factory()->create([
            'name' => 'Inauguración del huerto comunitario',
            'description' => 'Disfrutaremos de una comida casera traída por cada uno de nosotros.',
            'event_date' => Carbon::parse('2025-06-27 14:30:00'),
            'location' => 'En el huerto.',
            'duration' => '02:00',
            'capacity' => 20,
        ]);
        Event::factory()->create([
            'name' => 'Buenas hierbas.',
            'description' => 'Salida a conocer plantas salvajes que ayudan al huerto comunitario.',
            'event_date' => Carbon::parse('2025-06-30 11:40:00'),
            'location' => 'Camino moledores',
            'duration' => '06:00',
            'capacity' => 5,
        ]);Event::factory()->create([
            'name' => 'Taller de compostaje.',
            'description' => 'Taller de compostaje dado por Alberto Martín.',
            'event_date' => Carbon::parse('2025-07-23 19:30:00'),
            'location' => 'En el huerto.',
            'duration' => '02:00',
            'capacity' => 10,
        ]);

        Event::factory()->create([
            'name' => 'Taller de poda de frutales.',
            'description' => 'Taller de poda dado por Alberto Martín.',
            'event_date' => Carbon::parse('2025-07-26 19:30:00'),
            'location' => 'En el huerto.',
            'duration' => '02:00',
            'capacity' => 10,
        ]);

        Event::factory()->create([
            'name' => 'Voluntarios para desbrozar nueva parcela y taller de uso de desbrozadora.',
            'description' => 'Se enseñarán a dos personas a usar la desbrozadora y aprovecharemos para limpiar la parcela 3.',
            'event_date' => Carbon::parse('2025-07-26 19:30:00'),
            'location' => 'En el huerto.',
            'duration' => '01:00',
            'capacity' => 2,
        ]);

        Task::factory()->create([
            'task_name' => 'Plantar albahaca para los mosquitos.',
            'plot_id' => '1',
            'description' => 'Debido a que hay muchos mosquitos, plantar albahaca cerca del huerto para poder estar mientras se trabaja.',
            'limit_date' => Carbon::tomorrow(),
        ]);
        Task::factory()->create([
            'task_name' => 'Plantar tomate.',
            'plot_id' => '1',
            'description' => 'Plantar tomates tardíos.',
            'limit_date' => Carbon::tomorrow(),
        ]);
        Task::factory()->create([
            'task_name' => 'Entutorar tomates grandes.',
            'plot_id' => '1',
            'description' => 'Con cañas de ríos cercanos hacer tutores para los tomates y agarrarlos.',
            'limit_date' => Carbon::tomorrow(),
        ]);
        Task::factory()->create([
            'task_name' => 'Hacer espantapájaros.',
            'plot_id' => '1',
            'description' => 'Tenemos que hacer un espantapájaros ya que los mirlos se comen todos los brotes tiernos.',
            'limit_date' => Carbon::tomorrow(),
        ]);
        Task::factory()->create([
            'task_name' => 'Conseguir abono',
            'plot_id' => '1',
            'description' => 'Conseguir abono.',
            'limit_date' => Carbon::yesterday(),
        ]);
        Task::factory()->create([
            'task_name' => 'Abonar huerta',
            'plot_id' => '1',
            'description' => 'Abonar zona nueva.',
            'limit_date' => Carbon::yesterday(),
        ]);
        Task::factory()->create([
            'task_name' => 'Arar el huerto',
            'plot_id' => '2',
            'description' => 'Remover el huerto para poder comenzar a cultivar',
            'limit_date' => Carbon::yesterday(),
        ]);
         Task::factory()->create([
            'task_name' => 'Plantar fresas',
            'plot_id' => '2',
            'description' => 'Plantar las fresas que trajo Manoli.',
            'limit_date' => Carbon::yesterday(),
        ]);
         Task::factory()->create([
            'task_name' => 'Desbrozar maleza',
            'plot_id' => '2',
            'description' => 'Quitar las malas hierbas antes de arar.',
            'limit_date' => Carbon::yesterday(),
        ]);
         Task::factory()->create([
            'task_name' => 'Conseguir humus de lombriz',
            'plot_id' => '2',
            'description' => 'El humus de lombriz es bueno para el comienzo de la huerta',
            'limit_date' => Carbon::yesterday(),
        ]);
        Crop::factory()->create([
            'name' => 'Tomates pera',
            'sowing_date' => Carbon::today(),
            'harvest_date' => Carbon::parse('2025-07-21'),
            'status' => 'sowed',
            'description' => '4 Tomates pera',
            'plot_id' => 1
        ]);
         Crop::factory()->create([
            'name' => 'Tomates kumato',
            'sowing_date' => Carbon::today(),
            'harvest_date' => Carbon::parse('2025-07-21'),
            'status' => 'sowed',
            'description' => '4 Tomates kumato',
            'plot_id' => 1
        ]);
        Crop::factory()->create([
            'name' => 'Pimientos',
            'sowing_date' => Carbon::today(),
            'harvest_date' => Carbon::parse('2025-05-26'),
            'status' => 'sowed',
            'description' => ' 8 pimientos sembrados un dia de sol',
            'plot_id' => 1
        ]);
        Crop::factory()->create([
            'name' => 'Calabacín',
            'sowing_date' => Carbon::today(),
            'harvest_date' => Carbon::parse('2025-05-29'),
            'status' => 'sowed',
            'description' => '4 plantas de Calabacín grande',
            'plot_id' => 1
        ]);

        Crop::factory()->create([
            'name' => 'Tomates',
            'sowing_date' => Carbon::today(),
            'harvest_date' => Carbon::parse('2025-07-21'),
            'status' => 'sowed',
            'description' => '6 Tomates pera',
            'plot_id' => 2
        ]);
         
        Crop::factory()->create([
            'name' => 'Pimientos',
            'sowing_date' => Carbon::parse('2025-05-26'),
            'harvest_date' => Carbon::parse('2025-06-26'),
            'status' => 'sowed',
            'description' => ' 8 pimientos italianos',
            'plot_id' => 1
        ]);
        Crop::factory()->create([
            'name' => 'Calabaza',
            'sowing_date' => Carbon::parse('2025-05-26'),
            'harvest_date' => Carbon::parse('2025-08-20'),
            'status' => 'sowed',
            'description' => '8 plantas de Calabaza larga',
            'plot_id' => 1
        ]);
    }
}
