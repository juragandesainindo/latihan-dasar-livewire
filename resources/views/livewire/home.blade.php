<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif


                        <a href="{{ route('crud-livewire') }}">
                            <span class="btn btn-primary">CRUD Livewire</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>