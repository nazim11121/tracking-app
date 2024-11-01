<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mange') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="bg-white col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('manage.store')}}" method="post" encrenctype="multipart/form-data">
                            @csrf
                            <lable>Input Image:</lable>
                            <input type="file" class="form-control" name="file">
                            <lable>Input Account Number:</lable>
                            <input type="text" class="form-control" name="account_number">
                            <button type="submit" class="btn btn-primary mt-2" onclick="confirmSubmit()">Submit</button>
                        </form> 
                    </div>
                </div>   
            </div>
        </div>
    </div>
    <script>
        function confirmSubmit() {
            return confirm('Are you sure you want to submit this form?');
        }
    </script>
</x-app-layout>
