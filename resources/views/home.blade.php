<x-user>
    <div class="flex justify-center text-slate-900">
        <div class="lg:flex lg:items-center lg:justify-between h-[30rem] lg:px-32 lg:mt-16">
            <div class="text-left lg:relative md:text-left w-80 md:w-[32rem] lg:w-[35rem]">
                <h1 class="pt-16 lg:pt-0 font-bold text-xl md:text-2xl lg:text-4xl mb-4 text-center lg:text-left">Solusi Cepat Dan Terpercaya Untuk Masalah <span class="text-cyan-500">Laptop Anda</span></h1>
                <div class="flex justify-center md:justify-normal">
                    <p class="text-center lg:text-left w-80 md:w-[32rem] lg:w-[30rem]">Kami menyediakan layanan perbaikan laptop profesional dengan kualitas terbaik. Apapun masalahnya, tim teknisi kami siap membantu</p>
                </div>
                
                <div class="flex justify-center lg:flex-none lg:justify-normal mt-4 lg:mt-8">
                    <a href="#" class="btn btn-ghost px-6 py-2 text-cyan-500 text-xl rounded-md hover:bg-cyan-600  hover:text-white mt-4 z-20 border-2 border-cyan-500 hover:border-cyan-600">Whatsapp</a>
                    <a href="{{ route('bookings.create') }}" class="btn btn-ghost px-6 py-2 bg-cyan-500 text-white text-xl rounded-md hover:bg-cyan-600 mt-4 z-20 ml-2">Booking</a>
                </div>
            </div>
            <div class="flex justify-center mt-10 lg:mt-0 ">
                <div class="overflow-hidden pr-3 pb-3">
                    <div class=" flex justify-end mb-2 md:mb-4">
                        <img src="{{ asset('gambar/g2.png') }}" alt="Image 2" class="rounded-3xl z-0 h-32 md:h-36 lg:h-52 object-cover shadow-[4px_4px_10px_rgba(0,0,0,0.5)]">
                    </div>
                    <img src="{{ asset('gambar/g3.png') }}" alt="Image 3" class="rounded-3xl z-10 h-32 md:h-36 lg:h-52 object-cover shadow-[4px_4px_10px_rgba(0,0,0,0.5)]">
                </div>
                <img src="{{ asset('gambar/g1.png') }}" alt="Image 1" class="rounded-3xl z-10 relative top-20 ml-2 md:ml-4 h-32 md:h-36 lg:h-52 shadow-[4px_4px_10px_rgba(0,0,0,0.5)]">
            </div>
        </div>
    </div>

    <div class="mt-52 md:mt-56 lg:mt-24 px-5 text-slate-900">
        <h1 class="font-bold text-cyan-600 text-center text-4xl">Layanan </h1>
        <div class="flex justify-center">
            <p class="text-center text-base mt-10 md:w-96 font-semibold">Kami menawarkan beberapa layanan untuk membantu mengenai laptop anda</p>
        </div>
        <div class="flex justify-center mt-20">
            <div class="md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-5">
                <div class="rounded-2xl h-40 w-72 shadow-[1px_1px_15px_rgba(0,0,0,0.3)] mx-auto bg-yellow-50 mb-5 md:mb-0">
                    <div class="flex justify-between bg-slate-900 pt-4 px-4 w-[15rem] rounded-tl-2xl rounded-br-2xl">
                        <p class="font-semibold text-base mb-2 text-yellow-100">Service & Upgrade</p>
                    </div>
                    <p class="text-base mt-4 px-4 pb-4">Memberikan layanan perbaikan dan upgrade, serta install ulang windows</p>
                </div>
                <div class="rounded-2xl h-40 w-72 shadow-[1px_1px_15px_rgba(0,0,0,0.3)] mx-auto bg-yellow-50 mb-5 md:mb-0">
                    <div class="flex justify-between bg-slate-900 pt-4 px-4 w-[15rem] rounded-tl-2xl rounded-br-2xl">
                        <p class="font-semibold text-base mb-2 text-yellow-100">Optimalisasi & Cleaning</p>
                    </div>
                    <p class="text-base mt-4 px-4 pb-4">Mengoptimalisasi serta membersihkan software dan hardware</p>
                </div>
                <div class="rounded-2xl h-40 w-72 shadow-[1px_1px_15px_rgba(0,0,0,0.3)] mx-auto bg-yellow-50 mb-5">
                    <div class="flex justify-between bg-slate-900 pt-4 px-4 w-[15rem] rounded-tl-2xl rounded-br-2xl">
                        <p class="font-semibold text-base mb-2 text-yellow-100">Backup Data</p>
                    </div>
                    <p class="text-base mt-4 px-4 pb-4">Membackup data/file penting yang dibutuhkan</p>
                </div>
                <div class="rounded-2xl h-40 w-72 shadow-[1px_1px_15px_rgba(0,0,0,0.3)] mx-auto bg-yellow-50 mb-5">
                    <div class="flex justify-between bg-slate-900 pt-4 px-4 w-[15rem] rounded-tl-2xl rounded-br-2xl">
                        <p class="font-semibold text-base mb-2 text-yellow-100">Check Up & Diagnose</p>
                    </div>
                    <p class="text-base mt-4 px-4 pb-4">Mengecek serta memberikan diagnosa awal mengenai kerusakan software & hardware</p>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="mt-20 text-slate-900">
        <h1 class="font-bold text-cyan-600 text-center text-4xl">Tentang Kami</h1>
        <div class="mt-12 md:mt-5 lg:mt-0 lg:flex lg:justify-between lg:items-center">
            <div class="mt-10 lg:mt-0 lg:w-5/12 lg:pl-20 lg:justify-start px-5 md:px-10 lg:px-0 md:flex md:justify-center lg:flex-none">
                <div class="md:w-96 lg:w-[30rem]">
                    <p class="text-center lg:text-justify">
                        Fath Comp merupakan sebuah layanan servis komputer profesional yang menyediakan solusi cepat, handal, dan terjangkau untuk berbagai kebutuhan anda. Kami melayani berbagai servis laptop, seperti instalasi perangkat lunak, upgrade ssd dan ram, dan lain-lain.
                    </p>
                    <div class="flex justify-center lg:flex-none lg:justify-normal">
                        <a href="{{ route('about') }}" class="btn btn-ghost px-6 py-2 bg-cyan-500 text-white text-xl rounded-md hover:bg-cyan-600 mt-10 z-20 ml-2 relative right-1 md:right-2">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="mt-10 lg:mt-0 lg:pr-12 lg:w-7/12 flex justify-center lg:flex-none lg:justify-end">
                <img src="{{ asset('gambar/g6.png') }}" alt="Image 5" class="h-72 md:h-96 lg:h-[30rem] object-cover">
            </div>
        </div>
    </div>

    <div class="mt-20 bg-slate-900 pt-14 pb-28">
        <h1 class="font-bold text-cyan-500 text-center text-4xl">Booking</h1>
        <div class="mt-12 md:mt-5 lg:mt-0 lg:flex lg:justify-between lg:items-center">
            <div class="lg:w-3/5 lg:pl-12 flex justify-center lg:flex-none lg:justify-start">
                <img src="{{ asset('gambar/g5-1.png') }}" alt="Image 4" class="h-52 md:h-80 lg:h-[30rem] object-cover">
            </div>
            <div class="mt-10 lg:mt-0 lg:w-2/5 lg:mr-10 lg:justify-start px-5 md:px-10 lg:px-0 md:flex md:justify-center lg:flex-none">
                <div class="hidden md:block relative w-1 h-[20rem] bg-yellow-100 left-[22px] md:top-5 z-0"></div>
                <div class="md:w-[30rem] z-10">
                    <div class="flex justify-start items-center">
                        <div class="mr-5 md:mr-10">
                            <div class="rounded-full bg-cyan-500 w-10 h-10 flex items-center justify-center">
                                <p class="text-yellow-100 font-semibold text-base text-center">1</p>
                            </div>
                        </div>
                        <div class="text-yellow-100 text-base font-semibold">
                            <p>Login/Dafar</p>
                        </div>
                    </div>
                    <div class="flex justify-start mt-5 items-center">
                        <div class="mr-5 md:mr-10">
                            <div class="rounded-full bg-cyan-500 w-10 h-10 flex items-center justify-center">
                                <p class="text-yellow-100 font-semibold text-base text-center">2</p>
                            </div>
                        </div>
                        <div class="text-yellow-100 text-base font-semibold">
                            <p>Isi form booking</p>
                        </div>
                    </div>
                    <div class="flex justify-start mt-5 items-center">
                        <div class="mr-5 md:mr-10">
                            <div class="rounded-full bg-cyan-500 w-10 h-10 flex items-center justify-center">
                                <p class="text-yellow-100 font-semibold text-base text-center">3</p>
                            </div>
                        </div>
                        <div class="text-yellow-100 text-base font-semibold">
                            <p>Pergi ke tempat service sesuai tanggal booking</p>
                        </div>
                    </div>
                    <div class="flex justify-start mt-5 items-center">
                        <div class="mr-5 md:mr-10">
                            <div class="rounded-full bg-cyan-500 w-10 h-10 flex items-center justify-center">
                                <p class="text-yellow-100 font-semibold text-base text-center">4</p>
                            </div>
                        </div>
                        <div class="text-yellow-100 text-base font-semibold">
                            <p>Service diproses oleh teknisi</p>
                        </div>
                    </div>
                    <div class="flex justify-start mt-5 items-center">
                        <div class="mr-5 md:mr-10">
                            <div class="rounded-full bg-cyan-500 w-10 h-10 flex items-center justify-center">
                                <p class="text-yellow-100 font-semibold text-base text-center">5</p>
                            </div>
                        </div>
                        <div class="text-yellow-100 text-base font-semibold">
                            <p>Service selesai</p>
                        </div>
                    </div>
                    <div class="flex justify-start mt-5 items-center">
                        <div class="mr-5 md:mr-10">
                            <div class="rounded-full bg-cyan-500 w-10 h-10 flex items-center justify-center">
                                <p class="text-yellow-100 font-semibold text-base text-center">6</p>
                            </div>
                        </div>
                        <div class="text-yellow-100 text-base font-semibold">
                            <p>Kembali ke tempat service untuk mengambil laptop dan melakukan pembayaran</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-20 lg:mt-32 md:flex md:justify-between md:items-start md:mx-10 lg:mx-20 text-slate-900">
        <div>
            <h1 class="font-bold text-cyan-600 text-center text-4xl md:hidden mb-10">Services</h1>
            <div class="lg:grid lg:grid-cols-3 lg:gap-7">
                <div class="border-4 border-cyan-500 rounded-3xl h-96 w-60 shadow-md shadow-slate-300 mx-auto p-2">
                    <div class=" flex justify-center mb-4 h-56 overflow-hidden">
                        <img src="{{ asset('gambar/g3.png') }}" alt="Image 2" class="rounded-2xl z-0 h-full w-full object-cover">
                    </div>
                    <p class="mt-5 text-lg font-normal">Ganti SSD</p>
                    <p class="mt-2 text-2xl font-semibold">Rp 500.000</p>
                    <p class="mt-1 text-base font-medium"><span>2</span> hari</p>
                </div>
                <div class="border-4 border-cyan-500 rounded-3xl h-96 w-60 shadow-md shadow-slate-300 hidden lg:block p-2">
                    <div class=" flex justify-center mb-4 h-56 overflow-hidden">
                        <img src="{{ asset('gambar/g3.png') }}" alt="Image 2" class="rounded-2xl z-0 h-full w-full object-cover">
                    </div>
                    <p class="mt-5 text-lg font-normal">Ganti SSD</p>
                    <p class="mt-2 text-2xl font-semibold">Rp 500.000</p>
                    <p class="mt-1 text-base font-medium"><span>2</span> hari</p>
                </div>
                <div class="border-4 border-cyan-500 rounded-3xl h-96 w-60 shadow-md shadow-slate-300 hidden lg:block p-2">
                    <div class=" flex justify-center mb-4 h-56 overflow-hidden">
                        <img src="{{ asset('gambar/g3.png') }}" alt="Image 2" class="rounded-2xl z-0 h-full w-full object-cover">
                    </div>
                    <p class="mt-5 text-lg font-normal">Ganti SSD</p>
                    <p class="mt-2 text-2xl font-semibold">Rp 500.000</p>
                    <p class="mt-1 text-base font-medium"><span>2</span> hari</p>
                </div>
            </div>
            <div class="flex justify-center mt-5 lg:mt-0">
                <a href="/service" class="btn btn-ghost px-6 py-2 bg-cyan-500 text-white text-xl rounded-md hover:bg-cyan-600 mt-4 z-20 ml-2 lg:mt-10 relative right-1 md:right-2">Selengkapnya</a>
            </div>
        </div>
        <div class="lg:relative md:ml-8 lg:left-3">
            <h1 class="font-bold text-cyan-600 text-4xl text-center md:text-left mb-6 mt-10 md:mt-0 hidden md:block">Services</h1>
            <p class="text-center mt-10 md:mt-0 md:text-justify md:w-96">Kami menyediakan layanan perbaikan laptop <br class="hidden lg:block"> profesional dengan kualitas terbaik. Apapun masalahnya, tim teknisi kami siap membantu, dan kepuasan pelanggan dan pelayanan yancepat menjadi prioritas utama kami dalam setiap layanan.</p>
        </div>
    </div>

    <div class="mt-20 md:mt-20 lg:mt-32 text-slate-900">
        <h1 class="font-bold text-cyan-600 text-center text-4xl">Apa Kata Mereka?</h1>
        <div class="flex justify-center">
            <p class="text-center text-base mt-10 md:w-[35rem] font-semibold">Kepercayaan Anda adalah prioritas kami. Berikut adalah cerita dari pelanggan yang telah merasakan kualitas layanan kami.</p>
        </div>
        <div class="flex justify-center mt-20">
            <div class="md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-5">
                @foreach ($testimonials as $testimonial)
                <div class="rounded-2xl h-60 w-80 lg:h-52 lg:w-96 shadow-[1px_1px_15px_rgba(0,0,0,0.3)] mx-auto bg-yellow-50 mb-5 md:mb-0 p-4">
                    <div class="font-semibold text-base mb-2 text-cyan-500 flex justify-start items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-slate-900 w-10 h-10 mr-2"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg> 
                        <div>
                            <p>
                                {{ $testimonial->booking->customer->name }}
                            </p>
                            <p class="text-base font-semibold text-yellow-500">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $testimonial->rating)
                                        <span>&#9733;</span> <!-- Bintang penuh -->
                                    @else
                                        <span>&#9734;</span> <!-- Bintang kosong -->
                                    @endif
                                @endfor
                            </p>
                        </div>
                    </div>
                    <p class="text-sm text-container h-32 lg:h-[6.5rem]">
                        {{ $testimonial->description }}
                    </p>
                    <div class="flex justify-end">
                        <p class="font-semibold text-base">
                            {{ $testimonial->testimoni_date->format('d-m-Y') }}
                        </p>
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
    </div>

    <div class="mt-20 md:mt-20 lg:mt-32 mb-10 text-slate-900">
        <h1 class="font-bold text-cyan-600 text-center text-4xl">Kontak Kami</h1>
        <div class="flex justify-center mt-16 mb-20">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                <div class="border-4 shadow-gray-500 border-cyan-500 rounded-3xl h-52 w-80 md:h-72 md:w-[30rem] shadow-md mx-auto flex justify-center items-center">
                    <div>
                        <p class="text-center text-cyan-500 text-2xl md:text-4xl font-bold">Mau tanya dulu?<br>Hubungi kami disini</p>
                        <div class="flex justify-center md:mt-7 lg:mt-0">
                            <a href="#" class="btn btn-ghost px-6 py-2 bg-cyan-500 text-white text-xl md:text-2xl rounded-lg hover:bg-cyan-600 mt-4 z-20 ml-2 lg:mt-10 relative right-2 h-12 w-52 md:h-16 md:w-64 font-medium">Whatsapp</a>
                        </div>
                    </div>
                    
                </div>
                <div class="border-4 shadow-gray-500 border-cyan-500 bg-cyan-500 rounded-3xl h-52 w-80 md:h-72 md:w-[30rem] shadow-md mt-10 lg:mt-0 flex justify-center items-center">
                    <div>
                        <p class="text-center text-white text-2xl md:text-4xl font-bold">Lokasi Kami</p>
                        <p class="text-center text-white text-lg md:text-2xl font-medium mt-4 md:mt-7">Puhjajar Kec.Papar Kab.Kediri<br>Jawa Timur 64153</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user>
    
