
@extends('welcome')
@section('content')
<div class="max-w-2xl mx-auto mt-20 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-6">Загруженные файлы:</h1>
    <form action="/upload" method="post" enctype="multipart/form-data" class="border border-gray-500 font-bold py-2 px-4 rounded-lg">
        @csrf
        <input type="file" name="file" class="border border-gray-500 font-bold py-2 px-4 rounded-lg">
        <button type="submit" class="w-full bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600">Загрузить</button>
    </form>
</div>
@endsection