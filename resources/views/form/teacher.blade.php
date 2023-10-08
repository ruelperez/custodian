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
            <h3>WASTE MATERIAL REPORT</h3>
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
            <b>ICS No: {{$ics}}</b>
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
    @foreach($teacher_data as $data)
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
                <b></b>
            </td>
            <td colspan="2" style="border: 1px solid;">
                <b>{{$data->item_name}}</b>
            </td>
            <td style="border: 1px solid;">
                <b>{{$data->serial}}</b>
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
<table style="width: 100%; border-collapse: collapse; border: 1px solid;">
    <tr>
        <td rowspan="3" style="width: 50%; border: 1px solid;">
            <p>Received from:<p/>
            <p style="text-align: center"><b><u>MARIBETH B. LASTROLLO</u></b><br>Signature Over Printed Name</p><br>
            <p style="text-align: center"><b><u>Teacher III/Supply Officer-Supply Office</u></b><br>Position/Office</p>
        </td>
        <td style="border: 1px solid;">
            Received by:
        </td>
    </tr>
    <tr>
        <td style="border: 1px solid;">
            Signature Over Printed Name
        </td>
    </tr>
    <tr>
        <td style="border: 1px solid;">
            Position/Office <br> Date:
        </td>
    </tr>
</table>
