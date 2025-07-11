<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Obatku - Aplikasi Pengingat Obat</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#f4faff] text-gray-800 font-sans">

    <!-- Header -->
    <header class="bg-[#2563eb] text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Obatku</h1>
            <div class="space-x-4">
                <a href="/login" class="bg-[#1e40af] px-4 py-2 rounded hover:bg-[#1c3aaa] transition">Daftar</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-[#a2d9ff] py-10">
        <div class="max-w-5xl mx-auto px-6 flex flex-col md:flex-row items-center md:items-start gap-8">

            <!-- Teks kiri -->
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-4xl md:text-5xl font-bold text-blue-900 mb-6">
                    Lorem ipsum dolor sit amet consectetur
                </h2>
                <p class="text-blue-800 text-lg mb-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu erat lacus, vel congue
                    mauris.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu erat lacus, vel congue
                    mauris.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu erat lacus, vel congue
                    mauris.
                </p>
                <a href="/login"
                    class="bg-[#2563eb] text-white px-6 py-3 rounded-md shadow hover:bg-[#1d4ed8] transition">
                    Coba Gratis Sekarang
                </a>
            </div>

            <!-- Foto kanan -->
            <div class="md:w-1/2 flex px-3 justify-center md:justify-end">
                <img src="https://png.pngtree.com/png-clipart/20220301/original/pngtree-male-and-female-nurses-wearing-uniform-for-day-png-image_7346846.png"
                    alt="Hero Image" class="rounded-lg shadow-lg max-w-full h-auto" />
            </div>
        </div>
    </section>



    <!-- Wave Divider -->
    <div class="">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#a2d9ff" fill-opacity="1"
                d="M0,288L48,277.3C96,267,192,245,288,213.3C384,181,480,139,576,117.3C672,96,768,96,864,128C960,160,1056,224,1152,234.7C1248,245,1344,203,1392,181.3L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
            </path>
        </svg>
    </div>



    <section class="py-10 bg-white">
        <div class="max-w-5xl mx-auto px-4 flex flex-col md:flex-row items-center md:items-start gap-8">
            <!-- Carousel -->
            <div id="carousel" class="relative w-full md:w-2/3" data-carousel="slide">
                <div class="relative h-64 overflow-hidden rounded-lg md:h-96">
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://img.freepik.com/premium-photo/male-pharmacists-are-pharmacy_85574-3131.jpg"
                            class="absolute w-full h-full object-cover" alt="slide 1" />
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://maukuliah.ap-south-1.linodeobjects.com/job/1705632714-RvhvtiFhmr.jpg"
                            class="absolute w-full h-full object-cover" alt="slide 2" />
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://atkcqhvpuo.cloudimg.io/v7/vmedis.com/wp-content/uploads/2021/09/male-pharmacists-pharmacy.jpg"
                            class="absolute w-full h-full object-cover" alt="slide 3" />
                    </div>
                </div>

                <!-- Navigation -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4"
                    data-carousel-prev>
                    <span class="w-10 h-10 bg-white/80 rounded-full flex items-center justify-center hover:bg-white">
                        <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4"
                    data-carousel-next>
                    <span class="w-10 h-10 bg-white/80 rounded-full flex items-center justify-center hover:bg-white">
                        <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </button>
            </div>

            <!-- Keterangan -->
            <div class="w-full md:w-1/3">
                <h2 class="text-2xl font-semibold mb-4">Andal dalam solusi anda</h2>
                <p class="text-gray-700">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum
                    interdum, nisi lorem egestas odio,
                    vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor
                    vitae massa.
                </p>
            </div>

        </div>
    </section>

    <!-- Wave Divider -->
    <div class="">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#a2d9ff" fill-opacity="1"
                d="M0,160L48,181.3C96,203,192,245,288,218.7C384,192,480,96,576,64C672,32,768,64,864,80C960,96,1056,96,1152,117.3C1248,139,1344,181,1392,202.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>
    <!-- Features Section -->
    <section class="bg-[#a2d9ff] py-10">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold text-[#1e3a8a] mb-10">Fitur Unggulan</h3>
            <div class="grid md:grid-cols-3 gap-8 text-left">
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition">
                    <img src="https://tse1.mm.bing.net/th/id/OIP.TbaGyjtbWZfsQbDNEKbLMAAAAA?r=0&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Foto"
                        class="w-32 h-32 object-cover rounded mb-4 mx-auto" />
                    <h4 class="text-xl font-semibold text-blue-800 mb-2 text-center">Lorem Ipsum</h4>
                    <p class="text-gray-600 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                        tempor eros at quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu
                        erat lacus, vel congue mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Pellentesque eu erat lacus, vel congue mauris.</p>
                </div>

                <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition">
                    <img src="https://tse4.mm.bing.net/th/id/OIP.jA0QlwieCSq4Rc_q_akgmQHaHa?r=0&pid=ImgDet&w=184&h=184&c=7&dpr=1,3&o=7&rm=3" alt="Foto"
                        class="w-32 h-32 object-cover rounded mb-4 mx-auto" />
                    <h4 class="text-xl font-semibold text-blue-800 mb-2">Dolor Sit Amet</h4>
                    <p class="text-gray-600">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                        doloremque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu erat lacus,
                        vel congue mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu erat
                        lacus, vel congue mauris.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-md transition">
                    <img src="https://th.bing.com/th/id/OIP.ruJBN-I2UKunEpPA7wp0_gHaHa?w=186&h=186&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3" alt="Foto"
                        class="w-32 h-32 object-cover rounded mb-4 mx-auto" />
                    <h4 class="text-xl font-semibold text-blue-800 mb-2">Consectetur Adipiscing</h4>
                    <p class="text-gray-600">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                        suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu erat lacus,
                        vel congue mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu erat
                        lacus, vel congue mauris.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Wave Divider -->
    <div class="">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#a2d9ff" fill-opacity="1"
                d="M0,288L48,272C96,256,192,224,288,224C384,224,480,256,576,250.7C672,245,768,203,864,170.7C960,139,1056,117,1152,133.3C1248,149,1344,203,1392,229.3L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
            </path>
        </svg>
    </div>

    <!-- CTA Section -->
    <section class="bg-white py-10">
        <div class="max-w-4xl mx-auto text-center px-3">
            <h3 class="text-3xl font-bold text-blue-900 mb-4">Mulai Gunakan Obatku Sekarang</h3>
            <p class="text-gray-700 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.
                Praesent libero. Sed cursus ante dapibus diam.</p>
            <a href="/register"
                class="bg-[#2563eb] text-white px-6 py-3 rounded shadow hover:bg-[#1d4ed8] transition">Daftar
                Gratis</a>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-[#1e3a8a] text-white text-center py-5">
        <p>&copy; {{ date('Y') }} Obatku. All rights reserved.</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
