<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="deploy_confirmation">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <div class="spinner-border spin" wire:loading wire:target="deploy" style="margin-left:45%;">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div wire:loading.remove style="text-align: center;">
                    @if($hh == 0)
                    Are you sure to deploy item?
                    @elseif($hh == 1)
                        @if(session()->has('good'))
                            <i class="fa-sharp fa-solid fa-circle-check" style="color: green; font-size: 40px;"></i>
                        @elseif(session()->has('bad'))
                            Failed to Deploy
                        @endif
                    @endif
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" wire:click="deploy" wire:loading.attr="disabled" style="width: 25%;" @if(session()->has('good')) disabled @endif>Deploy</button>
            </div>
        </div>
    </div>
</div>
