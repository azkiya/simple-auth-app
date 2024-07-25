<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Detail Karyawan') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Data karyawan dan jabatannya') }}
        </p>
    </header>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex items-center mb-4">
            <img src="https://www.creativefabrica.com/wp-content/uploads/2022/03/09/Woman-Icon-Teen-Profile-Graphics-26722130-1.jpg"
                alt="{{ $user->nama }}" class="w-25 h-25 rounded-full mr-4">
        </div>
        <div>
            <h1 class="text-4xl font-black text-gray-900 dark:text-white">{{ $user->nama }}</h1>
            <p class="text-gray-600">{{ $user->nip }}</p>
            <p class="text-lg font-black text-gray-900 dark:text-white">{{ $user->jabatan }}</p>
        </div>
        <div class="mb-2">
            <label class="font-semibold">Created At:</label>
            <p>{{ $user->created_at->format('F d, Y') }}</p>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Back
                to
                Users</a>
        </div>
    </div>
</section>
