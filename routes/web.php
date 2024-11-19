<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs/create', function (){
    return view('job.create');
});

Route::get('/jobs/{job}/edit', function (Job $job){

    // If you want to use an id of the table. No need to set the type of the parameter.
    // $job = Job::find($id);

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