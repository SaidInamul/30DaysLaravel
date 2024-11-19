<x-layouts>
    <x-slot:heading>
        {{$job['title']}}
    </x-slot:heading>

    <h1 class="mb-10">This job pays <strong>${{$job['salary']}}</strong> per year.</h1>

    <x-primary-link href="/jobs/{{ $job['id'] }}/edit">Edit job</x-primary-link>
</x-layouts>