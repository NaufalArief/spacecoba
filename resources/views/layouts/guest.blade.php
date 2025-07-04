<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    {{-- Latar Belakang --}}
    <div class="stars"></div>


    {{-- Container utama yang menyatukan sidebar dan konten --}}
    <div class="container">


        {{-- Konten utama untuk halaman tamu --}}
        <main class="main-content">
            {{-- Slot ini akan diisi oleh konten dari welcome.blade.php, login.blade.php, dll. --}}
            {{-- Div ini membantu konten (seperti form) berada di tengah. --}}
            <div class="w-full h-full flex items-center justify-center p-4">
                {{ $slot }}
            </div>
        </main>

    </div>
</body>

</html>
