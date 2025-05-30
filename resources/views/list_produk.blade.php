<head>
    <title>List Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">

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
                </tr>
            </thead>
            <tbody>
                @foreach ($nama as $index => $item)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $item }}</td>
                        <td class="px-4 py-2 border">{{ $desc[$index] }}</td>
                        <td class="px-4 py-2 border">{{ $harga[$index] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

