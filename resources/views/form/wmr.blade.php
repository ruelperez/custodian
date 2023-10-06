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
        @php $n++; @endphp
    @endforeach
</table>
