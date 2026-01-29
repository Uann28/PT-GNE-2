<x-app-layout title="Edit Standar Harga">

<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow">

    <h2 class="text-xl font-bold mb-6">Edit Standar Harga</h2>

    <form method="POST"
          action="{{ route('admin.price-standards.update', $priceStandard) }}"
          class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="text-sm font-bold">Mutu</label>
            <input name="mutu"
                   value="{{ $priceStandard->mutu }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="text-sm font-bold">Tebal</label>
            <input name="thickness"
                   value="{{ $priceStandard->thickness }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="text-sm font-bold">Harga</label>
            <input name="price"
                   value="{{ $priceStandard->price }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="text-sm font-bold">Satuan</label>
            <input name="unit"
                   value="{{ $priceStandard->unit }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <button class="bg-blue-600 text-white px-6 py-2 rounded">
            Simpan Perubahan
        </button>
    </form>

</div>

</x-app-layout>
