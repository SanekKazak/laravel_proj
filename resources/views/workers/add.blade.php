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

        <button type="submit" class="w-full border border-gray-500 rounded-lg p-4 mt-4 bg-blue-500">
            Добавить
        </button>
    </form>
    <a href="http://localhost:8000/auto_test_add"  class="w-full border border-gray-500 rounded-lg p-20 mt-20 bg-blue-500">
            Добавить тестовые значения
    </a>
</div>
@endsection