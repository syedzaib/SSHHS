<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <!-- Email -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>

    <!-- ID Number -->
    <div>
        <x-input-label for="id_number" :value="__('ID Number')" />
        <x-text-input id="id_number" name="id_number" type="text" class="mt-1 block w-full" :value="old('id_number', $user->id_number)" required />
        <x-input-error class="mt-2" :messages="$errors->get('id_number')" />
    </div>

    <!-- Date of Birth -->
    <div>
        <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
        <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" :value="old('date_of_birth', $user->date_of_birth)" required />
        <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
    </div>

    <!-- Mobile Number -->
    <div>
        <x-input-label for="mobile_number" :value="__('Mobile Number')" />
        <x-text-input id="mobile_number" name="mobile_number" type="text" class="mt-1 block w-full" :value="old('mobile_number', $user->mobile_number)" required />
        <x-input-error class="mt-2" :messages="$errors->get('mobile_number')" />
    </div>

    <!-- Nationality -->
    <div>
        <x-input-label for="nationality" :value="__('Nationality')" />
        <x-text-input id="nationality" name="nationality" type="text" class="mt-1 block w-full" :value="old('nationality', $user->nationality)" required />
        <x-input-error class="mt-2" :messages="$errors->get('nationality')" />
    </div>

    <!-- Gender -->
    <div>
        <x-input-label for="gender" :value="__('Gender')" />
        <select id="gender" name="gender" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
            <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('gender')" />
    </div>

    <!-- Qualification -->
    <div>
        <x-input-label for="qualification" :value="__('Qualification')" />
        <x-text-input id="qualification" name="qualification" type="text" class="mt-1 block w-full" :value="old('qualification', $user->qualification)" />
        <x-input-error class="mt-2" :messages="$errors->get('qualification')" />
    </div>

    <!-- Specialization -->
    <div>
        <x-input-label for="specialization" :value="__('Specialization')" />
        <x-text-input id="specialization" name="specialization" type="text" class="mt-1 block w-full" :value="old('specialization', $user->specialization)" />
        <x-input-error class="mt-2" :messages="$errors->get('specialization')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600"
            >{{ __('Saved.') }}</p>
        @endif
    </div>
</form>

</section>
