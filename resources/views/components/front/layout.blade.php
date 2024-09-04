<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('/output.css') }}" rel="stylesheet" />
    <link href="{{ asset('/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('/about.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <style>
        /* responsive */
        @media screen and (max-width: 1100px) {
            .authors-section {
                display: block;
            }

            #Category {
                overflow-x: auto;
                justify-content: flex-start;
                margin-left: 0.5rem;
            }
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #FF6B18;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 30vh;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

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

        .nav-links a {
            margin: 0 10px;
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
                margin-top: 1rem;
            }

            .nav-links a {
                margin: 10px 0;
            }

            .modal-content {
                width: 90%;
            }

            #waModal {
                padding-top: 5vh;
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
        <div class="menu nav-links" style="z-index: 1;">
            <a href="/" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Home</a>
            <a href="/about" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">About
                Us</a>
            <a href="{{ route('front.report') }}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Lapor
                Bullying</a>
            <a href="#" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Donate</a>
            <button id="waModalBtn" class="rounded-full p-[12px_22px] flex gap-[10px] font-bold transition-all duration-300 bg-[#FF6B18] text-white hover:shadow-[0_10px_20px_0_#FF6B1880]">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/whatsapp.svg') }}" alt="icon" />
                </div>
                <span>Konsultasi</span>
            </button>
        </div>
    </nav>

    <!-- The Modal -->
    <div id="waModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h5 style="margin-bottom: 1rem;">Kontak Konselor</h5>
            <hr>

            <div style="margin: 1rem;">
                <div style="display: flex; justify-content:space-between; align-items: center; margin-bottom: 2rem;">
                    <div style="width: 10%;">
                        <img src="https://picsum.photos/200" alt="" style="border-radius: 50%; width: 100%;">
                    </div>
                    <div style="width: 70%">
                        <p>Aldi Mahardiansya</p>
                        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum expedita cumque dolores possimus voluptates illum similique odio illo eaque molestias voluptatum inventore, soluta ut voluptas tempore impedit repellendus, saepe magni.</small>
                    </div>

                    <div style="width: 18%;">
                        <a href="https:wa.me/622345678867" target="_blank" class="btn">Chat</a>
                    </div>
                </div>
                <hr>

                <div style="display: flex; justify-content:space-between; align-items: center; margin-bottom: 2rem;">
                    <div style="width: 10%;">
                        <img src="https://picsum.photos/200" alt="" style="border-radius: 50%; width: 100%;">
                    </div>
                    <div style="width: 70%">
                        <p>Aldi Mahardiansya</p>
                        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum expedita cumque dolores possimus voluptates illum similique odio illo eaque molestias voluptatum inventore, soluta ut voluptas tempore impedit repellendus, saepe magni.</small>
                    </div>

                    <div style="width: 18%;">
                        <a href="https:wa.me/622345678867" target="_blank" class="btn">Chat</a>
                    </div>
                </div>
                <hr>
            </div>
        </div>

    </div>

    {{ $slot }}

    <!-- JavaScript untuk toggle menu -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.querySelector('.menu');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('active');
        });

        // Get the modal
        var modal = document.getElementById("waModal");

        // Get the button that opens the modal
        var btn = document.getElementById("waModalBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script src="/assets/js/script.js"></script>
</body>

</html>
