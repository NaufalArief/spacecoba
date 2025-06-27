<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Space Tech 24') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #0a0e27 0%, #1a1a2e 50%, #16213e 100%);
            color: white;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animated stars background */
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .stars::before,
        .stars::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(2px 2px at 20px 30px, #eee, transparent),
                radial-gradient(2px 2px at 40px 70px, rgba(255, 255, 255, 0.8), transparent),
                radial-gradient(1px 1px at 90px 40px, #fff, transparent),
                radial-gradient(1px 1px at 130px 80px, rgba(255, 255, 255, 0.6), transparent),
                radial-gradient(2px 2px at 160px 30px, #ddd, transparent);
            background-repeat: repeat;
            background-size: 200px 100px;
            animation: sparkle 20s linear infinite;
        }

        .stars::after {
            background-image:
                radial-gradient(1px 1px at 40px 60px, #fff, transparent),
                radial-gradient(1px 1px at 80px 10px, rgba(255, 255, 255, 0.9), transparent),
                radial-gradient(2px 2px at 120px 50px, #eee, transparent);
            background-size: 180px 120px;
            animation: sparkle 25s linear infinite reverse;
        }

        @keyframes sparkle {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-200px);
            }
        }


        .container {
            display: flex;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: rgba(26, 26, 46, 0.8);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 3rem;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .logo-icon img.logo-img {
            height: 100%;
            object-fit: contain;
        }


        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #ffffff 0%, #fbfbfb 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-link:hover {
            background: linear-gradient(45deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
            color: white;
            transform: translateX(5px);
        }

        .nav-link.active {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
        }

        .nav-icon {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        /* Main content */
        .main-content {
            flex: 1;
            padding: 2rem;
            background: rgba(10, 14, 39, 0.3);
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            padding: 3rem;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .header h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header p {
            font-size: 1.2rem;
            opacity: 0.8;
            font-style: italic;
        }

        /* Gallery */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, 300px);
            gap: 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
            justify-content: center;
        }

        .gallery-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: 300px;
            height: 300px;
        }

        .gallery-item:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
        }

        .gallery-item img {
            width: 300px;
            height: 300px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.8), rgba(118, 75, 162, 0.8));
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        /* Special grid layouts */
        .gallery-item:nth-child(4) {
            grid-row: span 1;
            width: 300px;
            height: 300px;
        }

        .gallery-item:nth-child(4) img {
            height: 300px;
        }

        .gallery-item:nth-child(6),
        .gallery-item:nth-child(7) {
            height: 300px;
            width: 300px;
        }

        .gallery-item:nth-child(6) img,
        .gallery-item:nth-child(7) img {
            height: 300px;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(10px);
        }

        .modal-content {
            position: relative;
            margin: 5% auto;
            max-width: 80%;
            max-height: 80%;
        }

        .modal-content img {
            width: 100%;
            height: auto;
            border-radius: 15px;
        }

        .close {
            position: absolute;
            top: -40px;
            right: 0;
            color: white;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.2);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 1rem;
            }

            .gallery {
                grid-template-columns: 1fr;
            }

            .gallery-item {
                grid-row: span 1 !important;
                height: 300px !important;
                width: 300px !important;
                margin: 0 auto;
            }

            .gallery-item img {
                height: 300px !important;
                width: 300px !important;
            }

            .header h1 {
                font-size: 2rem;
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #0a0e27 0%, #1a1f3a 50%, #0f1419 100%);
            color: white;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animated Stars Background */
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .stars::before,
        .stars::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(2px 2px at 20px 30px, #eee, transparent),
                radial-gradient(2px 2px at 40px 70px, rgba(255, 255, 255, 0.8), transparent),
                radial-gradient(1px 1px at 90px 40px, #fff, transparent),
                radial-gradient(1px 1px at 130px 80px, rgba(255, 255, 255, 0.6), transparent),
                radial-gradient(2px 2px at 160px 30px, #ddd, transparent);
            background-repeat: repeat;
            background-size: 200px 100px;
            animation: sparkle 20s linear infinite;
        }

        .stars::after {
            background-image:
                radial-gradient(1px 1px at 40px 60px, #fff, transparent),
                radial-gradient(1px 1px at 80px 10px, rgba(255, 255, 255, 0.9), transparent),
                radial-gradient(2px 2px at 120px 50px, #eee, transparent);
            background-size: 180px 120px;
            animation: sparkle 25s linear infinite reverse;
        }

        @keyframes sparkle {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-200px);
            }
        }

        .container {
            display: flex;
            min-height: 100vh;
            position: relative;
            z-index: 2;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: rgba(20, 25, 45, 0.95);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem 1rem;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 3rem;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .logo-icon img.logo-img {
            height: 100%;
            object-fit: contain;
        }


        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #ffffff 0%, #fbfbfb 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-link:hover {
            background: linear-gradient(45deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
            color: white;
            transform: translateX(5px);
        }

        .nav-link.active {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
        }

        .nav-icon {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .page-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
        }

        /* Members Grid */
        .members-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            max-width: 1400px;
        }

        .member-card {
            position: relative;
            aspect-ratio: 1;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .member-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
            border-color: rgba(102, 126, 234, 0.5);
        }

        .member-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .member-card:hover .member-photo {
            transform: scale(1.1);
        }

        .member-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            padding: 1.5rem 1rem 1rem;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .member-card:hover .member-overlay {
            opacity: 1;
        }

        .member-name {
            font-weight: bold;
            margin-bottom: 0.25rem;
        }

        .member-role {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .empty-slot {
            background: rgba(255, 255, 255, 0.03);
            border: 2px dashed rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.4);
            font-size: 2rem;
        }

        .empty-slot:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(102, 126, 234, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 1rem 0.5rem;
            }

            .logo span,
            .nav-link span {
                display: none;
            }

            .main-content {
                margin-left: 70px;
                padding: 1rem;
            }

            .page-title {
                font-size: 2rem;
            }

            .members-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 1rem;
            }
        }
    </style>
</head>

<body class="font-sans antialiased">
    {{-- Latar belakang bintang dari CSS Anda akan berlaku di sini --}}
    <div class="stars"></div>

    <div class="container">
        {{-- File ini berisi semua logika untuk menampilkan link di sidebar --}}
        <nav class="sidebar">
            <div class="logo">
                <span>SPACE</span>
                <div class="logo-icon">
                    <img src="{{ asset('assets/img/remove bg.png') }}" alt="Logo" class="logo-img" />
                </div>
            </div>

            <ul class="nav-menu">
                {{-- Kondisi: Tampilkan link ini HANYA jika pengguna sudah login --}}

                <li class="nav-item">
                    <a href="about" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
                        </svg>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('members') }}"
                        class="nav-link {{ request()->routeIs('members') ? 'active' : '' }}">
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path
                                d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A2.51 2.51 0 0 0 17.56 7c-.61 0-1.18.23-1.61.61L12 11.5 8.05 7.61C7.62 7.23 7.05 7 6.44 7c-1.09 0-2.05.67-2.4 1.63L1.5 16H4v6h2v-6h2.5l1.5-4.5L12 14l2-2.5L15.5 16H18v6h2z" />
                        </svg>
                        <span>Members</span>
                    </a>
                </li>

                {{-- Kondisi: Tampilkan link ini HANYA jika pengguna adalah tamu (belum login) --}}
                {{-- @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span>Log In</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}"
                            class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}">
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                </path>
                            </svg>
                            <span>Register</span>
                        </a>
                    </li>
                @endguest --}}

                {{-- Link eksternal yang akan selalu tampil --}}
                <li class="nav-item">
                    <a href="https://www.instagram.com/space.tec24?igsh=MW83OGNja3dweHhjMw==" class="nav-link"
                        target="_blank" rel="noopener noreferrer">
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path
                                d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z" />
                        </svg>
                        <span>Instagram</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://www.tiktok.com/@space.tec24?_t=ZS-8weuykDPj0M&_r=1" class="nav-link instagram-link"
                        target="_blank" rel="noopener noreferrer">
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path
                                d="M12.53.02C13.84 0 15.14.01 16.44 0c.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                        </svg>
                        <span>TikTok</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://youtube.com/@space.tec24?si=J79mJn0QKMsmMZ3e" class="nav-link youtube-link"
                        target="_blank" rel="noopener noreferrer">
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path
                                d="M23.498 6.186a2.95 2.95 0 00-2.078-2.08C19.538 3.6 12 3.6 12 3.6s-7.538 0-9.42.507a2.95 2.95 0 00-2.08 2.08A30.14 30.14 0 000 12a30.14 30.14 0 00.5 5.814 2.95 2.95 0 002.08 2.08c1.882.506 9.42.506 9.42.506s7.538 0 9.42-.506a2.95 2.95 0 002.08-2.08A30.14 30.14 0 0024 12a30.14 30.14 0 00-.502-5.814zM9.6 15.6V8.4L15.6 12l-6 3.6z" />
                        </svg>
                        <span>YouTube</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://open.spotify.com/playlist/3vywmKRR0aHgPqVhIijXwB?si=IbRFt077RZmTPUfaIQmtFg&pi=ghlvEfOzQY--w"
                        class="nav-link instagram-link" target="_blank" rel="noopener noreferrer">
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path
                                d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.559.3z" />
                        </svg>
                        <span>Spotify</span>
                    </a>
                </li>

            </ul>

            {{-- Tombol Logout hanya akan muncul untuk pengguna yang sudah login --}}
            {{-- @auth
                <div class="nav-item mt-auto p-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="nav-link text-red-400 hover:text-red-200">
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span>Log Out</span>
                        </a>
                    </form>
                </div>
            @endauth --}}
        </nav>


        <!-- Page Content -->
        <main class="main-content">
            {{-- DI SINI KONTEN UNIK SETIAP HALAMAN AKAN DITAMPILKAN --}}
            {{ $slot }}
        </main>
    </div>

    {{-- Modal (jika diperlukan di semua halaman) --}}
    <div id="imageModal" class="modal" onclick="closeModal()">
        <img class="modal-content" id="modalImage" />
    </div>
    <script>
        function openModal(imageUrl) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            modal.style.display = 'block';
            modalImg.src = imageUrl;
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            if (modal) {
                modal.style.display = 'none';
                const modalImg = document.getElementById('modalImage');
                modalImg.src = '';
            }
        }

        window.onclick = function(event) {
            const modal = document.getElementById('imageModal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
</body>

</html>
