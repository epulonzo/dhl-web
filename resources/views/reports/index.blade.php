<x-app-layout>
    <div class="mb-10">
        <h1 class="text-4xl font-black text-[#1a1c21] tracking-tight mb-2">Performance Reports</h1>
        <p class="text-gray-500 font-medium italic">Phase 1: Statistical summary of logistics incidents</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Incidents by Category -->
        <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-100">
            <h3 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-6">By Category</h3>
            <div class="space-y-6">
                @foreach($categorySummary as $item)
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-bold text-gray-700">{{ $item->category }}</span>
                        <span class="text-sm font-black text-[#1a1c21]">{{ $item->total }}</span>
                    </div>
                    <div class="w-full bg-gray-50 h-2 rounded-full overflow-hidden">
                        <div class="bg-[#FFCC00] h-full" style="width: {{ ($item->total / $categorySummary->sum('total')) * 100 }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Incidents by Priority -->
        <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-100">
            <h3 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-6">By Priority</h3>
            <div class="space-y-6">
                @foreach($prioritySummary as $item)
                <div class="flex items-center justify-between p-4 bg-gray-50/50 rounded-xl border border-gray-50">
                    <span class="text-sm font-bold text-gray-700 flex items-center">
                        <span class="w-2 h-2 rounded-full mr-3 {{ $item->priority == 'Critical' ? 'bg-red-500' : ($item->priority == 'High' ? 'bg-orange-500' : 'bg-green-500') }}"></span>
                        {{ $item->priority }}
                    </span>
                    <span class="text-sm font-black text-[#1a1c21]">{{ $item->total }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Incidents by Status -->
        <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-100">
            <h3 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-6">By Status</h3>
            <div class="space-y-6">
                @foreach($statusSummary as $item)
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-bold text-gray-700">{{ $item->status }}</span>
                        <span class="text-sm font-black text-[#d40511]">{{ $item->total }}</span>
                    </div>
                    <div class="w-full bg-gray-100 h-1.5 rounded-full">
                        <div class="bg-[#d40511] h-full rounded-full" style="width: {{ ($item->total / $statusSummary->sum('total')) * 100 }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
