<x-app-layout>
    {{-- Semua kode di bawah ini akan dimasukkan ke dalam variabel $slot di app.blade.php --}}

    <header class="header">
        <h1>Software Engineering Until Die</h1>
        <p>From hello world to goodbye world</p>
    </header>

    <div class="gallery">
        {{-- Gunakan helper asset untuk setiap gambar --}}
        <div class="gallery-item" onclick="openModal('{{ asset('assets/img/dashboard/img4.jpg') }}')">
            <img src="{{ asset('assets/img/dashboard/img4.jpg') }}" alt="Team Meeting 1">
            <div class="gallery-overlay">Space Tec '24</div>
        </div>

        <div class="gallery-item" onclick="openModal('{{ asset('assets/img/dashboard/img5.JPG') }}')">
            <img src="{{ asset('assets/img/dashboard/img5.JPG') }}" alt="Campus Event">
            <div class="gallery-overlay">Space Tec '24</div>
        </div>

        <div class="gallery-item" onclick="openModal('{{ asset('assets/img/dashboard/img6.png') }}')">
            <img src="{{ asset('assets/img/dashboard/img6.png') }}" alt="Team Meeting 2">
            <div class="gallery-overlay">Space Tec '24</div>
        </div>

        <div class="gallery-item" onclick="openModal('{{ asset('assets/img/dashboard/img2.jpeg') }}')">
            <img src="{{ asset('assets/img/dashboard/img2.jpeg') }}" alt="Study Group">
            <div class="gallery-overlay">Space Tec '24</div>
        </div>

        <div class="gallery-item" onclick="openModal('{{ asset('assets/img/dashboard/img1.jpeg') }}')">
            <img src="{{ asset('assets/img/dashboard/img1.jpeg') }}" alt="Outdoor Activity">
            <div class="gallery-overlay">Space Tec '24</div>
        </div>

        <div class="gallery-item" onclick="openModal('{{ asset('assets/img/dashboard/img3.jpeg') }}')">
            <img src="{{ asset('assets/img/dashboard/img3.jpeg') }}" alt="Friends Selfie 1">
            <div class="gallery-overlay">Space Tec '24</div>
        </div>
    </div>
</x-app-layout>
