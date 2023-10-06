<div wire:ignore.self class="modal fade" id="printRequestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Request Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                All the data you moved will be transferred to the purchase request. You can just print the data at Purchase Request page.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeRequestMove">Cancel</button>
                <button type="submit" class="btn btn-primary" wire:click="clickPrint" style="width: 30%;" onclick="clickRequestProceed()">Proceed</button>
            </div>
        </div>
    </div>
</div>
