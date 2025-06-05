<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;
use App\Models\Crop;
use App\Models\Task;
use App\Models\User;
use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showIndex()
    {
        if (Auth::check()) {
            $user = AUTH::user();
            $plot = $user->plot;
            // $tasks = $plot->tasks->sortBy('limit_date');
            // $tasks = $tasks->groupBy(function ($task) {
            //     return $task->is_periodic ? $task->task_name : $task->id;
            // })->map(function ($group) {
            //     return $group->first();
            // });

            $today = Carbon::today()->toDateString();
            $tasks = $plot->tasks
                ->filter(fn($task) => !$task->is_periodic || $task->limit_date >= $today)
                ->sortBy('limit_date')
                ->groupBy(fn($task) => $task->is_periodic ? $task->task_name : $task->id)
                ->map(fn($group) => $group->first());

            $events = Event::where('event_date', '>=', $today)->orderBy('event_date', 'asc')->get();
            return view('index-session', compact('tasks', 'events'));
        } else {
            return view('index');
        }
    }
    public function showMyPlot()
    {
        if (Auth::check()) {

            $user = Auth::user();
            $plot = $user->plot;
            $tasks = [];
            $tasks = $plot->tasks;
            $tasks = $tasks->toArray();

            $periodic = [];
            $nonPeriodic = [];

            foreach ($tasks as $task) {
                if ($task['is_periodic'] && !$task['completed_date']) {
                    $name = $task['task_name'];
                    if (!isset($periodic[$name]) || strtotime($task['limit_date']) < strtotime($periodic[$name]['limit_date'])) {
                        $periodic[$name] = $task;
                    }
                } else {
                    $nonPeriodic[] = $task;
                }
            }

            $finalTasks = array_merge($nonPeriodic, array_values($periodic));

            usort($finalTasks, function ($a, $b) {
                return strtotime($a['limit_date']) <=> strtotime($b['limit_date']);
            });

            $tasks = $finalTasks;

            $today = Carbon::today()->toDateString();
            $completedTasks = [];
            $pastTasks = [];
            $todayTasks = [];
            $futureTasks = [];
            foreach ($tasks as $task) {
                $fecha = $task['limit_date'];
                if ($fecha < $today) {
                    if (!is_null($task['completed_date'])) {


                        $userWho = $task['completed_by']; // aquí solo tienes el ID
                        // Para obtener el usuario, tendrías que consultar:
                        $user = User::find($userWho);
                        $task['userName'] = $user ? $user->name : null;


                        $completedTasks[] = $task;
                    } else {
                        $pastTasks[] = $task;
                    }
                } elseif ($fecha == $today) {
                    $todayTasks[] = $task;
                } else {
                    $futureTasks[] = $task;
                }
            }
            return view('myplot', compact('plot', 'completedTasks', 'pastTasks', 'todayTasks', 'futureTasks'));
        } else {
            return view('index');
        }
    }

    public function showEvents()
    {
        if (Auth::check()) {
            $nowUser = Auth::check();
            // $events = Event::orderBy('event_date', 'asc')->paginate(3);
            $today = Carbon::today()->toDateString(); // fecha actual en formato 'YYYY-MM-DD'

            $events = Event::where('event_date', '>=', $today)->orderBy('event_date', 'asc')->paginate(3);

            return view('events', compact('events', 'nowUser'));
        } else {

            return view('index');
        }
    }


    public function showCreateTask()
    {
        if (Auth::check()) {
            return view('createTask');
        } else {

            return view('index');
        }
    }

    public function createTask(Request $request)
    {
        if (Auth::check()) {


            $validated = $request->validate([
                'task_name' => 'required|string|max:255',
                'description' => 'required|string',
                'limit_date' => 'required|date',
                'periodicity' => 'required|integer',
            ]);

            $user = Auth::user();
            $plotId = $user->plot->id;

            $task = Task::create([
                'task_name' => $validated['task_name'],
                'plot_id' => $plotId,
                'description' => $validated['description'],
                'limit_date' => $validated['limit_date'],
                'is_periodic' => $validated['periodicity'] > 0,
                'time_period' => $validated['periodicity'] > 0 ? $validated['periodicity'] : null,
                'status' => 'unrealized'
            ]);

            if ($validated['periodicity'] > 0) {
                $this->createPeriodicTasks($task, $validated['periodicity']);
            }

            return redirect()->back()->with('success', 'Tarea creada correctamente');
        } else {

            return view('index');
        }
    }
    public function showCreateCrop()
    {
        if (Auth::check()) {
            return view('createCrop');
        } else {

            return view('index');
        }
    }

    public function createCrop(Request $request)
    {
        if (Auth::check()) {


            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'required',
                'harvest_date' => 'required|date',
                'sowing_date' => 'required|date'
            ]);

            $user = Auth::user();
            $plotId = $user->plot->id;

            $crop = Crop::create([
                'name' => $validated['name'],
                'plot_id' => $plotId,
                'description' => $validated['description'],
                'status' => $validated['status'],
                'harvest_date' => $validated['harvest_date'],
                'sowing_date' => $validated['sowing_date']
            ]);


            return redirect()->back()->with('success', 'Cultivo creado correctamente');
        } else {

            return view('index');
        }
    }

    protected function createPeriodicTasks(Task $originalTask, int $periodicity)
    {
        $occurrences = 12;

        for ($i = 1; $i <= $occurrences; $i++) {
            Task::create([
                'task_name' => $originalTask->task_name,
                'plot_id' => $originalTask->plot_id,
                'description' => $originalTask->description,
                'limit_date' => Carbon::parse($originalTask->limit_date)->addDays($periodicity * $i),
                'is_periodic' => true,
                'time_period' => $periodicity,
                'status' => $originalTask->status
            ]);
        }
    }
    public function showEditTask($taskId)
    {
        if (Auth::check()) {
            $task = Task::find($taskId);
            return view('editTask', compact('task'));
        } else {

            return view('index');
        }
    }
    public function updateTask(Request $request, $id)
    {
        if (Auth::check()) {


            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'limit_date' => 'required|date',
                'periodicity' => 'required|integer',
            ]);

            $task = Task::findOrFail($id);
            $user = Auth::user();
            $plotId = $user->plot->id;

            $wasPeriodic = $task->is_periodic;
            $oldTask = clone $task;
            $task->task_name = $request->name;
            $task->limit_date = $request->limit_date;
            $task->is_periodic = ($request->periodicity > 0);
            $task->time_period = $request->periodicity > 0 ? $request->periodicity : null;
            $task->status = 'unrealized';
            $task->save();

            if ($validated['periodicity'] > 0 && !$wasPeriodic) {
                $this->createPeriodicTasks($task, $validated['periodicity']);
            } elseif ($validated['periodicity'] > 0 && $wasPeriodic) {
                $this->updatePeriodicTasks($oldTask, $task);
            }
            $task->save();


            return redirect()->back()->with('success', 'Tarea editada correctamente');
        } else {

            return view('index');
        }
    }
    protected function updatePeriodicTasks(Task $referenceTask, Task $newTask)
    {
        $query = Task::where('task_name', $referenceTask->task_name)
            ->where('description', $referenceTask->description)
            ->where('is_periodic', $referenceTask->is_periodic)
            ->where('time_period', $referenceTask->time_period)
            ->where('plot_id', $referenceTask->plot_id)
            ->where('id', '!=', $referenceTask->id);

        $dataToUpdate = [
            'task_name'     => $newTask->task_name,
            'description'   => $newTask->description,
            'is_periodic'   => $newTask->is_periodic,
            'time_period'   => $newTask->time_period,
            'limit_date'    => $newTask->limit_date,
            'completed_date' => $newTask->completed_date,
            'status'        => $newTask->status,
        ];

        $query->update($dataToUpdate);
    }
    public function updateTaskToYesterday(Request $request, $id)
    {


        $referenceTask = Task::find($id);
        if (!$referenceTask) {
            return response()->json([
                'success' => false,
                'message' => 'Task no encontrada'
            ], 404);
        }

        $query = Task::where('task_name', $referenceTask->task_name)
            ->where('description', '=', $referenceTask->description)
            ->where('is_periodic', '=', $referenceTask->is_periodic)
            ->where('time_period', '=', $referenceTask->time_period)
            ->where('plot_id', '=', $referenceTask->plot_id)
            ->where('id', '=', $referenceTask->id);

        $dataToUpdate = [
            'limit_date'    => Carbon::yesterday(),
        ];

        $query->update($dataToUpdate);
        return response()->json([
            'success' => true,
            'new_date' => Carbon::yesterday()->toDateString()
        ]);
    }

    public function completeTask(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'selected_tasks' => 'required|array',
            'selected_tasks.*' => 'integer|exists:tasks,id'
        ]);

        Task::whereIn('id', $validated['selected_tasks'])
            ->update(['status' => 'completed', 'completed_date' => Carbon::now(), 'completed_by' => Auth::user()->id]);

        return back()->with('success', 'Tareas completadas exitosamente');


        // $validated = $request->validate([
        //     'selected_tasks' => 'required|array',
        //     'selected_tasks.*' => 'integer|exists:tasks,id',
        //     'action' => 'required|in:complete,delete'
        // ]);

        // Task::whereIn('id', $validated['selected_tasks'])
        //     ->update([
        //         'status' => 'completed',
        //     ]);

        // return redirect()->back()->with('success', 'Tareas marcadas como completadas correctamente');
    }

    public function deleteTasks(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'selected_tasks' => 'required|array',
            'selected_tasks.*' => 'integer|exists:tasks,id'
        ]);

        Task::whereIn('id', $validated['selected_tasks'])->Delete();

        return back()->with('success', 'Tareas completadas exitosamente');
    }

    public function updateTasksToTomorrow(Request $request)
    {
        $validated = $request->validate([
            'selected_tasks' => 'required|array',
            'selected_tasks.*' => 'integer|exists:tasks,id'
        ]);
        $dataToUpdate = [
            'limit_date'    => Carbon::tomorrow(),
        ];
        Task::whereIn('id', $validated['selected_tasks'])->update($dataToUpdate);

        return back()->with('success', 'Tareas atrasadas.');
    }
    public function updateTasksToPending(Request $request)
    {

        $referenceTask = Task::find($request->id);
        if (!$referenceTask) {
            return response()->json([
                'success' => false,
                'message' => 'Task no encontrada'
            ], 404);
        }

        $query = Task::where('task_name', $referenceTask->task_name)
            ->where('description', '=', $referenceTask->description)
            ->where('is_periodic', '=', $referenceTask->is_periodic)
            ->where('time_period', '=', $referenceTask->time_period)
            ->where('plot_id', '=', $referenceTask->plot_id)
            ->where('id', '=', $referenceTask->id);

        $dataToUpdate = [
            'completed_date'    => null,
            'status' => 'unrealized'
        ];

        $query->update($dataToUpdate);
        return response()->json([
            'success' => true,
            'new_date' => Carbon::yesterday()->toDateString()
        ]);
    }


    public function DeleteTask(Request $request, $id)
    {
        // dd($request);

        $referenceTask = Task::find($id);
        if (!$referenceTask) {
            return response()->json([
                'success' => false,
                'message' => 'Task no encontrada'
            ], 404);
        }

        $query = Task::where('task_name', $referenceTask->task_name)
            ->where('description', '=', $referenceTask->description)
            ->where('is_periodic', '=', $referenceTask->is_periodic)
            ->where('time_period', '=', $referenceTask->time_period)
            ->where('plot_id', '=', $referenceTask->plot_id)
            ->where('id', '=', $referenceTask->id);

        $query->delete();

        return response()->json([
            'success' => true,
            'new_state' => 'deleted'
        ]);
    }

    public function deleteCrop($id)
    {
        // dd($request);

        $referenceCrop = Crop::find($id);
        if (!$referenceCrop) {
            return response()->json([
                'success' => false,
                'message' => 'Task no encontrada'
            ], 404);
        }

        $query = Crop::where('id', '=', $referenceCrop->id);

        $query->delete();

        return response()->json([
            'success' => true,
            'new_state' => 'deleted'
        ]);
    }
    public function showEditCrop($cropId)
    {
        if (Auth::check()) {
            $crop = Crop::find($cropId);
            return view('editCrop', compact('crop'));
        } else {

            return view('index');
        }
    }
    public function updateCrop(Request $request, $id)
    {
        if (Auth::check()) {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'required',
                'harvest_date' => 'required|date',
                'sowest_date' => 'required|date'
            ]);


            $crop = Crop::findOrFail($id);
            $user = Auth::user();
            $plotId = $user->plot->id;

            $crop->name = $request->name;
            $crop->plot_id = $plotId;
            $crop->description = $request->description;
            $crop->status = $request->status;
            $crop->sowing_date = $request->sowing_date;
            $crop->harvest_date = $request->harvest_date;
            $crop->save();

            return redirect()->back()->with('success', 'Cultivo editado correctamente');
        } else {
            return view('index');
        }
    }

    public function toggleUserGoEvent(Request $request)
    {
        if (!Auth::check()) {
            return view('index');
        }
        $id = $request->eventId;
        $userid = Auth::user()->id;
        $user = user::findOrFail($userid);
        $event = Event::findOrFail($id);
        $isGoing = $user->events()->where('event_id', $event->id)->exists();

        if ($isGoing) {
            $user->events()->detach($event->id);
            return redirect()->back()->with('success', 'Te has desapuntado del evento.');
        } else {
            $currentAttendees = $event->users()->count();
            if ($currentAttendees >= $event->capacity) {
                return redirect()->back()->with('error', 'El evento está completo.');
            }
            $user->events()->attach($event->id);
            return redirect()->back()->with('success', 'Te has apuntado al evento.');
        }
    }



    public function showCalendar()
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $user = user::findOrFail($userid);
            $events = $user->events->map(function ($event) {

                return [
                    'title' => $event->name,
                    'start' => $event->event_date, // Asegúrate que es un campo datetime
                    // 'end' => $event->end_time,
                    'color' => '#366136',
                ];
            });

            $tasks = $user->plot->tasks->map(function ($task) {
                return [
                    'title' => $task->task_name,
                    'start' => $task->limit_date, // o cualquier fecha asociada
                    'color' => '#665649',
                    'allDay' => true
                ];
            });
            $calendarItems = array_merge($events->toArray(), $tasks->toArray());

            // $calendarItems = $events->merge($tasks);



            return view('calendar', [
                'calendarItems' => json_encode($calendarItems),
            ]);
        } else {

            return view('index');
        }
    }
}
