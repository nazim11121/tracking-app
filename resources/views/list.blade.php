<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white col-12">

                    <table class="table table-border">
                        <thead>
                            <tr>
                                <td>SL</td>
                                <td>Donor Name</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key=>$value)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$value->user->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</x-app-layout>
