<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if (session('success'))
        <div class="alert alert-success text-center mt-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-12">
                <a href="{{route('apply.list')}}" class="btn btn-primary mb-2">View List</a>
                @if(Auth::id()==1)
                    <a href="{{route('manage.create')}}" class="btn btn-success mb-2">Manage</a>
                @else
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
