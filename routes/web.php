<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '30000',
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '20000',
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '30000',
            ]
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Director',
            'salary' => '30000',
        ],
        [
            'id' => 2,
            'title' => 'Programmer',
            'salary' => '20000',
        ],
        [
            'id' => 3,
            'title' => 'Teacher',
            'salary' => '30000',
        ]
    ];

    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

    // dd($job);

    return view('single-job', ['job' => $job]);
});
