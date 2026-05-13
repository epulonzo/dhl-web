<x-app-layout>
    <div class="max-w-4xl mx-auto">
        <div class="mb-10 flex items-center justify-between">
            <div>
                <a href="{{ route('incidents.index') }}" class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] hover:text-[#d40511] transition-colors flex items-center mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to List
                </a>
                <h1 class="text-4xl font-black text-[#1a1c21] tracking-tight mb-2">Create Incident</h1>
                <p class="text-gray-500 font-medium italic">Phase 1: Manual incident reporting system</p>
            </div>
        </div>

        <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 p-10 md:p-16">
            <form action="{{ route('incidents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-2">
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Incident Title</label>
                        <input type="text" name="title" required placeholder="Short summary of the issue" 
                            class="w-full rounded-2xl border-gray-100 bg-gray-50/50 text-base font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-4 px-6 shadow-sm">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Tracking Number</label>
                        <input type="text" name="tracking_number" placeholder="DHLXXXXXXXXX" 
                            class="w-full rounded-2xl border-gray-100 bg-gray-50/50 text-base font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-4 px-6 shadow-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-2">
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Category</label>
                        <select name="category" required class="w-full rounded-2xl border-gray-100 bg-gray-50/50 text-base font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-4 px-6 shadow-sm">
                            <option value="">Select Category</option>
                            @foreach(['Late Delivery', 'Damaged Parcel', 'Missing Parcel', 'Address Issue', 'System Error', 'Customer Complaint'] as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Priority</label>
                        <select name="priority" required class="w-full rounded-2xl border-gray-100 bg-gray-50/50 text-base font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-4 px-6 shadow-sm">
                            <option value="">Select Priority</option>
                            @foreach(['Low', 'Medium', 'High', 'Critical'] as $priority)
                                <option value="{{ $priority }}">{{ $priority }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Description</label>
                    <textarea name="description" rows="6" required placeholder="Detailed description of the incident..." 
                        class="w-full rounded-[24px] border-gray-100 bg-gray-50/50 text-base font-bold focus:ring-[#FFCC00] focus:border-[#FFCC00] py-6 px-8 shadow-sm"></textarea>
                </div>

                <div class="space-y-4">
                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest">Attachment</label>
                    <div class="relative group">
                        <input type="file" name="attachment" id="file-upload" class="hidden">
                        <label for="file-upload" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-200 rounded-[24px] cursor-pointer bg-gray-50/30 group-hover:bg-[#FFFCEB] group-hover:border-[#FFCC00] transition-all">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-gray-400 group-hover:text-[#FFCC00] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                <p class="text-sm font-black text-gray-500 uppercase tracking-tight">Upload Evidence</p>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="pt-10 border-t border-gray-50 flex flex-col md:flex-row items-center justify-between gap-6">
                    <button type="reset" class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] hover:text-gray-600 transition-colors">Discard</button>
                    <button type="submit" class="w-full md:w-auto bg-[#FFCC00] text-[#1a1c21] px-12 py-5 rounded-2xl font-black text-base shadow-xl hover:shadow-2xl transition-all transform hover:scale-[1.02] shadow-[#FFCC00]/20">
                        Create Incident
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
