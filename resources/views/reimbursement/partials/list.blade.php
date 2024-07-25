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
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-8 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $inv)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $inv->no_invoice }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inv->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inv->tanggal }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inv->deskripsi }}
                        </td>
                        <td class="px-6 py-4">
                            <!-- Preview Button -->
                            <button onclick="openModal('{{ $inv->id }}')"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Preview
                            </button>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                switch ($inv->status) {
                                    case 0:
                                        $message = 'Menunggu konfirmasi';
                                        $class = 'bg-yellow-500';
                                        break;
                                    case 1:
                                        $message = 'Sudah disetujui';
                                        $class = 'bg-green-500';
                                        break;

                                    case 2:
                                        $message = 'Ditolak';
                                        $class = 'bg-red-500';
                                        break;
                                    default:
                                        $message = 'Status unknown.';
                                        $class = 'bg-gray-500';
                                        break;
                                }
                            @endphp
                            <div class="{{ $class }} text-white p-2 rounded mt-4">
                                {{ $message }}
                            </div>
                        </td>
                        <td class="flex items-center px-6 py-6">
                            @if ($inv->status == 0)
                                <form action="{{ route('reimbursements.approved', $inv->id) }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <div class="mb-4">
                                        <button type="submit" name="status" value="1"
                                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-3 mb-3 rounded">
                                            Approved
                                        </button>
                                        <button type="submit" name="status" value="2"
                                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-3 rounded">
                                            Rejected
                                        </button>
                                    </div>
                                </form>
                            @endif
                        </td>
                    </tr>
                    <div id="previewModal-{{ $inv->id }}"
                        class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
                        <div
                            class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            Invoice Preview
                                        </h3>
                                        <div class="mt-2">
                                            <div class="mt-2">
                                                @php
                                                    $fileUrl = Storage::url($inv->file);
                                                    $extension = pathinfo($fileUrl, PATHINFO_EXTENSION);
                                                @endphp
                                                @if ($extension == 'pdf')
                                                    <iframe src="{{ $fileUrl }}" class="w-full h-64"
                                                        frameborder="0"></iframe>
                                            </div>
                                        @else
                                            <img id="previewImage" src="{{ $fileUrl }}" alt="Preview"
                                                class="w-full h-auto rounded-lg">
                @endif
    </div>
    </div>
    </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button onclick="closeModal('{{ $inv->id }}')"
            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
            Close
        </button>
    </div>
    </div>
    </div>
@empty
    <div class="alert alert-danger">
        Data Karyawan belum Tersedia.
    </div>
    @endforelse
    </tbody>
    </table>
    </div>
</section>
