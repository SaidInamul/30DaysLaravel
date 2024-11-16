<x-layouts>
    <x-slot:heading>
        Jobs page
    </x-slot:heading>

    @foreach ($jobs as $job)
    <li>
        <a href="/jobs/{{$job['id']}}" class="text-blue-600 hover:underline underline-offset-4">{{$job['title']}}</a>
    </li>
    @endforeach
</x-layouts>