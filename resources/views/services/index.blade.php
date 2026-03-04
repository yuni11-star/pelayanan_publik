@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="bg-navy text-white rounded-lg shadow-lg p-8 mb-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Public Services</h1>
                <p class="text-xl">Explore our comprehensive range of public services for food and drug safety</p>
            </div>
        </div>

        <!-- Search Section -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <form method="GET" action="{{ route('services.index') }}" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                        Search Services
                    </label>
                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ $search ?? '' }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-navy focus:border-navy"
                        placeholder="Search by service name, description, or category..."
                    >
                </div>
                <div class="flex items-end gap-2">
                    <button
                        type="submit"
                        class="bg-navy text-white px-6 py-3 rounded-lg hover:bg-blue-800 transition duration-200 font-medium"
                    >
                        Search
                    </button>
                    @if(isset($search) && $search)
                        <a
                            href="{{ route('services.index') }}"
                            class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition duration-200 font-medium"
                        >
                            Clear
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Services Grid -->
        @if(isset($services) && $services->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-8">
                @foreach($services as $service)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-200 overflow-hidden">
                        <!-- Service Icon/Header -->
                        <div class="bg-navy text-white p-6">
                            <div class="w-16 h-16 bg-gold rounded-full flex items-center justify-center mb-4 border-4 border-white">
                                @if($service->icon)
                                    <i class="{{ $service->icon }} text-2xl text-navy"></i>
                                @else
                                    <svg class="w-8 h-8 text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-xl font-semibold">{{ $service->name }}</h3>
                        </div>

                        <!-- Service Content -->
                        <div class="p-6">
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $service->description }}</p>

                            <div class="space-y-3 mb-6">
                                <div class="flex items-center text-sm text-gray-500">
                                    <span class="bg-gold text-navy px-3 py-1 rounded-full text-xs font-medium mr-2">Category</span>
                                    <span class="font-medium">{{ $service->category }}</span>
                                </div>

                                @if($service->processing_time_days)
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="w-4 h-4 text-gold mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="font-medium">Processing Time:</span>
                                        <span class="ml-2">{{ $service->processing_time_days }} days</span>
                                    </div>
                                @endif

                                @if($service->fee)
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="w-4 h-4 text-gold mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                        <span class="font-medium">Fee:</span>
                                        <span class="ml-2">Rp {{ number_format($service->fee, 0, ',', '.') }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Action Button -->
                            <button class="w-full bg-navy text-white py-3 px-4 rounded-lg hover:bg-blue-800 transition duration-200 font-medium text-sm">
                                Apply Now
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mb-8">
                {{ $services->appends(request()->query())->links() }}
            </div>
        @else
            <!-- No Results -->
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">No services found</h3>
                <p class="text-gray-600 mb-6">
                    @if(isset($search) && $search)
                        No services match your search criteria. Try different keywords or browse all services.
                    @else
                        There are currently no active services available.
                    @endif
                </p>
                @if(isset($search) && $search)
                    <a href="{{ route('services.index') }}" class="inline-block bg-navy text-white px-8 py-3 rounded-lg hover:bg-blue-800 transition duration-200 font-medium">
                        View All Services
                    </a>
                @endif
            </div>
        @endif

        <!-- Results Summary -->
        @if(isset($services) && $services->count() > 0)
            <div class="text-center text-gray-600 bg-white rounded-lg shadow-md p-6">
                <p class="text-lg">
                    Showing {{ $services->firstItem() }}-{{ $services->lastItem() }} of {{ $services->total() }} services
                    @if(isset($search) && $search)
                        for "<strong class="text-navy">{{ $search }}</strong>"
                    @endif
                </p>
            </div>
        @endif
    </div>
</div>
@endsection
