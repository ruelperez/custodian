<div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="waste_delete_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel" style="margin-left: 35%;">Item Condition</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <div class="spinner-border spin" wire:loading wire:target="deploy" style="margin-left:45%;">
                    <span class="visually-hidden">Loading...</span>
                </div>
                @if(session()->has('good'))
                    <div style="text-align: center;">
                        <i class="fa-sharp fa-solid fa-circle-check" style="color: green; font-size: 40px;"></i>
                    </div>
                @elseif(session()->has('bad'))
                    Failed to Remove
                @else
                    <div wire:loading.remove style="margin-left: 15%;">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="item_condition" value="good">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Good
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="item_condition" value="defected">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Defected
                            </label>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" wire:click="deploy" wire:loading.attr="disabled" style="width: 25%;">Remove</button>
            </div>
        </div>
    </div>
</div>
