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
            <h4>PROPERTY ACKNOWLEDGMENT RECEIPT</h4>
        </td>
    </tr>
</table>
<table style="width: 100%; text-align: left;">
    <tr>
        <td>
            <b>Entity Name:</b> <u>Tandaay High School</u>
        </td>
    </tr>
    <tr>
        <td>
            <b>Fund Cluster: _________________</b>
        </td>
    </tr>
</table>
<table style="width: 100%; text-align: right;">
    <tr>
        <td>
            <b>PAR No. {{$par_num}}</b>
        </td>
    </tr>
</table>
<table style="width: 100%; text-align: center;border: 1px solid; border-collapse: collapse;">
    <tr>
        <td style="border: 1px solid;">
            <b>Qty</b>
        </td>
        <td style="border: 1px solid;">
            <b>Unit</b>
        </td>
        <td style="border: 1px solid;">
            <b>Description</b>
        </td>
        <td style="border: 1px solid;">
            <b>Property Number</b>
        </td>
        <td style="border: 1px solid;">
            <b>Date Acquired</b>
        </td>
        <td style="border: 1px solid;">
            <b>Amount</b>
        </td>
    </tr>
    @foreach($request_data as $data)
        <tr>
            <td style="border: 1px solid;">
                {{$data->quantity}}
            </td>
            <td style="border: 1px solid;">
                {{$data->unity}}
            </td>
            <td style="border: 1px solid;">
                {{$data->item_name}}
            </td>
            <td style="border: 1px solid;">
            </td>
            <td style="border: 1px solid;">
                {{$data->created_at->format('m-d-Y')}}
            </td>
            <td style="border: 1px solid;">

            </td>
        </tr>
    @endforeach
</table>
<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="border: 1px solid; border-bottom: none; border-top: none;">
            <b>Received by:</b>
        </td>
        <td style="border: 1px solid; border-bottom: none; border-top: none;">
            <b>Issued by:</b>
        </td>
    </tr>
    <tr>
        <td style="border: 1px solid; border-top: none; ">

        </td>
        <td style="border: 1px solid; border-top: none; text-align: center; padding-top: 1%;">
            <b>@if($desig != null) {{strtoupper($desig->printedName)}} @endif</b>
        </td>
    </tr>
    <tr style="text-align: center;">
        <td style="border: 1px solid; border-bottom: none; border-top: none;">
            Signature Over Printed Name of End User
        </td>
        <td style="border: 1px solid; border-bottom: none; border-top: none;">
            Signature Over Printed Name of Supply Officer and/or Property Custodian
        </td>
    </tr>
    <tr style="text-align: center;">
        <td style="border: 1px solid; border-top: none; ">

        </td>
        <td style="border: 1px solid; border-top: none; text-align: center; padding-top: 1%;">
            <b>@if($desig != null) {{strtoupper($desig->position)}} @endif</b>
        </td>
    </tr>
    <tr style="text-align: center;">
        <td style="border: 1px solid; border-bottom: none; border-top: none;">
            Position/Office
        </td>
        <td style="border: 1px solid; border-bottom: none; border-top: none;">
            Position/Office
        </td>
    </tr>
    <tr style="text-align: left;">
        <td style="border: 1px solid; border-top: none; padding-top: 1%;">
            Date:
        </td>
        <td style="border: 1px solid; border-top: none; padding-top: 1%;">
            Date:
        </td>
    </tr>
</table>
