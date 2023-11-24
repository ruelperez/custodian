<div>
    <div style="display: flex; margin-top: 1%;">
        <div>
            <div style="display: flex;">
                <div style="width: 47%;background-color: #1E90FF; margin-right: 2%; color: white; padding-left: 3%;">
                    <h1>{{count($lack_item)}}</h1>
                    <h5>Total Items</h5>
                </div>
                <div style="width: 47%; background-color: #FFA500; color: white; padding-left: 3%;">
                    <h1>{{count($totalTeacher)}}</h1>
                    <h5>No. of Teacher/Staff</h5>
                </div>
            </div>
            <div style="width: 19%; margin-top: 1%;">
                <div class="dropdown" style="margin-top: 18%; margin-right: 13%;">

                    <div style="display: flex;">
                        <div>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Select Item Type
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="cursor: pointer">
                                <li><a class="dropdown-item" onclick="location.href = '/Dashboard/bar-graph/01/January/all';">All</a></li>
                                <li><a class="dropdown-item" onclick="location.href = '/Dashboard/bar-graph/01/January/consumable';">Consumable</a></li>
                                <li><a class="dropdown-item" onclick="location.href = '/Dashboard/bar-graph/01/January/non-consumable';">Non-Consumable</a></li>
                            </ul>
                        </div>
                        <div style="margin-left: 10%; margin-top: 2%;">
                            <h5 style=" padding-bottom: 10%;">{{ucwords($item_type)}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: flex; width: 100%;">
                <div class="map_canvas" style="margin-top: 1.5%; margin-right: 1.5%;">

                    <canvas id="myChart" height="500" style="width: 390%;"></canvas>
                </div>

            </div>
            <div style="display: flex; margin-left: 6%;">
                    <div class="dropdown" style="margin-top: 18%; margin-right: 13%;">
                        <h3 style=" padding-bottom: 10%;">{{$month_name}}</h3>
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Month
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="cursor: pointer">
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/01/January/{{$item_type}}';">January</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/02/February/{{$item_type}}';">February</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/03/March/{{$item_type}}';">March</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/04/April/{{$item_type}}';">April</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/05/May/{{$item_type}}';">May</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/06/June/{{$item_type}}';">June</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/07/July/{{$item_type}}';">July</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/08/August/{{$item_type}}';">August</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/09/September/{{$item_type}}';">September</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/10/October/{{$item_type}}';">October</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/11/November/{{$item_type}}';">November</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/12/December/{{$item_type}}';">December</a></li>
                        </ul>
                    </div>

                <div class="map_canvass" style="margin-top: 3%; margin-right: 1.5%;">
                    @if(count($pie_name) > 0)
                    <canvas id="myCharts" style="width: 140%;"></canvas>
                    @else
                        <h5 style="margin-top: 30%; ">No data posted for month of <u>{{$month_name}}.</u></h5>
                    @endif
                </div>

            </div>
        </div>
        <div style="margin-left: 3%;">
            <div style="width: 17%; height: 50px;">
                <table class="table table-hover" style="background-color: #FFC0CB;border-radius: 15px;">
                    <thead>
                    <tr>
                        <th>
                            Insufficient Item
                        </th>
                        <th>
                            Qty
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($lack_item) > 0)
                        @foreach($lack_item as $lack)
                            @if($lack->quantity <= 50)
                                <tr>
                                    <td>
                                        {{ucfirst($lack->item_name)}}
                                    </td>
                                    <td>
                                        {{$lack->quantity}}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2" style="text-align: center">
                                None
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Show Graph Data -->

<script src="{{ asset('js/chart.js') }}"></script>
{{--Bar Graph--}}
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($item_name) ?>,
            datasets: [{
                label: '',
                data: <?php echo json_encode($item_quantity); ?>,
                backgroundColor: [
                    'rgba(31, 58, 147, 1)',
                    'rgba(37, 116, 169, 1)',
                    'rgba(92, 151, 191, 1)',
                    'rgb(200, 247, 197)',
                    'rgb(77, 175, 124)',
                    'rgb(30, 130, 76)'
                ],
                borderColor: [
                    'rgba(31, 58, 147, 1)',
                    'rgba(37, 116, 169, 1)',
                    'rgba(92, 151, 191, 1)',
                    'rgb(200, 247, 197)',
                    'rgb(77, 175, 124)',
                    'rgb(30, 130, 76)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    max: 300,
                    min: 0,
                    ticks: {
                        stepSize: 50
                    }
                }
            },
            plugins: {
                title: {
                    display: false,
                    text: 'Custom Chart Title'
                },
                legend: {
                    display: false,
                }
            }
        }
    });

    // Pie Chart
    var ctxs = document.getElementById('myCharts').getContext('2d');
    var myCharts = new Chart(ctxs, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($pie_name) ?>,
            datasets: [{
                data: <?php echo json_encode($pie_qty); ?>,
                backgroundColor: [
                    'red',
                    'blue',
                    'green',
                    'yellow',
                    'Crimson',
                    'DarkOliveGreen',
                    'SpringGreen',
                    'CadetBlue',
                    'RosyBrown',
                    'Goldenrod',
                ]
            }]
        },
        options: {
            tooltips: {
                enabled: false, // Disable tooltips
            },
            plugins: {
                legend: {
                    display: false, // Disable legend
                },
                datalabels: {
                    color: '#fff',
                    formatter: function(context) {
                        return <?php echo json_encode($item_name)?>[context.dataIndex];
                    },
                },
            }
        }
    });

</script>
