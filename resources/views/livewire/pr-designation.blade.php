<div style="width: 30%; height: 275px; border: solid black 1px; text-align: center; margin-right: 3%; padding-top: 1%;">
    <b>Purchase Request </b>
    <div style="display: flex; margin-top: 5%;">
        <div style="text-align: left; padding-left: 5%;">
            <label>Requested By:</label>
            <label style="margin-top: 67%;">Approved By:</label>
        </div>

        <div style="text-align: right; padding-right: 5%;">
            <input type="text" wire:model="requestName" placeholder="Printed Name" @if($pr_btn === "update") disabled @endif>
            <input style="margin-top: 4%;" type="text" wire:model="requestDesignation" placeholder="Designation" @if($pr_btn === "update") disabled @endif>
            <input style="margin-top: 12%;" type="text" wire:model="approvedName" placeholder="Printed Name" @if($pr_btn === "update") disabled @endif>
            <input style="margin-top: 4%;" type="text" wire:model="approvedDesignation" placeholder="Designation" @if($pr_btn === "update") disabled @endif>
        </div>
    </div>
    @if($pr_btn === "submit")
        <div style="width: 50%; cursor: pointer;" class="bg-primary text-white mx-auto mt-3" wire:click="prSubmit" >
            SUBMIT
        </div>
    @elseif($pr_btn === "update")
        <div style="width: 50%; cursor: pointer;" class="bg-warning mx-auto mt-3 text-white" wire:click="prBtn('edit')">
            EDIT
        </div>
    @elseif($pr_btn === "edit")
        <div style="width: 50%; cursor: pointer;" class="bg-success mx-auto mt-3 text-white" wire:click="prBtn('update')">
            UPDATE
        </div>
    @endif

</div>
