@extends('admin.layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-700">Total Users</h2>
            {{-- Ganti dengan data dinamis nantinya --}}
            <p class="text-3xl font-bold mt-2">150</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-700">Total Posts</h2>
            {{-- Ganti dengan data dinamis nantinya --}}
            <p class="text-3xl font-bold mt-2">25</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-700">Server Status</h2>
            <p class="text-3xl font-bold mt-2 flex items-center">
                <span class="w-4 h-4 rounded-full bg-green-500 mr-2"></span>
                Online
            </p>
        </div>
    </div>

    <div class="mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Recent Activity</h2>
        <p>Welcome to your new admin panel. From here, you can manage all aspects of your site's content and users.</p>
    </div>
@endsection
