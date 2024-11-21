<x-authentikasi>
    <div class="md:flex justify-center lg:justify-between items-center w-full">
        <div class="flex justify-center mt-10 md:mt-0">
            <div class="lg:mr-20 w-[400px] shadow-lg shadow-slate-500 border-2 border-gray-900 rounded-2xl px-6 pb-12 pt-6 bg-white my-5">
                <h1 class="text-cyan-600 text-2xl font-bold mb-10">Register</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
            
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nama')" class="text-lg/[19px] text-cyan-600" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
            
                    <!-- No Hp -->
                    <div class="mt-4">
                        <x-input-label for="hp" :value="__('No Hp')" class="text-lg/[19px] text-cyan-600" />
                        <x-text-input id="hp" class="block mt-1 w-full" type="text" name="hp" :value="old('hp')" required autofocus autocomplete="hp" />
                        <x-input-error :messages="$errors->get('hp')" class="mt-2" />
                    </div>
            
                    <!-- Alamat -->
                    <div class="mt-4">
                        <x-input-label for="alamat" :value="__('Alamat')" class="text-lg/[19px] text-cyan-600" />
                        <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" />
                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>
            
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" class="text-lg/[19px] text-cyan-600" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" class="text-lg/[19px] text-cyan-600" />
            
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-lg/[19px] text-cyan-600" />
            
                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="w-full justify-center py-3 bg-cyan-600 hover:bg-cyan-700 focus:bg-cyan-700 active:bg-cyan-600 focus:ring-cyan-600">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
                <div class="mt-5">
                    <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}" class="text-cyan-600 font-bold">Login</a></p>
                </div>
            </div>
        </div>

        <div class="lg:h-[500px] md:h-[350px] max-md:mt-8 hidden lg:block">
            <img src="{{ asset('gambar/g7.png') }}" class="w-full h-full max-md:w-4/5 mx-auto object-cover lg:relative lg:left-20" alt="Dining Experience" />
        </div>
    </div>
    
</x-authentikasi>
