<x-app-layout>
    <div class="container mx-auto px-4 bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
        <div class="max-w-md mx-auto">
            <div class="text-center">
                <h2 class="text-xl font-bold">Welcome, {{ Auth::user()->name }}</h2>
                <p>You are approved! 🎉</p>
            </div>
        </div>
    
</x-app-layout>