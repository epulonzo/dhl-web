<x-guest-layout>
    <div class="fixed inset-0 flex flex-col md:flex-row h-screen w-screen overflow-hidden">
        <!-- Left Side: DHL Brand Section -->
        <div class="w-full md:w-[45%] bg-[#FFCC00] p-10 md:p-16 flex flex-col justify-between relative overflow-hidden">
            <div class="z-10">
                <!-- DHL Logo -->
                <div class="flex items-center space-x-3 mb-20">
                    <div class="bg-[#d40511] p-2 rounded-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 3h18v18H3V3zm16 16V5H5v14h14zM7 7h10v2H7V7zm0 4h10v2H7v-2zm0 4h7v2H7v-2z"/>
                        </svg>
                    </div>
                    <span class="text-3xl font-black text-[#d40511] tracking-tighter italic">DHL</span>
                </div>

                <!-- Title & Description -->
                <div class="max-w-md">
                    <h1 class="text-5xl md:text-6xl font-black text-[#1a1c21] leading-[1.1] mb-8">
                        Incident Reporting System
                    </h1>
                    <p class="text-lg md:text-xl text-[#1a1c21] font-medium leading-relaxed mb-12">
                        Automating incident collection, classification, and tracking for faster resolution
                    </p>

                    <div class="flex items-center space-x-3 text-[#1a1c21] font-bold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <span class="text-sm uppercase tracking-widest">Excellence. Simply Delivered.</span>
                    </div>
                </div>
            </div>

            <!-- Footer Text -->
            <div class="z-10 text-[#1a1c21] text-xs font-bold tracking-wide mt-12 md:mt-0">
                DHL APSSC | Digital Automation Challenge 2026
            </div>

            <!-- Decorative background element (optional) -->
            <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full md:w-[55%] bg-white flex items-center justify-center p-8 md:p-20 overflow-y-auto">
            <div class="w-full max-w-md">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-extrabold text-gray-900 mb-2">Welcome back</h2>
                    <p class="text-gray-500 font-medium">Sign in to access the incident reporting system</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-8">
                    @csrf

                    <!-- Email/Username -->
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Username</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your username"
                            class="w-full px-5 py-3.5 rounded-xl border border-gray-200 focus:border-[#FFCC00] focus:ring-4 focus:ring-[#FFCC00]/20 transition-all placeholder:text-gray-400">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                        <input id="password" type="password" name="password" required placeholder="Enter your password"
                            class="w-full px-5 py-3.5 rounded-xl border border-gray-200 focus:border-[#FFCC00] focus:ring-4 focus:ring-[#FFCC00]/20 transition-all placeholder:text-gray-400">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Actions -->
                    <div class="pt-2">
                        <button type="submit" class="w-full bg-[#FFCC00] text-[#1a1c21] font-extrabold py-4 rounded-xl shadow-lg hover:bg-[#e6b800] transition-all transform hover:scale-[1.01] active:scale-[0.99] shadow-[#FFCC00]/30">
                            Sign In
                        </button>
                    </div>

                    <div class="text-center space-y-4 pt-6">
                        <p class="text-sm text-gray-400 font-medium tracking-tight">
                            Demo: Use any username and password to login
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Floating Help Button (Bottom Right) -->
    <div class="fixed bottom-6 right-6 z-[60]">
        <button class="w-10 h-10 bg-white border border-gray-200 rounded-full flex items-center justify-center shadow-lg text-gray-500 font-bold hover:bg-gray-50">
            ?
        </button>
    </div>
</x-guest-layout>
