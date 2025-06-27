<x-app-layout>
    <div class="page-header">
        <h1 class="page-title">The Faces Behind SPACE TEC '24</h1>
    </div>

    <div class="members-grid">
        {{-- PERBAIKAN: Menambahkan loop @forelse untuk menampilkan semua anggota --}}
        @forelse ($members as $member)
            {{-- Setiap kartu sekarang menjadi link ke halaman detail anggota --}}
            <a href="{{ route('members.show', $member) }}" class="member-card">

                {{-- Menampilkan foto dari path yang tersimpan di database --}}
                {{-- Jika tidak ada foto, gunakan placeholder dari ui-avatars.com --}}
                <img src="{{ $member->photo ? asset('storage/' . $member->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($member->nama) . '&background=282c34&color=fff' }}"
                    alt="Foto {{ $member->nama }}" class="member-photo">

                <div class="member-overlay">
                    <div class="member-name">{{ $member->nama }}</div>
                    <div class="member-role">View Profile</div>
                </div>
            </a>
        @empty
            {{-- Pesan ini akan tampil jika tidak ada data member di database --}}
            <p class="text-white col-span-full text-center py-10">No members found.</p>
        @endforelse
    </div>
</x-app-layout>
