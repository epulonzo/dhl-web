<x-app-layout>
    <div class="max-w-4xl mx-auto">
        <div class="mb-10">
            <a href="{{ route('users.index') }}" class="text-[10px] font-black text-gray-400 uppercase tracking-widest hover:text-[#d40511] transition-colors flex items-center mb-4">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Staff List
            </a>
            <h1 class="text-4xl font-black text-[#1a1c21] tracking-tight">Add New Staff member</h1>
        </div>

        <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 p-10 md:p-16">
            <form action="{{ route('users.store') }}" method="POST" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Full Name</label>
                        <input type="text" name="name" required class="w-full rounded-2xl border-gray-100 bg-gray-50/50 text-base font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-4 px-6 shadow-sm">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Email Address</label>
                        <input type="email" name="email" required class="w-full rounded-2xl border-gray-100 bg-gray-50/50 text-base font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-4 px-6 shadow-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Role</label>
                        <select name="role" required class="w-full rounded-2xl border-gray-100 bg-gray-50/50 text-base font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-4 px-6 shadow-sm">
                            <option value="Support Staff">Support Staff</option>
                            <option value="Manager">Manager</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-6 border-t border-gray-50">
                    <div class="space-y-2">
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Password</label>
                        <input type="password" name="password" required class="w-full rounded-2xl border-gray-100 bg-gray-50/50 text-base font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-4 px-6 shadow-sm">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Confirm Password</label>
                        <input type="password" name="password_confirmation" required class="w-full rounded-2xl border-gray-100 bg-gray-50/50 text-base font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-4 px-6 shadow-sm">
                    </div>
                </div>

                <div class="pt-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <button type="reset" class="text-xs font-black text-gray-400 uppercase tracking-widest hover:text-gray-600">Reset Form</button>
                    <button type="submit" class="w-full md:w-auto bg-[#FFCC00] text-[#1a1c21] px-12 py-5 rounded-2xl font-black text-base shadow-xl hover:shadow-2xl transition-all transform hover:scale-[1.02]">
                        Create Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
