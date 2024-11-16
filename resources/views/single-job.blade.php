<x-layouts>
    <x-slot:heading>
        {{$job['title']}}
    </x-slot:heading>

    <h1>This job pays <strong>${{$job['salary']}}</strong> per year.</h1>
</x-layouts>