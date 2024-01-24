<table style="text-align: center; width: 100%;">
    <tr>
        <td>
            <img src="{{public_path('image/header.png')}}" width="700">
        </td>
    </tr>
</table>
<table style="text-align: center; width: 100%;">
    <tr>
        <td>
            <h3>INVENTORY CUSTODIAN SLIP</h3>
            <h4>Entity Name: <u>TANDAAY HIGH SCHOOL</u></h4>
        </td>
    </tr>
    <tr style="text-align: left;">
        <td>
            <b>Fund Cluster: _______________</b>
        </td>
    </tr>
    <tr style="text-align: left;">
        <td>
            <b>ICS No: {{$icsNum}}</b>
        </td>
    </tr>
</table>
<table style="text-align: center; width: 100%; border-collapse: collapse; border: 1px solid;">
    <tr style="text-align: center;">
        <td style="border: 1px solid;">
            <b>Qty</b>
        </td>
        <td style="border: 1px solid;">
            <b>Unit</b>
        </td>
        <td style="border: 1px solid;">
            <b>Unit Cost</b>
        </td>
        <td style="border: 1px solid;">
            <b>Total Cost</b>
        </td>
        <td colspan="2" style="border: 1px solid;">
            <b>Description</b>
        </td>
        <td style="border: 1px solid;">
            <b>Inventory No.</b>
        </td>
        <td style="border: 1px solid;">
            <b>Est. Useful Life</b>
        </td>
    </tr>
    @foreach($ics_data as $data)
        <tr style="text-align: center;">
            <td style="border: 1px solid;">
                <b>{{$data->quantity}}</b>
            </td>
            <td style="border: 1px solid;">
                <b>{{$data->unit}}</b>
            </td>
            <td style="border: 1px solid;">
                <b>{{$data->unit_cost}}</b>
            </td>
            <td style="border: 1px solid;">
                <b>{{$data->quantity * $data->unit_cost}}</b>
            </td>
            <td colspan="2" style="border: 1px solid;">
                <b>{{ucwords($data->item_name)}}</b>
            </td>
            <td style="border: 1px solid;">
                <b>ICS {{$data->serial}}</b>
            </td>
            <td style="border: 1px solid;">
                <b></b>
            </td>
        </tr>
    @endforeach
</table>
<table style="text-align: left; width: 100%; border-collapse: collapse; border: 1px solid;">
    <tr>
        <td>
            <b style="font-size: 14px;">Accountability over Semi-expendable Property, Inventory Custodian Slip (ICS) shall be issued to end-user of semi-expendable
                property to establish accountability. Accountability shall be extinguished upon return of the item to Property and Supply
                Section (PSS) or in case of loss, upon approval of the relief from property accountability.</b>
        </td>
    </tr>
</table>
<table style="width: 100%; border-collapse: collapse; border: 1px solid; text-align: center;">
    <tr>
        <td rowspan="3" style="width: 50%; border: 1px solid;">
            <p><b>Received from:</b><p/>
            <p style="text-align: center"><b><u>{{strtoupper($desig->printedName)}}</u></b><br>Signature Over Printed Name</p><br>
            <p style="text-align: center"><b><u>{{strtoupper($desig->position)}}</u></b><br>Position/Office</p>
        </td>
        <td>
            <p><b>Received by:</b></p> {{ucwords($receivedBy)}}
        </td>
    </tr>
    <tr>
        <td style="border: 1px solid;">
            Signature Over Printed Name
            <p style="margin-top: 6%;">{{ucwords($position2)}}</p>
        </td>
    </tr>
    <tr>
        <td style="border: 1px solid; padding-bottom: 55px;">
            Position/Office
        </td>
    </tr>
</table>
