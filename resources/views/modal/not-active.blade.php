<!-- Modal -->
<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="not_active">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Is this item ({{$stolenItem}}) stolen or lost?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="lost">LOST</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="stolen" >STOLEN</button>
            </div>
        </div>
    </div>
</div>
