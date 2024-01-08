<div>
    <div style="display: flex; margin-top: 2%;">
        @livewire('pr-designation')
        <div style="width: 30%; height: 267px; margin-right: 3%; text-align: center; border: solid black 1px; padding-top: 1%;">
            <b>Purchase Order</b>
            <div style="display: flex; margin-top: 3%;">
                <div style="text-align: left; padding-left: 5%;">
                    <label>Name of School Principal:</label>
                </div>
                <div style="text-align: right; padding-right: 5%;">
                    <input type="text" wire:model="principal" placeholder="Name of Principal">
                </div>
            </div>
            <div style="width: 50%; margin-top: 37%;" class="bg-warning mx-auto">
                EDIT
            </div>
        </div>
        <div style="width: 30%; height: 200px; border: solid black 1px; text-align: center; padding-top: 1%;">
            <b>ICS Form</b>
            <div style="display: flex; margin-top: 3%;">
                <div style="text-align: left; padding-left: 5%;">
                    <label>Requested By:</label>
                    <label style="margin-top: 12%;">Approved By:</label>
                    <label style="margin-top: 12%;">Designation:</label>
                    <label style="margin-top: 12%;">Designation:</label>
                </div>
                <div style="text-align: right; padding-right: 5%;">
                    <input type="text" wire:model="requestedBy">
                    <input style="margin-top: 4%;" type="text" wire:model="approvedBy">
                    <input style="margin-top: 4%;" type="text" wire:model="designation1">
                    <input style="margin-top: 4%;" type="text" wire:model="designation2">
                </div>
            </div>
        </div>
    </div>
    <div style="display: flex; margin-top: 2%;">
        <div style="width: 30%; height: 200px; border: solid black 1px;margin-left: 16%; margin-right: 3%; text-align: center;padding-top: 1%;">
            <b>PAR Form</b>
        </div>
        <div style="width: 30%; height: 200px; border: solid black 1px; text-align: center; padding-top: 1%;">
            <b>WMR Form</b>
        </div>
    </div>

</div>
