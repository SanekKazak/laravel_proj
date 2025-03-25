@extends('welcome')
@section('content')
<div class="max-w-2xl mx-auto mt-20 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-6">Загруженные файлы:</h1>
    <ul>
        @foreach ($files as $file)
            <li>
                @php
                    $path = Storage::url('/' . basename($file));
                @endphp

                @if (Str::contains(mime_content_type(storage_path('app/public/' . $file)), 'image'))
                    <div class="p-4 bg-white shadow-md rounded-lg border border-gray-200">
                        <img src="{{ $path }}" alt="Изображение" width="100" class="rounded-lg">

                        <div class="mt-2 flex justify-between items-center">
                            <a href="{{ $path }}" download class="text-blue-500 hover:text-blue-700">Скачать</a>

                            <form action="/files" method="POST">
                                @csrf
                                <input type="hidden" name="filename" value="{{ basename($file) }}">
                                <input type="hidden" name="path" value="{{ $file }}">
                                <button type="submit" class="text-red-500 hover:text-red-700">Удалить</button>
                            </form>
                        </div>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection