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
    {{-- GSAP --}}
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>


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
    <section class="relative h-screen bg-cover bg-center"
        style="background-image: url('{{ asset('img/hompej/WhatsApp Image 2025-07-07 at 15.00.12.jpeg') }}');">
        <!-- Overlay gelap -->
        <div class="absolute inset-0 bg-green-900/40 backdrop-blur-sm"></div>

        <!-- Konten utama -->
        <div class="relative z-10 h-full flex items-center justify-center px-6">
            <div
                class="text-center max-w-3xl bg-white/20 backdrop-blur-md border border-white/30 rounded-3xl p-10 shadow-xl text-white">
                <img src="{{ asset('img/LOGO PROETAWA.webp') }}" alt="Proetawa Logo" class="mx-auto w-40 sm:w-52 mb-6">
                <h1 class="text-3xl sm:text-4xl font-extrabold mb-4 leading-tight">
                    Sehat Alami Bersama <span class="text-yellow-300">ProEtawa</span>
                </h1>
                <p class="text-white/90 text-base sm:text-lg mb-8">
                    Susu kambing etawa bubuk dengan campuran gula aren — Kaya manfaat dan bisa dikonsumsi mulai usia 1
                    tahun hingga
                    lansia.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <button onclick="toggleModal('modalContact')"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-full shadow-md transition">Hubungi
                        Kami</button>
                    <button onclick="toggleModal('modalShop')"
                        class="bg-white text-green-800 px-6 py-3 rounded-full hover:bg-green-100 shadow-md transition">Beli
                        Sekarang</button>
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
        <div class="max-w-6xl mx-auto text-center mb-12 fade-gsap">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-green-800">Tentang Produk Kami</h2>
            <p class="text-gray-600 text-base md:text-lg max-w-3xl mx-auto">
                ProEtawa dibuat dari 100% bahan alami pilihan dan premium, tanpa bahan pengawet yang telah teruji
                klinis...
            </p>
        </div>

        <!-- Gallery Grid -->
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 gap-4 px-2 md:px-0">
            <div class="fade-gsap md:col-span-3 sm:col-span-2 col-span-1 row-span-2">
                <img src="{{ asset('img/hompej/samarkan.jpeg') }}" alt="Produk 1"
                    class="rounded-lg w-full h-full max-h-[400px] object-cover shadow-lg">
            </div>

            <div class="fade-gsap md:col-span-2 sm:col-span-1 col-span-1">
                <img src="{{ asset('img/hompej/WhatsApp Image 2025-07-07 at 15.38.22.jpeg') }}" alt="Produk 2"
                    class="rounded-lg w-full h-52 object-cover shadow-md">
            </div>

            <div class="fade-gsap md:col-span-1 sm:col-span-1 col-span-1">
                <img src="{{ asset('img/hompej/turki.jpg') }}" alt="Produk 3"
                    class="rounded-lg w-full h-52 object-cover shadow-md">
            </div>

            <div class="fade-gsap md:col-span-3 sm:col-span-2 col-span-1">
                <img src="{{ asset('img/hompej/WhatsApp Image 2025-07-07 at 15.44.06.jpeg') }}" alt="Produk 4"
                    class="rounded-lg w-full h-60 object-cover shadow-md">
            </div>
        </div>
    </section>


    <!-- Manfaat -->
    <section id="benefit" class="bg-green-50 py-32 mt-30 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-10">Manfaat ProEtawa</h2>

            <!-- Baris 1: 3 item -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mb-8">
                <div class="text-center fade-gsap-benefit">
                    <div class="text-green-600 text-5xl mb-4">🦴</div>
                    <h4 class="font-semibold text-lg mb-2">Atasi Nyeri Sendi & Rematik</h4>
                    <p class="text-gray-600">Membantu meredakan peradangan dan keluhan sendi atau rematik.</p>
                </div>
                <div class="text-center fade-gsap-benefit">
                    <div class="text-green-600 text-5xl mb-4">🩸</div>
                    <h4 class="font-semibold text-lg mb-2">Membantu Penderita Diabetes</h4>
                    <p class="text-gray-600">Menstabilkan kadar gula darah secara alami dan aman.</p>
                </div>
                <div class="text-center fade-gsap-benefit">
                    <div class="text-green-600 text-5xl mb-4">🌬️</div>
                    <h4 class="font-semibold text-lg mb-2">Meringankan TBC, Asma & Bronkhitis</h4>
                    <p class="text-gray-600">Membantu pernapasan lebih lega dan sehat.</p>
                </div>
            </div>

            <!-- Baris 2 -->
            <div class="flex flex-col sm:flex-row justify-center gap-8 mt-[50px]">
                <div class="text-center w-full sm:w-1/2 md:w-1/4 fade-gsap-benefit">
                    <div class="text-green-600 text-5xl mb-4">🥛</div>
                    <h4 class="font-semibold text-lg mb-2">Meredakan Maag & Asam Lambung</h4>
                    <p class="text-gray-600">Mengurangi rasa perih akibat asam lambung yang berlebihan</p>
                </div>
                <div class="text-center w-full sm:w-1/2 md:w-1/4 fade-gsap-benefit">
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
            <h2 class="text-3xl font-bold text-center mb-10">Sertifikat</h2>

            @php
                $chunks = $certificate->chunk(3);
            @endphp

            @foreach ($chunks as $chunk)
                <div class="flex justify-center gap-6 flex-wrap mb-6">
                    @foreach ($chunk as $cert)
                        <div class="fade-gsap relative group overflow-hidden rounded shadow w-full sm:w-[300px]">
                            <img src="{{ asset('storage/' . $cert->img) }}"
                                class="w-full min-h-[300px] object-cover rounded shadow" alt="Certificate">
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
            @endforeach
        </div>
    </section>

    <!-- Testimoni -->
    <section id="testimoni" class="bg-green-50 py-32 mt-20 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-10">Testimoni</h2>

            <!-- Swiper container -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($testimonies as $test)
                        <div class="swiper-slide pb-12 fade-gsap">
                            <div class="bg-white rounded shadow p-6 text-center h-full">
                                <img src="{{ asset('uploads/testimonies/' . $test->foto) }}" alt="Testimoni"
                                    class="w-20 h-20 rounded-full mx-auto mb-4">
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


    <!-- Bergabung Jadi Mitra -->
    <section class="py-32 bg-white px-6">
        <div class="max-w-6xl mx-auto text-center mb-16">
            <h2 class="text-3xl font-bold text-green-800">Bergabung Jadi Mitra Kami</h2>
            <p class="text-gray-600 mt-2">Pilih peranmu sebagai Agen, Sub Agen, atau Reseller dan mulai berjualan
                bersama ProEtawa</p>
        </div>

        @php
            $chunks = $role->chunk(3);
        @endphp

        @foreach ($chunks as $chunk)
            <div class="flex justify-center gap-8 flex-wrap mb-8">
                @foreach ($chunk as $r)
                    <div
                        class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200/60 p-6 rounded-2xl shadow-md hover:shadow-xl hover:ring-2 hover:ring-green-300 transition-all duration-300 w-full sm:w-[320px]">

                        <h3 class="text-2xl font-bold text-green-800 mb-3 tracking-wide">{{ $r->role }}</h3>

                        <p class="text-gray-600 mb-4 leading-relaxed text-sm">{{ $r->penjelasan }}</p>

                        <p class="text-xs text-gray-500 italic mb-2">Syarat menjadi
                            <strong>{{ $r->role }}</strong>:</p>

                        <ul class="text-sm text-gray-700 space-y-2 mb-5 list-none pl-0">
                            @foreach (explode("\n", $r->syarat) as $item)
                                <li class="flex items-start">
                                    <span class="text-green-600 mr-2 mt-0.5">✅</span>
                                    <span>{{ trim($item) }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ $r->link }}" target="_blank"
                            class="block bg-green-600 hover:bg-green-700 text-white font-semibold text-sm py-2.5 rounded-full text-center transition duration-300">
                            Join Us
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </section>


    <!-- Footer -->
    <footer class="bg-green-700 py-20 mt-20 text-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Kolom 1: Tentang Kami -->
                <div>
                    <h4 class="text-lg font-semibold mb-2">Tentang Kami</h4>
                    <p class="text-sm leading-relaxed">
                        ProEtawa adalah susu kambing etawa bubuk dengan campuran gula aren alami, diformulasikan untuk
                        menunjang kesehatan dan daya tahan tubuh.
                    </p>
                </div>

                <!-- Kolom 2: Kontak -->
                <div>
                    <h4 class="text-lg font-semibold mb-2">Kontak</h4>
                    <p class="text-sm">Email: official.proetawa@gmail.com</p>
                    <p class="text-sm">WhatsApp: +62 877-1543-0183</p>
                </div>

                <!-- Kolom 3: Alamat -->
                <div>
                    <h4 class="text-lg font-semibold mb-2">Alamat</h4>
                    <div class="w-full h-64 rounded overflow-hidden shadow-md">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.5394311872096!2d104.69888657573425!3d-2.9476793397006182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b753771f341ad%3A0x53953ae508b0070b!2sProEtawa%20Official!5e0!3m2!1sid!2sid!4v1752022441580!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <div class="text-center text-sm mt-16">&copy; 2025 ProEtawa Susu Kambing. All rights reserved.</div>
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


    <!-- about gsap -->
    <script>
        gsap.registerPlugin(ScrollTrigger);

        gsap.fromTo(".fade-gsap", {
            opacity: 0,
            y: 100
        }, {
            opacity: 1,
            y: 0,
            duration: 1.2,
            stagger: 0.2,
            ease: "elastic.out(1, 0.6)",
            scrollTrigger: {
                trigger: "#home",
                start: "top 80%",
                toggleActions: "play reverse play reverse"
            }
        });
    </script>



    {{-- manfaat gsap --}}
    <script>
        gsap.fromTo(".fade-gsap-benefit", {
            opacity: 0,
            y: 100
        }, {
            opacity: 1,
            y: 0,
            duration: 1.2,
            stagger: 0.2,
            ease: "elastic.out(1, 0.6)",
            scrollTrigger: {
                trigger: "#benefit",
                start: "top 80%",
                toggleActions: "play reverse play reverse"
            }
        });
    </script>


    {{-- certi gsap --}}
    <script>
        gsap.registerPlugin(ScrollTrigger);

        gsap.fromTo("#certificates .fade-gsap", {
            opacity: 0,
            y: 100
        }, {
            opacity: 1,
            y: 0,
            duration: 1.2,
            stagger: 0.2,
            ease: "elastic.out(1, 0.6)",
            scrollTrigger: {
                trigger: "#certificates",
                start: "top 80%",
                toggleActions: "play reverse play reverse"
            }
        });
    </script>

    {{-- testi gsap --}}
    <script>
        gsap.registerPlugin(ScrollTrigger);

        // Trigger pertama saat scroll ke section testimoni
        ScrollTrigger.batch(".mySwiper .fade-gsap", {
            start: "top 80%",
            onEnter: (batch) =>
                gsap.to(batch, {
                    opacity: 1,
                    y: 0,
                    stagger: 0.2,
                    duration: 1,
                    ease: "power3.out"
                }),
            onLeaveBack: (batch) =>
                gsap.to(batch, {
                    opacity: 0,
                    y: 50,
                    stagger: 0.1,
                    duration: 0.6,
                    ease: "power2.inOut"
                })
        });

        // Set initial state
        gsap.set(".mySwiper .fade-gsap", {
            opacity: 0,
            y: 50
        });
    </script>

</body>

</html>
