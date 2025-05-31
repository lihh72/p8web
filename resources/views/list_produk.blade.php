<head>
    <title>List Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">

    @if (session('success'))
    <div id="flash-message" class="mb-6 px-4 py-3 rounded relative bg-green-100 border border-green-400 text-green-700 transition-opacity duration-500 ease-in-out">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="flash-message" class="mb-6 px-4 py-3 rounded relative bg-red-100 border border-red-400 text-red-700 transition-opacity duration-500 ease-in-out">
        {{ session('error') }}
    </div>
@endif

<div class="max-w mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Input Produk</h1>

    <form method="POST" action="{{ route('produk.simpan') }}">
        @csrf
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="nama" class="block mb-1 font-medium text-gray-700">Nama:</label>
                <input type="text" id="nama" name="nama" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <div>
                <label for="deskripsi" class="block mb-1 font-medium text-gray-700">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <div>
                <label for="harga" class="block mb-1 font-medium text-gray-700">Harga:</label>
                <input type="number" id="harga" name="harga" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>
        </div>

        <button type="submit" class="mt-6 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Simpan</button>
    </form>
</div>

<div class="max-w mx-auto mt-12 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Daftar Produk</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-700 border border-gray-200">
            <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                <tr>
                    <th scope="col" class="px-4 py-2 border">No</th>
                    <th scope="col" class="px-4 py-2 border">Nama Produk</th>
                    <th scope="col" class="px-4 py-2 border">Deskripsi Produk</th>
                    <th scope="col" class="px-4 py-2 border">Harga Produk</th>
                    <th scope="col" class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($produk as $index => $item)
        <tr class="bg-white border-b hover:bg-gray-50">
            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
            <td class="px-4 py-2 border">{{ $item->nama }}</td>
            <td class="px-4 py-2 border">{{ $item->deskripsi }}</td>
            <td class="px-4 py-2 border">{{ $item->harga }}</td>
            <td class="px-4 py-2 border">
                <button type="button"
    onclick="openEditModal({{ $item->id }}, '{{ $item->nama }}', '{{ $item->deskripsi }}', {{ $item->harga }})"
    class="text-blue-600 hover:underline mr-2">Edit</button>
                <form method="POST" action="{{ route('produk.delete', ['id' => $item->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $item->nama }}?')"class="text-red-600 hover:underline mr-2">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>
</div>

<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h3 class="text-lg font-bold mb-4 text-gray-800">Edit</h3>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId" name="id">

            <div class="mb-4">
                <label for="editNama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="editNama" name="nama" class="w-full border border-gray-300 p-2 rounded-lg mt-1" />
            </div>

            <div class="mb-4">
                <label for="editDeskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="editDeskripsi" name="deskripsi" rows="3" class="w-full border border-gray-300 p-2 rounded-lg mt-1"></textarea>
            </div>

            <div class="mb-4">
                <label for="editHarga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" id="editHarga" name="harga" class="w-full border border-gray-300 p-2 rounded-lg mt-1" />
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, nama, deskripsi, harga) {
        document.getElementById('editId').value = id;
        document.getElementById('editNama').value = nama;
        document.getElementById('editDeskripsi').value = deskripsi;
        document.getElementById('editHarga').value = harga;

        const form = document.getElementById('editForm');
        form.action = `/listproduk/${id}`;

        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>