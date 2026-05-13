<x-app-layout>
    <div class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div>
            <h1 class="text-4xl font-black text-[#1a1c21] tracking-tight mb-2">All Incidents</h1>
            <p class="text-gray-500 font-medium">Manage and monitor global logistics disruptions</p>
        </div>
        
        <a href="{{ route('incidents.create') }}" class="bg-[#FFCC00] text-[#1a1c21] px-8 py-4 rounded-2xl font-black text-sm flex items-center space-x-3 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
            </svg>
            <span>Create New Incident</span>
        </a>
    </div>

    <!-- Filters Section -->
    <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-100 mb-10">
        <form action="{{ route('incidents.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Search Records</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tracking # or Title" 
                    class="w-full rounded-xl border-gray-100 bg-gray-50/50 text-sm font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-3 px-4">
            </div>
            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Category</label>
                <select name="category" class="w-full rounded-xl border-gray-100 bg-gray-50/50 text-sm font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-3 px-4">
                    <option value="">All Categories</option>
                    @foreach(['Late Delivery', 'Damaged Parcel', 'Missing Parcel', 'Address Issue', 'System Error', 'Customer Complaint'] as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Priority Level</label>
                <select name="priority" class="w-full rounded-xl border-gray-100 bg-gray-50/50 text-sm font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-3 px-4">
                    <option value="">All Priorities</option>
                    <option value="High" {{ request('priority') == 'High' ? 'selected' : '' }}>High</option>
                    <option value="Medium" {{ request('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Low" {{ request('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full bg-[#1a1c21] text-white font-black py-3.5 rounded-xl hover:bg-black transition-colors shadow-lg">Apply Filters</button>
            </div>
        </form>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-[24px] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-8 py-5 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Tracking #</th>
                        <th class="px-8 py-5 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Incident Details</th>
                        <th class="px-8 py-5 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Priority</th>
                        <th class="px-8 py-5 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-5 text-right text-xs font-black text-gray-400 uppercase tracking-widest">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($incidents as $incident)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-8 py-6 whitespace-nowrap text-sm font-black text-[#d40511]">{{ $incident->tracking_number ?? 'N/A' }}</td>
                        <td class="px-8 py-6">
                            <div class="text-sm font-bold text-gray-900 mb-1">{{ $incident->title }}</div>
                            <div class="text-[10px] text-gray-400 font-bold uppercase tracking-tight">{{ $incident->category }} • {{ $incident->created_at->format('M d, Y') }}</div>
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap">
                            <span class="px-4 py-1 text-[10px] font-black uppercase rounded-lg {{ $incident->priority == 'High' ? 'bg-red-100 text-red-700' : ($incident->priority == 'Medium' ? 'bg-yellow-100 text-[#1a1c21]' : 'bg-green-100 text-green-700') }}">
                                {{ $incident->priority }}
                            </span>
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap">
                            <span class="px-4 py-1 text-[10px] font-black uppercase rounded-lg bg-gray-100 text-gray-600">
                                {{ $incident->status }}
                            </span>
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap text-right">
                            <a href="{{ route('incidents.show', $incident) }}" class="text-xs font-black text-[#1a1c21] hover:text-[#d40511] uppercase tracking-widest border-b-2 border-transparent hover:border-[#d40511] pb-1 transition-all">View Case</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-20 text-center text-gray-400 font-bold italic uppercase tracking-widest">No matching incidents found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($incidents->hasPages())
        <div class="p-8 bg-gray-50 border-t border-gray-100">
            {{ $incidents->links() }}
        </div>
        @endif
    </div>
</x-app-layout>
