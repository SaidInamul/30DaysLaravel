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

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(4);
    return view('job.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);

    return view('job.show', ['job' => $job]);
});

Route::post('/jobs', function (){
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1, 
    ]);

    return redirect('/jobs');
});