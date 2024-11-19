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
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input value="{{ $job->title }}" type="text" name="title" id="title" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6" placeholder="Shift Leader" required>
                            </div>
                        </div>
                        @error('title')
                            <p class="text-red-500 text-xs font-bold mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="sm:col-span-4">
                    <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary per year</label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input value="{{ $job->salary }}" type="text" name="salary" id="salary" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6" placeholder="30000">
                        </div>
                    </div>
                    @error('salary')
                        <p class="text-red-500 text-xs font-bold mt-2">{{ $message }}</p>
                    @enderror
                </div>
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