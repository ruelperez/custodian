
<table style="text-align: center; width: 100%;">
    <tr>
        <td>
            <h4>PURCHASE ORDER</h4>
        </td>
    </tr>
</table>
<table style="width: 100%; border-collapse: collapse; border: 1px solid; padding-bottom: 1px;">
    <tr>
        <td colspan="4" style=" border: 1px solid;">
            <h5 style="margin-top: 1px;">Supplier:</h5>
            <h5>Address:</h5>
            <h5>TIN:</h5>
        </td>
        <td colspan="3">
            <h5 style="margin-top: 1px;">P.O No:</h5>
            <h5>Date:</h5>
            <h5>Mode of Procurement:</h5>
        </td>
    </tr>
    <tr>
        <td colspan="7" style="border: solid black 1px">
            <p>Gentlemen</p>
            <p style="margin-left: 10%;">Please furnish this office the following articles subject to the terms and conditions contained herein:</p>
        </td>
    </tr>
    <tr>
        <td colspan="4" style=" border: 1px solid; border-bottom: none; text-align: left;">
            <h5 style="margin-top: 1px;">Place of Delivery:</h5>
            <h5>Date of Delivery:</h5>
        </td>
        <td colspan="3" style="text-align: left">
            <h5 style="margin-top: 1px;">Delivery Term:</h5>
            <h5>Payment Term:</h5>
        </td>
    </tr>
    <tr style="text-align: center">
        <td style="border: 1px solid;">
            <h5>Stock/ <br> Property No.</h5>
        </td>
        <td style="border: 1px solid;">
            <h5>Unit</h5>
        </td>
        <td colspan="2" style="border: 1px solid;">
            <h5>Description</h5>
        </td>
        <td style="border: 1px solid;">
            <h5>Qunatity</h5>
        </td>
        <td style="border: 1px solid;">
            <h5>Unit Card</h5>
        </td>
        <td style="border: 1px solid;">
            <h5>Amount</h5>
        </td>
    </tr>
    @php $n=1; $tot=0; @endphp
    @foreach($request_data as $data)
        <tr style="text-align: center">
            <td style="border: 1px solid;">
                <p>{{$n}}</p>
            </td>
            <td style="border: 1px solid;">
                <p>{{$data->unit}}</p>
            </td>
            <td colspan="2" style="border: 1px solid;">
                <p>{{ucwords($data->item_name)}}</p>
            </td>
            <td style="border: 1px solid;">
                <p>{{$data->quantity}}</p>
            </td>
            <td style="border: 1px solid;">
                <p>{{$data->unit_cost}}</p>
            </td>
            <td style="border: 1px solid;">
                <p>{{$data->total_cost}}</p>
            </td>
        </tr>
        @php $n++; $tot += $data->total_cost; @endphp
    @endforeach
    <tr style="text-align: center">
        <td style="border: 1px solid;">

        </td>
        <td style="border: 1px solid;">

        </td>
        <td colspan="2" style="border: 1px solid;">

        </td>
        <td style="border: 1px solid;">

        </td>
        <td style="border: 1px solid; text-align: right">
            <p>TOTAL</p>
        </td>
        <td style="border: 1px solid;">
            {{$tot}}
        </td>
    </tr>
    <tr>
        <td colspan="7" style="border: 1px solid;">
            <p>{{$totalInWords}}</p>
        </td>
    </tr>
</table>





