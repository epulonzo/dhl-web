<x-app-layout>
    <div class="mb-8">
        <a href="{{ route('incidents.index') }}" class="text-xs font-black text-gray-400 uppercase tracking-widest hover:text-[#d40511] transition-colors flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Incidents
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Info -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 p-10">
                <div class="flex items-start justify-between mb-8">
                    <div>
                        <span class="px-4 py-1.5 bg-gray-100 text-gray-600 text-[10px] font-black rounded-lg uppercase tracking-widest">{{ $incident->category }}</span>
                        <h1 class="text-3xl font-black text-[#1a1c21] mt-4">{{ $incident->title }}</h1>
                        <p class="text-sm text-gray-400 font-bold mt-1">Incident ID: #{{ str_pad($incident->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <span class="px-5 py-2 {{ $incident->priority == 'Critical' || $incident->priority == 'High' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-[#1a1c21]' }} text-xs font-black rounded-xl uppercase tracking-widest">
                        {{ $incident->priority }}
                    </span>
                </div>

                <div class="prose max-w-none text-gray-600">
                    <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-4">Detailed Description</h3>
                    <div class="bg-gray-50/50 p-6 rounded-2xl border border-gray-50 text-base font-medium leading-relaxed">
                        {{ $incident->description }}
                    </div>
                </div>

                @if($incident->attachment)
                <div class="mt-10">
                    <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-4">Evidence / Attachment</h3>
                    <a href="{{ Storage::url($incident->attachment) }}" target="_blank" class="flex items-center p-4 bg-white border border-gray-100 rounded-2xl hover:border-[#FFCC00] transition-all group shadow-sm">
                        <div class="w-10 h-10 bg-[#FFFCEB] rounded-xl flex items-center justify-center text-[#FFCC00] mr-4 group-hover:bg-[#FFCC00] group-hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-black text-gray-700">View Attached Document</span>
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div class="space-y-8">
            <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 p-8">
                <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-6">Workflow Status</h3>
                
                <form action="{{ route('incidents.update', $incident) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="title" value="{{ $incident->title }}">
                    <input type="hidden" name="description" value="{{ $incident->description }}">
                    <input type="hidden" name="category" value="{{ $incident->category }}">
                    <input type="hidden" name="priority" value="{{ $incident->priority }}">
                    
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Current Status</label>
                        <select name="status" class="w-full rounded-xl border-gray-100 bg-gray-50/50 text-sm font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-3 px-4">
                            @foreach(['New', 'Assigned', 'In Progress', 'Resolved', 'Closed'] as $status)
                                <option value="{{ $status }}" {{ $incident->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Tracking Number</label>
                        <div class="text-base font-black text-[#d40511] tracking-tight">{{ $incident->tracking_number ?? 'N/A' }}</div>
                    </div>

                    <button type="submit" class="w-full bg-[#1a1c21] text-white font-black py-4 rounded-2xl hover:bg-black transition-all shadow-lg">
                        Update Incident
                    </button>
                </form>

                <div class="mt-8 pt-8 border-t border-gray-50">
                    <form action="{{ route('incidents.destroy', $incident) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full text-xs font-black text-red-400 uppercase tracking-widest hover:text-red-600 transition-colors">
                            Delete Record
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
