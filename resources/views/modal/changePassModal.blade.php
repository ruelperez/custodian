<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="changePassModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="text-align: left;">{{ucwords($username)}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                @if(session()->has('dataUpdated'))
                    <div class="alert alert-success" style="width: 77%; padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 1%; ">
                        {{ session('dataUpdated') }}
                    </div>
                @endif
                <form wire:submit.prevent="submitChangePassword">
                    <div class="mb-2" style="width: 70%; margin-left: 15%;">
                        <input type="password" class="form-control" placeholder="Current Password" wire:model="current" required>
                        @error('current') <span style="color: red">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="password" class="form-control" placeholder="New Password" wire:model="new" required>
                        @error('new') <span style="color: red">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3" style="width: 70%; margin-left: 15%;">
                        <input type="password" class="form-control" placeholder="Retype New Password" wire:model="retype" required>
                        @error('retype') <span style="color: red">{{ $message }}</span> @enderror
                    </div>
                        <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%;">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</div>
