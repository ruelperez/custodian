<div>
    <div style="display: flex; margin-top: 1%;">
        <div>
            <div style="display: flex;">
                <div style="width: 47%;background-color: #1E90FF; margin-right: 2%; color: white; padding-left: 3%;">
                    <h1>{{count($lack_item)}}</h1>
                    <h5>Total Product</h5>
                </div>
                <div style="width: 47%; background-color: #FFA500; color: white; padding-left: 3%;">
                    <h1>{{count($totalTeacher)}}</h1>
                    <h5>No. of Teacher/Staff</h5>
                </div>
            </div>
            <div style="display: flex; width: 100%;">
                <div class="map_canvas" style="margin-top: 3%; margin-right: 1.5%;">

                    <canvas id="myChart" height="400" style="width: 390%;"></canvas>
                </div>

            </div>
            <div style="display: flex; margin-left: 17%;">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Month
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/01';">January</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/02';">February</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/02';">March</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/02';">April</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/02';">May</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/02';">June</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/02';">July</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/02';">August</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/02';">September</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/02';">October</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/02';">November</a></li>
                            <li><a class="dropdown-item" onclick="location.href = '/Dashboard/pie-graph/02';">December</a></li>
                        </ul>
                    </div>

                <div class="map_canvass" style="margin-top: 3%; margin-right: 1.5%;">
                    <canvas id="myCharts" style="width: 140%;"></canvas>
                </div>

            </div>
        </div>
        <div>
            <div style="width: 17%; height: 50px; margin-top: 4%; margin-right: 1.5%;">
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
                                        {{$lack->unit}}
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
