<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рабочая панель</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center h-16">
                <div class="flex space-x-10"> 
                    <a href="http://localhost:8000/list" 
                        class="border border-gray-500 text-gray-600 px-6 py-2 rounded-lg transition duration-300 text-lg font-medium hover:bg-gray-200">
                        Список
                    </a>
                    <a href="http://localhost:8000/add_page" 
                        class="border border-gray-500 text-gray-600 px-6 py-2 rounded-lg transition duration-300 text-lg font-medium hover:bg-gray-200">
                        Добавить
                    </a>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="max-w-5xl mx-auto px-6 py-10">
        @yield('content')
    </div>

</body>
</html>