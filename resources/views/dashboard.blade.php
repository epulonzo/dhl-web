<x-app-layout>
    <div class="mb-10">
        <h1 class="text-4xl font-black text-[#1a1c21] tracking-tight mb-2">Dashboard Overview</h1>
        <p class="text-gray-500 font-medium">Monitor and manage incident reports in real-time</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Total Incidents -->
        <div class="bg-white p-8 rounded-[24px] border-2 border-transparent hover:border-[#FFCC00] transition-all shadow-sm hover:shadow-xl relative overflow-hidden group">
            <div class="w-12 h-12 bg-[#FFCC00] rounded-xl flex items-center justify-center mb-6 shadow-sm">
                <svg class="w-6 h-6 text-[#1a1c21]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <div class="text-gray-400 text-sm font-bold uppercase tracking-wider mb-1">Total Incidents</div>
            <div class="text-4xl font-black text-[#1a1c21]">{{ $stats['total'] }}</div>
            <div class="absolute top-8 right-8 text-green-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </div>
        </div>

        <!-- Pending -->
        <div class="bg-white p-8 rounded-[24px] border-2 border-transparent hover:border-[#FFCC00] transition-all shadow-sm hover:shadow-xl group">
            <div class="w-12 h-12 bg-[#FFFCEB] rounded-xl flex items-center justify-center mb-6">
                <svg class="w-6 h-6 text-[#FFCC00]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="text-gray-400 text-sm font-bold uppercase tracking-wider mb-1">Pending</div>
            <div class="text-4xl font-black text-[#1a1c21]">{{ $stats['pending'] }}</div>
        </div>

        <!-- In Progress -->
        <div class="bg-white p-8 rounded-[24px] border-2 border-transparent hover:border-[#FFCC00] transition-all shadow-sm hover:shadow-xl group">
            <div class="w-12 h-12 bg-[#E0F2FE] rounded-xl flex items-center justify-center mb-6">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="text-gray-400 text-sm font-bold uppercase tracking-wider mb-1">In Progress</div>
            <div class="text-4xl font-black text-[#1a1c21]">1</div>
        </div>

        <!-- Resolved -->
        <div class="bg-white p-8 rounded-[24px] border-2 border-transparent hover:border-[#FFCC00] transition-all shadow-sm hover:shadow-xl group">
            <div class="w-12 h-12 bg-[#DCFCE7] rounded-xl flex items-center justify-center mb-6">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="text-gray-400 text-sm font-bold uppercase tracking-wider mb-1">Resolved</div>
            <div class="text-4xl font-black text-[#1a1c21]">{{ $stats['resolved'] }}</div>
        </div>
    </div>

    <!-- Alert / High Priority -->
    @if($stats['high_priority'] > 0)
    <div class="bg-[#FFF1F2] border border-[#FECDD3] rounded-[24px] p-6 mb-10 flex items-center justify-between shadow-sm">
        <div class="flex items-center space-x-6">
            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-red-600 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-black text-[#991B1B]">High Priority Incidents</h3>
                <p class="text-red-700 font-medium text-sm">You have {{ $stats['high_priority'] }} high or critical priority incidents requiring immediate attention</p>
            </div>
        </div>
        <a href="{{ route('incidents.index', ['priority' => 'High']) }}" class="bg-[#FFCC00] text-[#1a1c21] px-6 py-2.5 rounded-xl font-black text-sm flex items-center space-x-2 shadow-md hover:shadow-lg transition-all">
            <span>View All</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>
    @endif

    <!-- Recent Incidents -->
    <div class="bg-white rounded-[24px] shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex items-center justify-between">
            <h3 class="text-xl font-black text-[#1a1c21]">Recent Incidents</h3>
            <a href="{{ route('incidents.index') }}" class="bg-[#FFCC00] text-[#1a1c21] px-6 py-2.5 rounded-xl font-black text-sm flex items-center space-x-2 shadow-md hover:shadow-lg transition-all">
                <span>View All</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-8 py-4 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Tracking #</th>
                        <th class="px-8 py-4 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Incident</th>
                        <th class="px-8 py-4 text-left text-xs font-black text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-4 text-right text-xs font-black text-gray-400 uppercase tracking-widest">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($recentIncidents as $incident)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-8 py-5 text-sm font-black text-[#d40511]">{{ $incident->tracking_number ?? 'N/A' }}</td>
                        <td class="px-8 py-5">
                            <div class="text-sm font-bold text-gray-900">{{ $incident->title }}</div>
                            <div class="text-[10px] text-gray-400 font-bold uppercase tracking-tight">{{ $incident->category }}</div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 text-[10px] font-black uppercase rounded-lg {{ $incident->priority == 'High' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ $incident->status }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <a href="{{ route('incidents.show', $incident) }}" class="text-xs font-black text-gray-400 hover:text-[#d40511] uppercase tracking-widest">Manage</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
