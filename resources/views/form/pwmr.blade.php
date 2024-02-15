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
            <h4>WASTE MATERIAL REPORT</h4>
        </td>
    </tr>
    <tr style="text-align: right;">
        <td>
            <b style="font-size: 13px;">Fund Cluster: _______________</b>
        </td>
    </tr>
</table>
<table style="width: 100%; text-align: center;border: 1px solid; border-collapse: collapse;">
    <tr>
        <td colspan="5" style="border: 1px solid; text-align: left">
            Place of Storage:
        </td>
        <td colspan="3" style="border: 1px solid; text-align: left">
            Date: {{$date}}
        </td>
    </tr>
    <tr>
        <td colspan="8" style="text-align: left">
            <b>ITEM FOR DISPOSAL</b>
        </td>
    </tr>
    <tr style="border: 1px solid;">
        <td rowspan="3" style="border: 1px solid;">
            Item
        </td>
        <td rowspan="3" style="border: 1px solid;">
            Qty
        </td>
        <td rowspan="3" style="border: 1px solid;">
            Unit
        </td>
        <td colspan="2" rowspan="3" style="border: 1px solid;">
            Description
        </td>
        <td colspan="3" style="border: 1px solid;">
            Record of Sales
        </td>
    </tr>
    <tr>
        <td colspan="3" style="border: 1px solid;">
            Official Receipt
        </td>
    </tr>
    <tr>
        <td style="border: 1px solid;">
            No.
        </td>
        <td style="border: 1px solid;">
            Date
        </td>
        <td style="border: 1px solid;">
            Amount
        </td>
    </tr>
    @php $n = 1; @endphp
    @foreach($request_data as $data)
        <tr>
            <td style="border: 1px solid;">
                {{$n}}
            </td>
            <td style="border: 1px solid;">
                {{$data->quantity}}
            </td>
            <td style="border: 1px solid;">
                {{$data->unit}}
            </td>
            <td colspan="2" style="border: 1px solid;">
                {{$data->item_name}}
            </td>
            <td style="border: 1px solid;">

            </td>
            <td style="border: 1px solid;">

            </td>
            <td style="border: 1px solid;">

            </td>
        </tr>
        @php $n++; @endphp
    @endforeach
    <tr>
        <td style="border: 1px solid;">

        </td>
        <td style="border: 1px solid;">

        </td>
        <td style="border: 1px solid;">

        </td>
        <td colspan="2" style="border: 1px solid;">
            TOTAL
        </td>
        <td style="border: 1px solid;">

        </td>
        <td style="border: 1px solid;">

        </td>
        <td style="border: 1px solid;">

        </td>
    </tr>
</table>
<table style="width: 100%; border: 1px solid; border-collapse: collapse;">
    <tr>
        <td style="width: 50%; padding-bottom: 1%; border: 1px solid; border-right: none;">
            Certified Correct:
            <br><p style="text-align: center"><b><u>@if($desig != null) {{ucwords($desig->nameOfSupply)}} @endif</u></b><br>Signature over Printed Name of Supply <br> and/or  Property Custodian</p>
        </td>
        <td style="width: 50%; padding-bottom: 1%; border: 1px solid; border-left: none;">
            Disposal Approved :
            <br><p style="text-align: center">________________________________<br>Signature over Printed Name of Head <br> of Agency/Entity or his/her <br> Authorized Representative</p>
        </td>
    </tr>
</table>
<table style="width: 100%; text-align: left; border: 1px solid; border-collapse: collapse;">
    <tr>
        <td style="text-align: center">
            CERTIFICATE OF INSPECTION
        </td>
    </tr>
</table>
<table style="width: 100%; border: 1px solid; border-collapse: collapse;">
    <tr>
        <td style="padding-left: 5%; padding-top: 1%;">
            I hereby certify that the property enumerated above was disposed of as follows:
        </td>
    </tr>
    <tr>
        <td style="padding-left: 15%; padding-top: 1%; padding-bottom: 2%;">
            Item ____________ Destroyed <br> Item ____________ Sold at Private Sale <br> Item ____________ Sold at public auction
            <br> Item ____________ Transferred without cost to <u>__(Name of the Agency/Entity)__</u>
        </td>
    </tr>
</table>
<table style="width: 100%; border: 1px solid; border-collapse: collapse;">
    <tr>
        <td style="border: 1px solid; width: 50%; padding-bottom: 1%;">
            Certified Correct:
            <br><p style="text-align: center">_________________________<br>Signature over Printed Name <br> of Inspection Officer</p>
        </td>
        <td style="border: 1px solid; width: 50%; padding-bottom: 1%;">
            Witness to Disposal:
            <br><p style="text-align: center">_________________________<br>Signature over Printed Name <br> of Witness</p>
        </td>
    </tr>
</table>


