<div>
    <div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="login_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;">@if($gt == 0) Admin Login @else Register @endif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($gt == 0)
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
                                <p class="text-center text-muted mt-3 mb-0">Have already an account? <u wire:click="reg" style="cursor: pointer;" class="fw-bold text-body">Register here</u></p>
                        </form>
                    @else
                        <form  wire:submit.prevent="submit_reg">
                            @csrf

                            @if(session()->has('loginFailed'))
                                <div class="alert alert-danger" style="width: 100%; ">
                                    {{ session('loginFailed') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Username" wire:model="username" required style="width: 70%; margin-left: 15%;">
                            </div>
                            @error('username') <span style="color: red; margin-left: 15%;">{{ $message }}</span> @enderror
                            <div class="mb-3" style="display: flex">
                                <input @if($eye == 0) type="password" @else type="text" @endif  class="form-control" placeholder="Password" wire:model="password" required style="width: 70%; margin-left: 15%;">
                                @if($eye == 0)
                                    <i class="fa-regular fa-eye-slash" style="font-size: 18px; margin-left: 2%;margin-top: 2%;" wire:click="clickEye(1)"></i>
                                @else
                                    <i class="fa-solid fa-eye" style="font-size: 18px; margin-left: 2%;margin-top: 2%;" wire:click="clickEye(0)"></i>
                                @endif
                            </div>
                            @error('password') <span style="color: red; margin-left: 15%;">{{ $message }}</span> @enderror
                            <div style="display: flex">
                                <input @if($eye == 0) type="password" @else type="text" @endif  class="form-control" placeholder="Confirm Password" wire:model="password_confirmation" required style="width: 70%; margin-left: 15%;">
                                @if($eye == 0)
                                    <i class="fa-regular fa-eye-slash" style="font-size: 18px; margin-left: 2%;margin-top: 2%;" wire:click="clickEyes(1)"></i>
                                @else
                                    <i class="fa-solid fa-eye" style="font-size: 18px; margin-left: 2%;margin-top: 2%;" wire:click="clickEyes(0)"></i>
                                @endif
                            </div>
                            @error('password_confirmation') <span class="mb-3" style="color: red;margin-left: 15%;">{{ $message }}</span> @enderror
                            <div class="mb-3">
                                <input class="form-control" wire:model="role" hidden>
                            </div>
                            @if($is_reg == 0)
                                <p style="color: red;margin-left: 15%;">The registration is disabled, Contact admin user to enable.</p>
                            @endif
                            <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%;" @if($is_reg == 0) disabled @endif>Register</button>
                            <p class="text-center text-muted mt-3 mb-0">Click here to <u wire:click="log" style="cursor: pointer;" class="fw-bold text-body">Login</u></p>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>

</div>
