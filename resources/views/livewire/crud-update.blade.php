<div>
    <form wire:submit.prevent='update'>
        <input type="hidden" wire:model="contactId">
        <div class="form-group mb-2">
            <div class="row">
                <div class="col-6">
                    <input type="text" wire:model="name" name="name" class="form-control @error('name') is-invalid @enderror
                    " placeholder="name" autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-6">
                    <input type="text" wire:model="phone" name="phone"
                        class="form-control @error('phone') is-invalid @enderror" placeholder="phone">
                    @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-warning btn-sm">Update</button>
    </form>
</div>