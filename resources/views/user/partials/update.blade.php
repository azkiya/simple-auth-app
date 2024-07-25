<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Data Karyawan') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update data karyawan') }}
        </p>
    </header>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Edit User</h1>
        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input required type="text" name="nama" id="nama" value="{{ old('nama', $user->nama) }}"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                <input required type="text" name="nip" id="nip" value="{{ old('nip', $user->nip) }}"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                <select name="jabatan" id="jabatan"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($jobTitles as $jobTitle)
                        <option value="{{ $jobTitle }}" {{ $user->jabatan == $jobTitle ? 'selected' : '' }}>
                            {{ $jobTitle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 ml-80">Update</button>
            </div>
        </form>
    </div>
</section>
