<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proetawa Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@2.0.16/dist/heroicons.min.js"></script>
    <!-- SwiperJS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .nav-link {
            position: relative;
            font-weight: 500;
            color: white;
            padding-bottom: 4px;
            transition: color 0.3s ease-in-out;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -2px;
            height: 2px;
            width: 0;
            background-color: white;
            transition: width 0.4s ease-in-out;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link {
            position: relative;
            font-weight: 500;
            color: white;
            padding-bottom: 4px;
            transition: color 0.3s ease-in-out;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -2px;
            height: 2px;
            width: 0;
            background-color: white;
            transition: width 0.4s ease-in-out;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link:not(:hover)::after {
            transition: width 0.3s ease-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.95);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }
    </style>


</head>

<body class="bg-white text-gray-800">

    <!-- Navbar -->
    <header id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300">
        <div class="max-w-6xl mx-auto px-6 py-6 flex justify-center items-center">
            <nav
                class="flex flex-wrap justify-center gap-x-6 sm:gap-x-10 md:gap-x-16 lg:gap-x-24 xl:gap-x-32 text-white text-sm sm:text-base">
                <a href="#home" class="nav-link">About us</a>
                <a href="#benefit" class="nav-link">Manfaat</a>
                <a href="#certificates" class="nav-link">Sertifikat</a>
                <a href="#testimoni" class="nav-link">Testimoni</a>
            </nav>
        </div>
    </header>


    <!-- JUMBOTRON -->
    <section class="relative min-h-[90vh] md:h-screen bg-cover bg-center bg-fixed pt-[160px] md:pt-[20px]"
        style="background-image: url('{{ asset('img/hompej/WhatsApp Image 2025-07-07 at 15.00.12.jpeg') }}');">

        <!-- Overlay hitam agar background tidak terlalu terang -->
        <div class="absolute inset-0 bg-green-900 bg-opacity-30"></div>

        <div class="relative z-10 flex items-center justify-center h-full px-4 sm:px-6">
            <div
                class="backdrop-blur-md bg-white/30 rounded-xl shadow-2xl shadow-green-900/40 w-full max-w-4xl px-6 sm:px-10 md:px-16 py-10 md:py-12 text-center">
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('img/LOGO PROETAWA.webp') }}" alt="Logo"
                        class="w-40 sm:w-52 md:w-64 lg:w-[450px] h-auto">
                </div>
                <p class="text-base sm:text-lg md:text-xl text-green-900 mb-6">
                    Proetawa adalah susu kambing etawa rasa gula aren, kaya manfaat untuk menjaga daya tahan dan
                    kesehatan tubuh.
                </p>

                <!-- Tombol Aksi -->
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <!-- Contact -->
                    <button onclick="toggleModal('modalContact')"
                        class="flex items-center justify-center gap-2 bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 shadow-md hover:shadow-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.586a1 1 0 01.707.293l2.414 2.414a1 1 0 010 1.414L9.414 9.586a16.016 16.016 0 006 6l2.293-2.293a1 1 0 011.414 0l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2h-1C8.268 21 3 15.732 3 9V5z" />
                        </svg>
                        Contact
                    </button>

                    <!-- Shop -->
                    <button onclick="toggleModal('modalShop')"
                        class="flex items-center justify-center gap-2 bg-green-100 border border-green-600 text-green-800 px-6 py-3 rounded-lg hover:bg-green-200 shadow-md hover:shadow-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 11h14l-1 10H6L5 11z" />
                        </svg>
                        Shop
                    </button>
                </div>
            </div>
        </div>
    </section>


    <!-- MODAL CONTACT -->
    <div id="modalContact"
        class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-8 w-full max-w-md shadow-lg relative animate-fadeIn">
            <button onclick="toggleModal('modalContact')"
                class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
            <h3 class="text-xl font-semibold mb-4">Hubungi Kami</h3>
            <p class="text-gray-600 text-sm mb-4">Silakan hubungi kami melalui WhatsApp atau email untuk pertanyaan
                lebih lanjut.</p>
            @foreach ($contacts as $contact)
                <a href="{{ $contact->link }}" target="_blank"
                    class="block bg-green-600 text-white px-4 py-2 mb-2 rounded hover:bg-green-700 transition">
                    {{ $contact->nama }}
                </a>
            @endforeach

        </div>
    </div>

    <!-- MODAL SHOP -->
    <div id="modalShop"
        class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-8 w-full max-w-md shadow-lg relative animate-fadeIn">
            <button onclick="toggleModal('modalShop')"
                class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
            <h3 class="text-xl font-semibold mb-4">Belanja Produk</h3>
            <p class="text-gray-600 text-sm mb-4">Kunjungi toko online kami untuk pembelian produk alami terbaik.</p>
            @foreach ($shops as $shop)
                <a href="{{ $shop->link }}" target="_blank"
                    class="block bg-green-600 text-white px-4 py-2 mb-2 rounded hover:bg-green-700 transition">
                    {{ $shop->nama }}
                </a>
            @endforeach

        </div>
    </div>

    <!-- Tentang Produk -->
    <section id="home" class="py-32 mt-20 px-6 bg-white">
        <div class="max-w-6xl mx-auto text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-green-800">Tentang Produk Kami</h2>
            <p class="text-gray-600 text-base md:text-lg max-w-3xl mx-auto">
                Produk Proetawa dibuat dari 100% bahan alami pilihan yang telah teruji klinis, diformulasikan untuk
                mendukung gaya hidup sehat masyarakat Indonesia.
                Kami berkomitmen pada kualitas, keamanan, dan keberlanjutan, menghadirkan solusi alami yang dapat
                diandalkan untuk kesehatan jangka panjang.
            </p>
        </div>

        <!-- Gallery Grid -->
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 gap-4 px-2 md:px-0">
            <!-- Foto besar kiri -->
            <div class="md:col-span-3 sm:col-span-2 col-span-1 row-span-2">
                <img src="{{ asset('img/hompej/samarkan.jpeg') }}" alt="Produk 1"
                    class="rounded-lg w-full h-full max-h-[400px] object-cover shadow-lg">
            </div>

            <!-- Foto kanan atas -->
            <div class="md:col-span-2 sm:col-span-1 col-span-1">
                <img src="{{ asset('img/hompej/WhatsApp Image 2025-07-07 at 15.38.22.jpeg') }}" alt="Produk 2"
                    class="rounded-lg w-full h-52 object-cover shadow-md">
            </div>

            <!-- Foto kanan tengah -->
            <div class="md:col-span-1 sm:col-span-1 col-span-1">
                <img src="{{ asset('img/hompej/turki.jpg') }}" alt="Produk 3"
                    class="rounded-lg w-full h-52 object-cover shadow-md">
            </div>

            <!-- Foto kanan bawah -->
            <div class="md:col-span-3 sm:col-span-2 col-span-1">
                <img src="{{ asset('img/hompej/WhatsApp Image 2025-07-07 at 15.44.06.jpeg') }}" alt="Produk 4"
                    class="rounded-lg w-full h-60 object-cover shadow-md">
            </div>
        </div>
    </section>

    <!-- Manfaat -->
    <section id="benefit" class="bg-green-50 py-32 mt-30 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-10">Manfaat Produk</h2>

            <!-- Baris 1: 3 item -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mb-8">
                <!-- Item 1 -->
                <div class="text-center">
                    <div class="text-green-600 text-5xl mb-4">🦴</div>
                    <h4 class="font-semibold text-lg mb-2">Atasi Nyeri Sendi & Rematik</h4>
                    <p class="text-gray-600">Membantu meredakan peradangan dan keluhan sendi atau rematik.</p>
                </div>
                <!-- Item 2 -->
                <div class="text-center">
                    <div class="text-green-600 text-5xl mb-4">🩸</div>
                    <h4 class="font-semibold text-lg mb-2">Membantu Penderita Diabetes</h4>
                    <p class="text-gray-600">Menstabilkan kadar gula darah secara alami dan aman.</p>
                </div>
                <!-- Item 3 -->
                <div class="text-center">
                    <div class="text-green-600 text-5xl mb-4">🌬️</div>
                    <h4 class="font-semibold text-lg mb-2">Meringankan TBC, Asma & Bronkhitis</h4>
                    <p class="text-gray-600">Membantu pernapasan lebih lega dan sehat.</p>
                </div>
            </div>

            <!-- Baris 2: 2 item ditengah -->
            <div class="flex flex-col sm:flex-row justify-center gap-8 mt-[50px]">
                <!-- Item 4 -->
                <div class="text-center w-full sm:w-1/2 md:w-1/4">
                    <div class="text-green-600 text-5xl mb-4">🥛</div>
                    <h4 class="font-semibold text-lg mb-2">Meredakan Maag & Asam Lambung</h4>
                    <p class="text-gray-600">Menenangkan perut dan mengurangi rasa perih berlebih.</p>
                </div>

                <!-- Item 5 -->
                <div class="text-center w-full sm:w-1/2 md:w-1/4">
                    <div class="text-green-600 text-5xl mb-4">🧠</div>
                    <h4 class="font-semibold text-lg mb-2">Atasi Asam Urat & Stroke Ringan</h4>
                    <p class="text-gray-600">Menurunkan kadar asam urat dan membantu pemulihan pasca stroke.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sertifikat -->
    <section id="certificates" class="py-32 mt-20 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-10">Sertifikat Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($certificate as $cert)
                    <div class="relative group overflow-hidden rounded shadow">
                        <img src="{{ asset('storage/' . $cert->img) }}"
                            class="relative group overflow-hidden rounded shadow min-h-[300px]" alt="Certificate">
                        <div
                            class="absolute inset-0 bg-green-900 bg-opacity-70 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-center p-4">
                            <div>
                                <h4 class="font-bold text-lg">{{ $cert->nama }}</h4>
                                <p>Dikeluarkan oleh: {{ $cert->penerbit }}</p>
                                <p>{{ $cert->tanggal_keluar }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section id="testimoni" class="bg-green-50 py-32 mt-20 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-10">Apa Kata Mereka?</h2>

            <!-- Swiper container -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($testimonies as $test)
                        <div class="swiper-slide pb-12">
                            <div class="bg-white rounded shadow p-6 text-center h-full">
                                <img src="https://i.pinimg.com/736x/03/ee/2f/03ee2f37bad6cf25a9d6cd983021a596.jpg"
                                    alt="Testimoni" class="w-20 h-20 rounded-full mx-auto mb-4">
                                <h4 class="font-semibold">{{ $test->nama }} - {{ $test->asal }}</h4>
                                <p class="text-sm text-gray-500 mb-2">{{ $test->umur }} Tahun</p>
                                <p class="text-gray-600 italic">"{{ $test->testimoni }}."</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination mt-8"></div>
            </div>


            <!-- Bulatan Indicator -->
            <div class="swiper-pagination mt-8"></div>
        </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-green-700 py-32 mt-20 text-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Kolom 1: Tentang Kami -->
                <div>
                    <h4 class="text-lg font-semibold mb-2">Tentang Kami</h4>
                    <p>Proetawa adalah susu kambing etawa dengan campuran gula aren alami, diformulasikan untuk
                        menunjang daya tahan tubuh dan kesehatan pencernaan.
                    </p>
                </div>

                <!-- Kolom 2: Kontak -->
                <div>
                    <h4 class="text-lg font-semibold mb-2">Kontak</h4>
                    <p>Email: official.proetawa@gmail.com</p>
                    <p>WhatsApp: +62 857-1960-8902</p>
                </div>

                <!-- Kolom 3: Alamat -->
                <div>
                    <h4 class="text-lg font-semibold mb-2">Alamat</h4>
                    <p>Komplek Pemda, Jl. Kol. Sulaiman Amin, Palembang</p>
                </div>
            </div>

            <div class="text-center text-sm mt-[100px]">&copy; 2025 Proetawa susu kambing. All rights reserved.</div>
        </div>
    </footer>


    {{-- MODAL JS --}}
    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
        }
    </script>


    <script>
        const navbar = document.getElementById("navbar");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                navbar.classList.add("backdrop-blur-md", "bg-green-900/30", "shadow-md", "py-4");
            } else {
                navbar.classList.remove("backdrop-blur-md", "bg-green-900/30", "shadow-md", "py-4");
            }
        });
    </script>

    <!-- SwiperJS -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            spaceBetween: 30,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    </script>



</body>

</html>
