<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('/output.css') }}" rel="stylesheet" />
    <link href="{{ asset('/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('/about.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <style>
        /* Tambahkan CSS untuk toggle menu */
        .menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
            cursor: pointer;
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .menu-toggle div {
            width: 100%;
            height: 3px;
            background-color: #333;
            margin: 4px 0;
            transition: 0.3s;
        }

        .menu {
            display: flex;
            flex-direction: row;
        }

        @media screen and (max-width: 768px) {
            .menu {
                display: none;
                flex-direction: column;
                width: 100%;
                position: absolute;
                top: 60px;
                left: 0;
                background-color: white;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .menu.active {
                display: flex;
            }

            .menu-toggle {
                display: flex;
            }

            .nav-links {
                flex-direction: column;
                text-align: center;
            }

            .nav-links a {
                margin: 10px 0;
            }
        }

        /* Formulir Lapor Bullying */
        .report-form {
            background-color: #fff;
            padding: 40px;
            max-width: 800px;
            margin: 40px auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .report-form h2 {
            margin-bottom: 20px;
            color: #2F59A7;
        }

        .report-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        .report-form input,
        .report-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #E8EBF4;
            border-radius: 5px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
        }

        .report-form input:focus,
        .report-form textarea:focus {
            border-color: #FF6B18;
            outline: none;
            box-shadow: 0 0 5px rgba(255, 107, 24, 0.5);
        }

        .report-form button {
            background-color: #FF6B18;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .report-form button:hover {
            background-color: #e65c14;
        }
    </style>
</head>

<body class="font-[Poppins] pb-[83px]">
    <nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center mt-[30px] relative">
        <div class="logo-container flex gap-[30px] items-center">
            <a href="{{ route('front.index') }}" class="flex shrink-0">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="logo" />
            </a>
            <div class="h-12 border border-[#E8EBF4]"></div>
        </div>

        <!-- Menu Toggle Button -->
        <div class="menu-toggle" id="menu-toggle">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <!-- Navigation Links -->
        <div class="menu nav-links">
            <a href="#" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Upgrade
                Pro</a>
            <a href="{{ route('front.about') }}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">About
                Us</a>
                <a href="{{route('front.report')}}"
                class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0B2F9F]">Lapor
                Bullying</a>
            <a href="#"
                class="rounded-full p-[12px_22px] flex gap-[10px] font-bold transition-all duration-300 bg-[#FF6B18] text-white hover:shadow-[0_10px_20px_0_#FF6B1880]">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/whatsapp.svg') }}" alt="icon" />
                </div>
                <span>Konsultasi</span>
            </a>
        </div>
    </nav>

    <!-- Formulir Lapor Bullying -->
    <div class="report-form">
        @session('success')
            <div style="background-color: green; margin-bottom:2rem; padding:1rem 2rem;">
            <p style="color: white">{{session('success')}}</p>
            </div>
        @endsession
        @if($errors->any())
        <div style="color: red; margin-bottom:2rem;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h2>Laporkan Insiden Bullying</h2>
        <form action="{{ route('front.submit_report') }}" method="POST">
            @csrf <!-- Laravel CSRF Token -->
            <label for="name">Nama Anda (Opsional):</label>
            <input type="text" id="name" name="name" placeholder="John Doe">

            <label for="email">Email Anda (Opsional):</label>
            <input type="email" id="email" name="email" placeholder="john.doe@example.com">

            <label for="incident">Deskripsi Insiden:</label>
            <textarea id="incident" name="incident" rows="6" placeholder="Jelaskan insiden bullying yang Anda alami atau saksikan..." required></textarea>

            <label for="location">Lokasi Insiden:</label>
            <input type="text" id="location" name="location" placeholder="Sekolah, Tempat Kerja, dll." required>

            <label for="date">Tanggal Insiden:</label>
            <input type="date" id="date" name="date" required>

            <label for="anonymous" style="display: flex; align-items:center;">
                <input type="checkbox" value="1" id="anonymous" name="anonymous" style="height: 1rem; width:1rem; margin-right:1rem;">
                <label for="anonymous">Laporkan Secara Anonim</label>
                
            </label>

            <button type="submit">Kirim Laporan</button>
        </form>
    </div>

    <!-- Footer -->
    {{-- <footer class="bg-[#2F59A7] text-white py-6">
        <div class="max-w-[1130px] mx-auto text-center">
            <p>&copy; 2024 LawanBullying. All Rights Reserved.</p>
        </div>
    </footer> --}}

    <!-- JavaScript untuk toggle menu -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.querySelector('.menu');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('active');
        });
    </script>

    <script src="assets/js/script.js"></script>
</body>

</html>
