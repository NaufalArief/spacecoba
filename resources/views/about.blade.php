<x-app-layout>

    <header class="header">
        <h1>Software Engineering Until Die</h1>
        <p>From hello world to goodbye world</p>
    </header>

    <div class="gallery">
        {{-- Lakukan perulangan untuk setiap post dari database --}}
        @forelse ($posts as $post)
            {{-- Tampilkan hanya jika post memiliki gambar --}}
            @if ($post->image_path)
                <div class="gallery-item" onclick="openModal('{{ asset('storage/' . $post->image_path) }}')">

                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">

                    <div class="gallery-overlay">{{ $post->title }}</div>

                </div>
            @endif
        @empty
            {{-- Pesan ini akan tampil jika tidak ada postingan di database --}}
            <p class="text-white col-span-full text-center py-10">No posts found to display in the gallery.</p>
        @endforelse
    </div>

</x-app-layout>
