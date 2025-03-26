@extends('welcome')

@section('content')
<form action="/medalsChange" method="POST" class="space-y-4">
    @csrf
    <input type="hidden" name="email" value="{{ $currentWorker->email }}">
    <div class="max-w-2xl mx-auto mt-20 p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6">Изменение награды</h1>
        <div>
            <label for="filename_type" class="block text-lg font-medium">Выберите медаль:</label>
            <select id="filename_type" name="filename_type" class="w-full border border-gray-500 rounded-lg p-3 text-lg bg-white">
                @foreach($medals as $medal)
                    <option value="{{ basename($medal->filename) }}" data-img="{{ Storage::url($medal->path) }}"
                        @if (basename($medal->path) === basename($path)) selected @endif>
                        {{ pathinfo($medal->filename, PATHINFO_FILENAME) }} место
                    </option>
                @endforeach
            </select>
            <img id="medal_preview" src="{{ Storage::url($path) }}" alt="Изображение медали" width="250" height="250" 
                class="mt-2 object-cover border border-gray-400 rounded-lg shadow-md">
        </div>

        <script>
            const select = document.getElementById("filename_type");
            const img = document.getElementById("medal_preview");

            select.addEventListener("change", function() {
                const selectedOption = select.options[select.selectedIndex];
                const imgSrc = selectedOption.getAttribute("data-img");

                if (imgSrc) {
                    img.src = imgSrc;
                    img.classList.remove("hidden");
                } else {
                    img.classList.add("hidden");
                }
            });

            select.dispatchEvent(new Event('change'));
        </script>

        <button type="submit" class="w-full text-white font-bold py-3 mt-4 rounded-lg bg-blue-500 hover:bg-blue-600 shadow-md">
            Изменить
        </button>
    </div>
</form>
@endsection