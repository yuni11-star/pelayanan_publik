@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Application Status Tracking</h1>
            <p class="text-xl text-gray-600">Track your BBPOM Pontianak application progress in real-time</p>
        </div>

        <!-- Search Section -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
            <div class="max-w-md mx-auto">
                <label for="application_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Enter Your Application ID
                </label>
                <div class="relative">
                    <input
                        type="text"
                        id="application_id"
                        name="application_id"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-navy focus:border-navy text-lg"
                        placeholder="e.g., APP-2024-00123"
                    >
                    <button
                        type="button"
                        class="absolute right-2 top-2 bg-navy text-white px-6 py-2 rounded-md hover:bg-blue-800 transition duration-200 font-medium"
                    >
                        Track Status
                    </button>
                </div>
                <p class="text-sm text-gray-500 mt-2">
                    Enter the Application ID provided when you submitted your request
                </p>
            </div>
        </div>

        <!-- Status Timeline -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Application Progress</h2>

            <!-- Horizontal Timeline for Desktop -->
            <div class="hidden md:block">
                <div class="flex items-center justify-between">
                    <!-- Step 1: Submitted -->
                    <div class="flex flex-col items-center flex-1">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Submitted</h3>
                        <p class="text-sm text-gray-600 text-center">Your application has been received</p>
                        <p class="text-xs text-gray-500 mt-1">Jan 15, 2024</p>
                    </div>

                    <!-- Connector Line -->
                    <div class="flex-1 h-0.5 bg-green-500 mx-4"></div>

                    <!-- Step 2: Verified -->
                    <div class="flex flex-col items-center flex-1">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Verified</h3>
                        <p class="text-sm text-gray-600 text-center">Documents have been verified</p>
                        <p class="text-xs text-gray-500 mt-1">Jan 16, 2024</p>
                    </div>

                    <!-- Connector Line -->
                    <div class="flex-1 h-0.5 bg-yellow-400 mx-4"></div>

                    <!-- Step 3: In-Review -->
                    <div class="flex flex-col items-center flex-1">
                        <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mb-4 animate-pulse">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">In-Review</h3>
                        <p class="text-sm text-gray-600 text-center">Application is being reviewed</p>
                        <p class="text-xs text-gray-500 mt-1">In Progress</p>
                    </div>

                    <!-- Connector Line -->
                    <div class="flex-1 h-0.5 bg-gray-300 mx-4"></div>

                    <!-- Step 4: Completed -->
                    <div class="flex flex-col items-center flex-1">
                        <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-500 mb-2">Completed</h3>
                        <p class="text-sm text-gray-500 text-center">Application processing complete</p>
                        <p class="text-xs text-gray-400 mt-1">Pending</p>
                    </div>
                </div>
            </div>

            <!-- Vertical Timeline for Mobile -->
            <div class="md:hidden">
                <div class="space-y-8">
                    <!-- Step 1: Submitted -->
                    <div class="flex items-start">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="w-0.5 h-16 bg-green-500"></div>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Submitted</h3>
                            <p class="text-sm text-gray-600 mb-1">Your application has been received</p>
                            <p class="text-xs text-gray-500">Jan 15, 2024</p>
                        </div>
                    </div>

                    <!-- Step 2: Verified -->
                    <div class="flex items-start">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="w-0.5 h-16 bg-green-500"></div>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Verified</h3>
                            <p class="text-sm text-gray-600 mb-1">Documents have been verified</p>
                            <p class="text-xs text-gray-500">Jan 16, 2024</p>
                        </div>
                    </div>

                    <!-- Step 3: In-Review -->
                    <div class="flex items-start">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mb-2 animate-pulse">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="w-0.5 h-16 bg-yellow-400"></div>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">In-Review</h3>
                            <p class="text-sm text-gray-600 mb-1">Application is being reviewed</p>
                            <p class="text-xs text-gray-500">In Progress</p>
                        </div>
                    </div>

                    <!-- Step 4: Completed -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center mb-2">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div class="w-0.5 h-0 bg-gray-300"></div>
                        <div class="ml-4 flex-1">
                            <h3 class="text-lg font-semibold text-gray-500 mb-1">Completed</h3>
                            <p class="text-sm text-gray-500 mb-1">Application processing complete</p>
                            <p class="text-xs text-gray-400">Pending</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Summary -->
            <div class="mt-12 bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Current Status Summary</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-600">2</div>
                        <div class="text-sm text-gray-600">Steps Completed</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-yellow-600">1</div>
                        <div class="text-sm text-gray-600">Step In Progress</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-400">1</div>
                        <div class="text-sm text-gray-600">Step Remaining</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
