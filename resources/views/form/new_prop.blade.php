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
            <h4>PROPERTY CARD</h4>
        </td>
    </tr>
</table>
<table style="width: 100%; text-align: center;border: 1px solid; border-collapse: collapse;">
    <tr style="border: 1px solid; text-align: left">
        <td colspan="5"  style="border: 1px solid; padding-bottom: 35px;">
            <b>Property, Plant and Equipment: {{strtoupper($item_name)}}</b>
        </td>
        <td colspan="2" rowspan="2"  style="border: 1px solid; text-align: left;padding-top: 0px;">
            <b>Property No. {{$serial}}</b>
        </td>
    </tr>
    <tr style="border: 1px solid;">
        <td colspan="5" style="border: 1px solid; text-align: left; padding-bottom: 35px;">
            <b>Description:</b>
        </td>
    </tr>
    <tr style="border: 1px solid;">
        <td style="border: 1px solid;">
            <b>Date</b>
        </td>
        <td style="border: 1px solid;">
            <b>Reference</b>
        </td>
        <td style="border: 1px solid;">
            <b>Receipt</b>
        </td>
        <td style="border: 1px solid;" colspan="3">
            <b>Transfer/Disposal</b>
        </td>
        <td style="border: 1px solid;" rowspan="2">
            <b>Balance Qty.</b>
        </td>
    </tr>
    <tr style="border: 1px solid;">
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"><b>Qty</b></td>
        <td style="border: 1px solid;">
            <b>Qty.</b>
        </td>
        <td colspan="2" style="border: 1px solid;">
            <b>Office/Officer</b>
        </td>
    </tr>
    @foreach($data as $datas)
        <tr style="border: 1px solid;">
            <td style="border: 1px solid;">
                {{$datas->created_at->format('M-d-Y')}}
            </td>
            <td style="border: 1px solid;">

            </td>
            <td style="border: 1px solid;">
                {{$datas->receiptQty}}
            </td>
            <td style="border: 1px solid;">
                {{$datas->quantity}}
            </td>
            <td colspan="2" style="border: 1px solid;">
                {{$datas->receiver}}
            </td>
            <td style="border: 1px solid;">
{{--                {{$datas->receiptQty - $datas->quantity}}--}}
            </td>
        </tr>
    @endforeach

</table>
