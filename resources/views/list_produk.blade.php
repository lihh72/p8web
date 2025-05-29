<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>List Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-6xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-4">List Produk</h1>

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Nama Produk</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Deskripsi Produk</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Harga Produk</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    @foreach ($nama as $index => $item)
                        <tr class="hover:bg-gray-100 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $item }}</td>
                            <td class="px-6 py-4 whitespace-normal text-sm">{{ $desc[$index] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="inline-block bg-green-100 text-green-700 font-semibold px-3 py-1 rounded">
                                    Rp {{ number_format($harga[$index], 0, ',', '.') }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
