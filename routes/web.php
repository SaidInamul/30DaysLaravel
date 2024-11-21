<?php

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs/create', function (){
    return view('job.create');
});

Route::get('/jobs/{job}/edit', function (Job $job){

    // If you want to use an id of the table. No need to set the type of the parameter.
    // $job = Job::find($id);


    // Authorization method 1
    // if (Auth::guest()) {
    //     redirect('/login');
    // }

    // if ($job->employer->user->isNot(Auth::user())) {
    //     abort(403);
    // }

    // Authorization method 2
    // Gate::define('edit-job', function(User $user, Job $job){
    //     return $job->employer->user->is($user);
    // });
    // Direct
    // Gate::authorize('edit-job', $job);
    // With condition
    // if (Gate::denies('edit-job', $job)) {
    //     // Do something example redirect...
    // }

    //Authorization method 3
    // Create a gate definition in appServiceProvide.php
    // if (Auth::user->cannot('edit-job', $job)) {
    //     //to do something
    // }

    //Authorization method 4
    // Create middle in the route file

    // Authorization method 5
    // Create a policy

    return view('job.edit', ['job' => $job]);
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(4);
    return view('job.index', [
        'jobs' => $jobs
    ]);
});

// SHOW
Route::get('/jobs/{job}', function (Job $job) {

    // $job = Job::find($id);

    return view('job.show', ['job' => $job]);
});

// STORE
Route::post('/jobs', function (){

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'integer'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 2, 
    ]);

    return redirect('/jobs');
});

// UPDATE
Route::patch('/jobs/{job}', function (Job $job) {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'integer'],
    ]);

    // $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);
    
});

// DELETE
Route::delete('/jobs/{job}', function (Job $job) {
    
    // Job::findOrFail($id)->delete();

    $job->delete();

    return redirect('/jobs'); 
});

// Route group...
// Route::controller(JobController::class)->group(function (){
//     Route::get('/jobs', 'index');
// });

// Route resource
// Route::resource('jobs', JobController::class);


//REGISTER
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


//LOGIN
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);