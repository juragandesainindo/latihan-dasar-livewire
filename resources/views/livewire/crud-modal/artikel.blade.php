<div>

    {{-- https://www.nicesnippets.com/blog/laravel-livewire-crud-with-bootstrap-modal-example --}}

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('livewire.crud-modal.create')

                <div class="card mt-3">
                    <div class="card-header">CRUD Modal</div>

                    <div class="card-body">
                        @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <table class="table">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Phone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($artikel as $item)

                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->desc }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('js')
    <script type="text/javascript">
        window.livewire.on('artikelStore',()=> {
            $('#exampleModal').modal('hide');
        });
    </script>
    @endpush


</div>