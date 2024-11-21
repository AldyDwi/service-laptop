<x-authentikasi>
    <div class="md:flex justify-center lg:justify-between items-center w-full">
        <div class="flex justify-center mt-10 md:mt-0">
            <div class="lg:mr-20 w-[400px] shadow-lg shadow-slate-500 rounded-2xl px-6 pb-12 pt-6 bg-white border-2 border-gray-900">
                <h1 class="text-cyan-600 text-2xl font-bold mb-10">Login</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
            
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-lg/[19px] text-cyan-600" />
                        <x-text-input id="email" class="block mt-3 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-6">
                        <x-input-label for="password" :value="__('Password')" class="text-lg/[19px] text-cyan-600" />
            
                        <x-text-input id="password" class="block mt-3 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-cyan-600 shadow-sm focus:ring-cyan-600" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="w-full justify-center py-3 bg-cyan-600 hover:bg-cyan-700 focus:bg-cyan-600 active:bg-cyan-600 focus:ring-cyan-600">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
                <div class="mt-5">
                    <p class="text-center">Belum punya akun? <a href="{{ route('register') }}" class="text-cyan-600 font-bold">Register</a></p>
                </div>
            </div>
        </div>      
        
        <div class="lg:h-[500px] md:h-[350px] max-md:mt-8 hidden lg:block">
            <img src="{{ asset('gambar/g7.png') }}" class="w-full h-full max-md:w-4/5 mx-auto object-cover lg:relative lg:left-20" alt="Dining Experience" />
        </div>
    </div>
</x-authentikasi>
