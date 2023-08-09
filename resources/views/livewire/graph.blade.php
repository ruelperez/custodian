<div style="display: flex; width: 100%;">
    <div class="map_canvas" style="margin-top: 3%; margin-right: 1.5%;">

        <canvas id="myChart" height="610" style="width: 390%;"></canvas>
    </div>

    <div style="width: 17%; height: 50px; margin-top: 4%; margin-right: 1.5%;">
        <table class="table table-hover" style="background-color: #E6E6FA;">
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
                        @if($lack->item_type == "sets" and $lack->unit <= 5)
                            <tr>
                                <td>
                                    {{ucfirst($lack->item_name)}}
                                </td>
                                <td>
                                    {{$lack->unit}}
                                </td>
                            </tr>
                        @elseif($lack->quantity <= 10)
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
<!-- Show Graph Data -->
<script src="https://cdnjs.com/libraries/Chart.js"></script>
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
</script>
