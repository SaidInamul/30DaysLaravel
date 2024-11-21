<x-layouts>
    <x-slot:heading>
        Edit job
    </x-slot:heading>

    <form action="/jobs/{{ $job->id }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Edit the new job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Please complete all the fields with the relevent information.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field> 
                        <div class="sm:col-span-4">
                            <x-form-label for="title">Title</x-form-label>
                            <div class="mt-2">
                                <x-form-input value="{{ $job->title }}" type="text" name="title" id="title" placeholder="Shift Leader" required></x-form-input>
                            </div>
                            <x-form-error name="title"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Salary per year</x-form-label>
                        <div class="mt-2">
                            <x-form-input value="{{ $job->salary }}" type="text" name="salary" id="salary" placeholder="30000"></x-form-input>
                        </div>
                        <x-form-error name="salary"></x-form-error>
                    </x-form-field>
                </div>

            {{-- <div class="mt-5">
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div> --}}
            </div>

        <div class="mt-6 flex items-center justify-between">
            
            <x-secondary-button form="delete-form">
                Delete
            </x-secondary-button>

            <div class="flex items-center justify-end gap-x-6">
                <x-tertiary-link href="/jobs">Cancel</x-tertiary-link>
                <x-primary-button type="submit">Save</x-primary-button>
            </div>
            
        </div>
    </form>

    <form action="/jobs/{{ $job->id }}" method="POST" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
  
</x-layouts>