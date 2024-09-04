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
            <a href="#"
                class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Upgrade
                Pro</a>
            <a href="#"
                class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">About
                Us</a>
            <a href="#"
                class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Lapor
                Bullying</a>
            <a href="#"
                class="rounded-full p-[12px_22px] flex gap-[10px] font-bold transition-all duration-300 bg-[#FF6B18] text-white hover:shadow-[0_10px_20px_0_#FF6B1880]">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/favorite-chart.svg') }}" alt="icon" />
                </div>
                <span>Konsultasi</span>
            </a>
        </div>
    </nav>

    <!-- Konten lainnya -->
    <div class="max-w-[1130px] mx-auto mt-8">
        <!-- Your content here -->
        <div class="LawanBullying"><img src="{{ asset('assets/images/photos/bg.png') }}"></div>

    </div>
    <div class="container">
        <div class="container-left">
            <div class="text">
                <h1 style="color: #2F59A7;">About Us</h1>
                <p><span style="color: #2F59A7;">Lawan</span><span style="color:  darkorange">Bullying</span> adalah
                    platform website anti bullying yang diluncurkan
                    oleh team SMK Al HAfidz <br>pada tahun 2024 yang memiliki tujuan untuk memberikan sebuah edukasi dan
                    informasi seputar permasalahan
                    bullying,
                    <br>serta memberikan wadah bagi korban,
                    pelaku, dan orang tua untuk saling berbagi dan mendapatkan dukungan.


                    <span style="color: #2F59A7;">Lawan</span><span style="color:  darkorange">Bullying</span>
                    diharapkan dapat memberikan informasi dan edukasi
                    kepada masyarakat, serta membantu korban bullying untuk mendapatkan dukungan.
                </p>

                </p>
            </div>
        </div>

        <div class="container-right">
            <img class="container" src="{{asset('assets/images/photos/photo.png')}}" width="450px" height="500px">
        </div>
    </div>
    <div class="vid">

    </div>

    </div>
    <div class="team-container">
        <div class="text1">
            <h2 class="text-dark">Our <span class="text-blue">Team</span></h2>
            <div class="horizontal-line"></div>
            <!--<p class="text-dark"> Tim profesional kami akan senang hati membantu anda.
            </p>-->
        </div>

        <div class="card-group">
            <div class="card">
                <div class="card-img">
                    <img src="{{ asset('assets/images/photos/rizki.jpg') }}" width="100px" height="200px">
                </div>

                <div class="card-body">
                    <h3 class="text-dark">Rizki Andika</h3>
                    <p class="team-position">Developer</p>
                </div>

                <div class="card-socmed">
                    <a href="https://www.instagram.com/rizkiandika_747?igsh=MThzYjdxZWg2Nzkxbw==">
                        <i class="fab fa-instagram"></i>
                    </a>


                </div>
            </div>


            <div class="card">
                <div class="card-img">
                    <img src="{{ asset('assets/images/photos/dendy.jpg') }}" width="150px" height="200px">
                </div>

                <div class="card-body">
                    <h3 class="text-dark">Dendy</h3>
                    <p class="team-position">Developer</p>
                </div>

                <div class="card-socmed">
                    <a href="https://www.instagram.com/_dndy1/">
                        <i class="fab fa-instagram"></i>
                    </a>


                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container-left">
            <div class="text">
                <h1 style="color: #2F59A7;">Latar Belakang</h1>
                <p>Bullying adalah masalah serius yang dapat berdampak negatif pada korban, <br>baik secara fisik maupun
                    emosional.
                    Bullying dapat menyebabkan korban merasa tterisolasi, ketakutan, dan bahkan depresi.
                    <br>Dalam kasus yang parah, bullying dapat menyebabkan korban bunuh diri.
                    Menurut data dari Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi, sebanyak 16,5% pelajar
                    di Indonesia pernah menjadi korban bullying.
                    Oleh sebab itu kami mendirikan <br><span style="color: #2F59A7;">Lawan</span><span
                        style="color:  darkorange">Bullying</span>
                    untuk meminimalisir permasalahan bullying yang ada, serta membuat suatu wadah bagi korban, pelaku,
                    hingga orang tua, yang mengalami bullying
                </p>

                </p>
            </div>
        </div>

        <div class="container-right">
            <img class="container" src="{{ asset('assets/images/photos/lawanbullying.png') }}" width="800px"
                height="400px">
        </div>
    </div>
    <div class="vid">

    </div>

    </div>

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
