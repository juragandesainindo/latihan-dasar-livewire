<div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">CRUD LIVEWIRE</div>

                    <div class="card-body">
                        @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if ($statusContact)
                        <livewire:crud-update></livewire:crud-update>
                        @else
                        <livewire:crud-create></livewire:crud-create>
                        @endif

                        <hr>

                        <div class="row">
                            <div class="col">
                                <select wire:model="paginate" class="form-select form-select-sm w-auto">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" wire:model="search" class="form-control form-control-sm"
                                    placeholder="Search">
                            </div>
                        </div>


                        <hr>

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
                                @foreach ($contact as $item)

                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <button wire:click="getContact({{ $item->id }})"
                                            class="btn btn-info btn-sm">Edit</button>
                                        <button wire:click="destroy({{ $item->id }})"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $contact->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>