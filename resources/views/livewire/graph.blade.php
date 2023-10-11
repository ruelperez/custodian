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
                <div>
                    <select wire:model="sel">
                        <option selected value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
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
            labels: <?php echo json_encode($item_name) ?>,
            datasets: [{
                data: <?php echo json_encode($item_quantity); ?>,
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
