@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-cover bg-center bg-no-repeat h-screen flex items-center" style="background-image: url('https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80');">
    <!-- Dark Blue Overlay -->
    <div class="absolute inset-0 bg-navy bg-opacity-80"></div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
            Official Public Service Portal<br>
            <span class="text-blue-200">BBPOM Pontianak</span>
        </h1>
        <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-3xl mx-auto">
            Ensuring food and drug safety for the community of Kalimantan Barat
        </p>
        <a href="#" class="inline-block bg-white text-navy px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            Check Permit Status
        </a>
    </div>
</section>

<!-- Services Grid Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Comprehensive food and drug safety services to protect public health
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Certification Service -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-200 p-6 text-center">
                <div class="w-16 h-16 bg-navy rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Certification</h3>
                <p class="text-gray-600">Obtain official certifications for food and drug products to ensure compliance with national standards.</p>
            </div>

            <!-- Lab Testing Service -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-200 p-6 text-center">
                <div class="w-16 h-16 bg-navy rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Lab Testing</h3>
                <p class="text-gray-600">Advanced laboratory testing services for food safety, drug quality, and cosmetic product analysis.</p>
            </div>

            <!-- Food Registration Service -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-200 p-6 text-center">
                <div class="w-16 h-16 bg-navy rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Food Registration</h3>
                <p class="text-gray-600">Register your food products and obtain necessary permits for distribution and sale.</p>
            </div>

            <!-- Complaints Service -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-200 p-6 text-center">
                <div class="w-16 h-16 bg-navy rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Complaints</h3>
                <p class="text-gray-600">Report violations, unsafe products, or file complaints regarding food and drug safety issues.</p>
            </div>
        </div>
    </div>
</section>
@endsection
