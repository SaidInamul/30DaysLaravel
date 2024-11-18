<x-layouts>
    <x-slot:heading>
        Jobs page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{$job['id']}}" class="block px-4 py-6 border border-gray-200 rounded-lg">{{$job['title']}}
                <div class="font-bold text-sm text-blue-500">
                    {{ $job->employer->name }}
                </div>
            </a>
            
        @endforeach
    </div>
    
</x-layouts>