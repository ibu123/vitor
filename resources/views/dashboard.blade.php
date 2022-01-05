<x-app-layout>
    @push('css')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('datatables-plugins/buttons/css/buttons.bootstrap4.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('datatables-plugins/responsive/css/responsive.bootstrap4.min.css') }}" />
        <link href="{{ asset('css/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="container  p-5">
                    <table id="blogs__tbl" class="table table-bordered table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Blog Title</th>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="{{ asset('js/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/datatables/js/dataTables.bootstrap4.min.js') }}"></script>

    @endpush
    @section('js')
    <script>
        $('#blogs__tbl').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            search: {
                regex: true
            },
            ajax: "{{ route('blogs') }}",
            columns: [
                {data: 'title', name: 'title', defaultContent:'Guest User'},
                {data: 'description', name: 'description'},
                {data: 'created_at', name: 'created_at'},

            ]
        });

    </script>
    @endsection
</x-app-layout>
