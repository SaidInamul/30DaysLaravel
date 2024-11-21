<x-layouts>
    <x-slot:heading>
        Sign in
    </x-slot:heading>

     <form action="/login" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Sign in to access your account</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Please complete all the fields with the relevent information.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input value="{{ old('email') }}" type="text" name="email" id="email" placeholder="jondoe@email.com" required></x-form-input>
                        </div>
                        <x-form-error name="email"></x-form-error>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password" required></x-form-input>
                        </div>
                        <x-form-error name="password"></x-form-error>
                    </x-form-field>
                </div>
            </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-tertiary-link href="/">Cancel</x-tertiary-link>
            <x-primary-button type="submit">login</x-primary-button>
        </div>
    </form> 
  
</x-layouts>