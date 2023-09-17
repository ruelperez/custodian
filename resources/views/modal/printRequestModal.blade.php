<div wire:ignore.self class="modal fade" id="printRequestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Request Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                All the data you moved will be transferred to the purchase request. Click print to proceed.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeMove">Cancel</button>
                <button type="submit" class="btn btn-primary" onclick="location.href = '/Dashboard/request-pdf/{{$receiver_name}}';" wire:click="clickPrint" style="width: 30%;">Print</button>
            </div>
        </div>
    </div>
</div>
