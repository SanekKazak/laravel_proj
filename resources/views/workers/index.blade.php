@extends('welcome')
@section('content')
<div class="max-w-4xl mx-auto mt-20 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">Список рабочих</h1>

    <div class="bg-white mb-6 p-6 rounded-lg shadow-md">
        <h3 class="font-semibold mb-4">Статистика по рабочим местам</h3>
        <ul class="space-y-2">
            <li>Всего рабочик:{{ $allWorkers->count() }}</li>
            <li>Менеджеров:{{ $allWorkers->where('role_type', "manager")->count() }}</li>
            <li>Админов:{{ $allWorkers->where('role_type', "admin")->count() }}</li>
            <li>Работяг:{{ $allWorkers->where('role_type', "employee")->count() }}</li>
            <li>Больше всех:{{ $allWorkers->countBy('role_type')->sortDesc()->keys()->first() }}</li>
        </ul>
    </div>

    <button id="toggleButton" onclick="toggleElement()" 
        class="border border-gray-500 bg-blue-500 font-bold py-2 px-4 rounded-lg hover:bg-blue-600">
        Показать/Скрыть фильтры
    </button>

    <script>
        function toggleElement() {
            var element = document.getElementById('hiddenElement');
            element.style.display = (element.style.display === "none") ? "block" : "none";
        }
    </script>

    <div id="hiddenElement" class="mt-4 p-4  rounded-lg shadow-md" style="display: none;">
        <form action="/list" method="GET" class="space-y-4">
            @csrf
            <div class="flex items-center space-x-2">
                <input type="checkbox" name="alphSort" id="alphSort" value="1" class="w-5 h-5">
                <label for="alphSort" class="text-lg font-medium">Сортировать по алфавиту</label>
            </div>

            <div class="flex items-center space-x-2">
                <input type="checkbox" name="moneySort" id="moneySort" value="1" class="w-5 h-5">
                <label for="moneySort" class="text-lg font-medium">Сортировать по оплате</label>
            </div>

            <div>
                <label for="role_sort" class="block text-lg font-medium mb-1">Сортировать по роли</label>
                <select id="role_sort" name="role_sort" 
                    class="w-full border border-gray-500 rounded-lg p-3 text-lg bg-white">
                    <option value="">Выберите</option>
                    <option value="employee">Сотрудник</option>
                    <option value="admin">Админ</option>
                    <option value="manager">Менеджер</option>
                </select>
            </div>

            <button type="submit" 
                class="w-full bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600">
                Найти
            </button>
        </form>
    </div>
    <div class="mt-8 space-y-6" id="worker-container">
    @foreach ($workers as $worker)
        <div class="p-4 bg-white shadow-md rounded-lg border border-gray-200">
            <h2 class="text-2xl font-semibold">{{ $worker->name }}</h2>
            <p class="text-gray-600">{{ $worker->email }}</p>
            <p class="text-gray-800 font-medium">Оплата: {{ $worker->payment_type }}</p>
            <p class="text-gray-800 font-medium">Роль: {{ $worker->role_type }}</p>
        </div>
    @endforeach
    <div class="mt-6">
        {{ $workers->appends(request()->query())->links() }}
    </div>
</div>
@endsection