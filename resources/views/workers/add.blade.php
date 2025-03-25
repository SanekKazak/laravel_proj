@extends('welcome')
@section('content')
<div class="max-w-2xl mx-auto mt-20 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-6">Добавить пользователя</h1>
    
    <form action="/add_page" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="email" class="block text-lg font-medium">Email:</label>
            <input type="text" id="email" name="email" class="w-full border border-gray-500 rounded-lg p-3 text-lg" value="{{ old('email') }}">
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="name" class="block text-lg font-medium">Name:</label>
            <input type="text" id="name" name="name" class="w-full border border-gray-500 rounded-lg p-3 text-lg" value="{{ old('name') }}">
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="role_type" class="block text-lg font-medium">Role:</label>
            <select id="role_type" name="role_type" class="w-full border border-gray-500 rounded-lg p-3 text-lg bg-white">
                <option value="employee">Employee</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
            </select>
        </div>

        <div>
            <label for="payment_type" class="block text-lg font-medium">Payment:</label>
            <select id="payment_type" name="payment_type" class="w-full border border-gray-500 rounded-lg p-3 text-lg bg-white">
                <option value="10000">10,000</option>
                <option value="20000">20,000</option>
                <option value="30000">30,000</option>
            </select>
        </div>

        <div>
            <label for="achievement_path" class="block text-lg font-medium">Выберите медаль:</label>
            <select id="achievement_path" name="achievement_path" class="w-full border border-gray-500 rounded-lg p-3 text-lg bg-white">
                @foreach($medals as $medal)
                    <option value="{{ $medal['path'] }}" data-img="{{ Storage::url($medal['path']) }}">
                        {{ pathinfo($medal['filename'], PATHINFO_FILENAME) }} место
                    </option>
                @endforeach
            </select>
            <img id="medal_preview" src="" alt="Изображение медали" width="250" class="mt-2 hidden object-cover border border-gray-400 rounded-lg shadow-md">
        </div>

        <script>
            const select = document.getElementById("achievement_path");
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
            Добавить
        </button>

        <a href="http://localhost:8000/auto_test_add"
        class="block w-full text-center text-white font-bold py-3 mt-2 rounded-lg bg-green-500 hover:bg-green-600 shadow-md">
            Добавить тестовые значения
        </a>
    </form>
</div>
@endsection