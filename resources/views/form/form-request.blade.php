
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
            <h4>PURCHASE {{strtoupper($request)}}</h4>
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
        <td colspan="2" style="border: 1px solid; width: 25%;">

        </td>
        <td colspan="2" style="border: 1px solid;text-align: left;">
            <b>PR No.: {{$pr_num}}</b>
        </td>
        <td colspan="2" style="border: 1px solid; width: 25%;text-align: left;">
            <b>Date: {{$date}}</b>
        </td>
    </tr>
    <tr style="text-align: right; border: 1px solid;">
        <td colspan="2" style="border: 1px solid;width: 25%;">

        </td>
        <td colspan="2" style="border: 1px solid;text-align: left;">
            <b>Responsibilty Center Code:</b>
        </td>
        <td colspan="2" style="border: 1px solid;width: 25%;">

        </td>
    </tr>
    <tr style="border: 1px solid;">
        <td style="border: 1px solid; width: 15%;">
            <b>Stock Property No.</b>
        </td>
        <td style="border: 1px solid;">
            <b>Unit</b>
        </td>
        <td style="border: 1px solid; width: 40%;">
            <b>Item Description</b>
        </td>
        <td style="border: 1px solid; width: 10%;">
            <b>Quantity</b>
        </td>
        <td style="border: 1px solid;">
            <b>Unit Cost</b>
        </td>
        <td style="border: 1px solid; width: 12%;">
            <b>Total Cost</b>
        </td>
    </tr>
    @php $h=0; @endphp
    @foreach($request_data as $data)
    <tr style="border: 1px solid;">
        <td style="border: 1px solid; width: 15%;">

        </td>
        <td style="border: 1px solid;">
            {{$data->unit}}
        </td>
        <td style="border: 1px solid; width: 40%;">
            {{$data->item_name}}
        </td>
        <td style="border: 1px solid; width: 10%;">
            {{$data->quantity}}
        </td>
        <td style="border: 1px solid;">
            {{$data->unit_cost}}
        </td>
        <td style="border: 1px solid; width: 12%;">
            {{$data->total_cost}}
        </td>
    </tr>
        @php $h+=$data->total_cost; @endphp
    @endforeach
    <tr style="border: 1px solid;">
        <td style="border: 1px solid; width: 15%;">

        </td>
        <td style="border: 1px solid;">

        </td>
        <td style="border: 1px solid; width: 40%;">

        </td>
        <td style="border: 1px solid; width: 10%;">

        </td>
        <td colspan="2" style="border: 1px solid; text-align: left">
            <b>TOTAL: {{$h}}</b>
        </td>
    </tr>
    <tr style="border: 1px solid;">
        <td colspan="6" style="width: 100%; text-align: left; height: 10%; padding-left: 1%;">
            <b>Purpose: </b>{{ucwords($purpose)}}
        </td>
    </tr>
</table>

<table style="width: 100%; border: 1px solid; padding-left: 1%; padding-right: 1%;">
    <tr>
        <td style="padding-left: 33%;">Requested By:</td>
        <td style="padding-right: 55%;">Approved By: </td>
    </tr>
    <tr>
        <td>Signature: _________________________</td>
        <td style="text-align: right">_________________________</td>
    </tr>
    <tr>
        <td>Printed Name: {{ucwords($name1)}}</td>
        <td style="width: 30%; text-align: center;">{{ucwords($name2)}}</td>
    </tr>
    <tr>
        <td>Designation: {{ucwords($designation1)}}</td>
        <td style="text-align: center; width: 30%;">{{$designation2}}</td>
    </tr>
</table>




