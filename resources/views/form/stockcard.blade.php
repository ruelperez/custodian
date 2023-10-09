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
            <h4>STOCK CARD</h4>
        </td>
    </tr>
</table>
<table style="width: 100%; text-align: center;border: 1px solid; border-collapse: collapse;">
    <tr style="border: 1px solid;">
        <td colspan="3" rowspan="3" style="border: 1px solid; text-align: left;">
            <b>Item: {{ucwords($item)}}</b>
        </td>
        <td colspan="2" rowspan="2" style="border: 1px solid;text-align: left;">
            <b>Description:</b>
        </td>
        <td colspan="2" style="border: 1px solid; text-align: left;">
            <b>Stock No.:</b>
        </td>
    </tr>
    <tr style="border: 1px solid;">
        <td colspan="2" style="border: 1px solid; text-align: left;">
            <b>Re-order Point:</b>
        </td>
    </tr>
    <tr style="border: 1px solid;">
        <td colspan="2" style="border: 1px solid;">
            <b>Issuance</b>
        </td>
        <td style="border: 1px solid;">
            <b>Balance</b>
        </td>
        <td rowspan="2" style="border: 1px solid;">
            <b>No. of Days to Consume</b>
        </td>
    </tr>
    <tr style="text-align: center;">
        <td style="border: 1px solid;">
            <b>Date</b>
        </td>
        <td style="border: 1px solid;">
            <b>Reference</b>
        </td>
        <td style="border: 1px solid;">
            <b>Receipt Qty</b>
        </td>
        <td style="border: 1px solid;">
            <b>Qty</b>
        </td>
        <td style="border: 1px solid; width: 26%;">
            <b>Office</b>
        </td>
        <td style="border: 1px solid;">
            <b>Quantity</b>
        </td>

    </tr>
    @foreach($stockcard_data as $data)
        <tr>
            <td style="border: 1px solid;">
                {{ $data->created_at}}
            </td>
            <td style="border: 1px solid;">

            </td>
            <td style="border: 1px solid;">
                {{$data->receiptQty}}
            </td>
            <td style="border: 1px solid;">
                {{$data->quantity}}
            </td>
            <td style="border: 1px solid;">
                {{ucwords($data->receiver)}}
            </td>
            <td style="border: 1px solid;">
                {{$data->receiptQty - $data->quantity}}
            </td>
            <td style="border: 1px solid;">

            </td>

        </tr>
    @endforeach
</table>
