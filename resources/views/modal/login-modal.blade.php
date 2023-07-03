
<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="login_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;">Admin Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/login-process" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Password" name="password" required>
                    </div>
                        <button type="submit" class="btn btn-primary" style="width: 60%; margin-left: 20%;">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
