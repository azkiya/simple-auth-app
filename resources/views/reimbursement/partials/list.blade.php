<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Daftar Reimbursement') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Daftar invoice yang perlu dilakukan reimbursement') }}
        </p>
    </header>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No Invoice</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Tanggal Pengajuan</th>
                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                    <th scope="col" class="px-6 py-3">File</th>
                    <th scope="col" class="px-8 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $user->nip }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->jabatan }}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <a href="{{ route('users.show', $user->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                            <a href="{{ route('users.edit', $user->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline ms-3">Edit</a>
                            <a href="#"
                                onclick="event.preventDefault(); if (confirm('Apakah anda yakin menghapus data karyawan ini ?')) { document.getElementById('delete-form-{{ $user->id }}').submit(); }"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                            <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user) }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Karyawan belum Tersedia.
                    </div>
                @endforelse
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
</section>
