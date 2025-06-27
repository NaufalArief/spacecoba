    @extends('admin.layouts.app')

    @section('content')
        <h1 class="text-3xl font-bold mb-6">Edit Member: {{ $member->nama }}</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.members.update', $member) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="npm" class="block text-gray-700 text-sm font-bold mb-2">NPM:</label>
                <input type="text" name="npm" id="npm"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-gray-200 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ $member->npm }}" disabled>
                <p class="text-xs text-gray-600 mt-1">NPM cannot be changed.</p>
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                <input type="text" name="nama" id="nama"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('nama', $member->nama) }}" required>
            </div>

            <div class="mb-4">
                <label for="quotes" class="block text-gray-700 text-sm font-bold mb-2">Quotes:</label>
                <textarea name="quotes" id="quotes" rows="3"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('quotes', $member->quotes) }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Current Photo Profile:</label>
                @if ($member->photo)
                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->nama }}"
                        class="w-32 h-32 object-cover rounded-lg mb-2">
                @else
                    <p class="text-gray-500">No photo uploaded.</p>
                @endif
                <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Upload New Photo
                    (optional):</label>
                <input type="file" name="photo" id="photo"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Current QR Code:</label>
                @if ($member->qr)
                    <img src="{{ asset('storage/' . $member->qr) }}" alt="QR Code"
                        class="w-32 h-32 object-cover rounded-lg mb-2">
                @else
                    <p class="text-gray-500">No QR code uploaded.</p>
                @endif
                <label for="qr" class="block text-gray-700 text-sm font-bold mb-2">Upload New QR Code
                    (optional):</label>
                <input type="file" name="qr" id="qr"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                <input type="text" name="role" id="role"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('role', $member->role) }}" required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Member
                </button>
                <a href="{{ route('admin.members.index') }}"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>
    @endsection
