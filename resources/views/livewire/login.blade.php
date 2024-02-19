<div>
    <div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="login_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;">Admin Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submit">
                        @if(session()->has('loginFailed'))
                            <div class="alert alert-danger" style="width: 100%; ">
                                {{ session('loginFailed') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Username" wire:model="username" required style="width: 70%; margin-left: 15%;">
                        </div>
                        <div class="mb-3" style="display: flex">
                            <input @if($eye == 0) type="password" @else type="text" @endif  class="form-control" placeholder="Password" wire:model="password" required style="width: 70%; margin-left: 15%;">
                            @if($eye == 0)
                                <i class="fa-regular fa-eye-slash" style="font-size: 18px; margin-left: 2%;margin-top: 2%;" wire:click="clickEye(1)"></i>
                            @else
                                <i class="fa-solid fa-eye" style="font-size: 18px; margin-left: 2%;margin-top: 2%;" wire:click="clickEye(0)"></i>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%;">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
