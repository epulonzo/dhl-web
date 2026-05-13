<x-app-layout>
    <div class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div>
            <h1 class="text-4xl font-black text-[#1a1c21] tracking-tight mb-2">User Management</h1>
            <p class="text-gray-500 font-medium">Manage access and roles for DHL Support Staff</p>
        </div>
        
        <a href="{{ route('users.create') }}" class="bg-[#FFCC00] text-[#1a1c21] px-8 py-4 rounded-2xl font-black text-sm flex items-center space-x-3 shadow-lg hover:shadow-xl transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
            <span>Add New Staff</span>
        </a>
    </div>

    <div class="bg-white rounded-[24px] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-8 py-5 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Name</th>
                        <th class="px-8 py-5 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Email</th>
                        <th class="px-8 py-5 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Role</th>
                        <th class="px-8 py-5 text-right text-xs font-black text-gray-400 uppercase tracking-widest">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-8 py-6">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-[#FFCC00] rounded-full flex items-center justify-center font-bold text-xs">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <span class="text-sm font-bold text-gray-900">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-sm font-medium text-gray-500">{{ $user->email }}</td>
                        <td class="px-8 py-6">
                            <span class="px-4 py-1 text-[10px] font-black uppercase rounded-lg {{ $user->role == 'Admin' ? 'bg-red-100 text-red-700' : ($user->role == 'Manager' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-600') }}">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right space-x-4">
                            <a href="{{ route('users.edit', $user) }}" class="text-xs font-black text-gray-400 hover:text-[#1a1c21] uppercase tracking-widest transition-colors">Edit</a>
                            @if($user->id !== auth()->id())
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-black text-red-400 hover:text-red-600 uppercase tracking-widest transition-colors" onclick="return confirm('Delete this user?')">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
        <div class="p-8 bg-gray-50 border-t border-gray-100">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</x-app-layout>
