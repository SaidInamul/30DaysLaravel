<?php

namespace app\Models;

use Illuminate\Support\Arr;

class Job {
    public static function all (): array {
        return [
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
    }

    public static function find ($id): array {

        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

        if(!$job) {
            abort(404);
        }

        return $job;
    }
}