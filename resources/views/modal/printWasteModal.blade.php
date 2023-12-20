<div wire:ignore.self class="modal fade" id="printWasteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Waste Material Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Click "Print" to proceed.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeMove">Cancel
                <button type="submit" class="btn btn-primary" onclick="location.href = '/Dashboard/request-pdf/wmr-form/{{$receiver_name}}';" style="width: 30%;" wire:click="print">Print</button>
            </div>
        </div>
    </div>
</div>
