@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <?php
            $weeks = [];
            for ($i = 1; $i <= count($borrowingSummary); $i++) {
                $weeks[] = 'Week ' . $i;
            }
            ?>
            <div id="chart"></div>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script type="text/javascript">
                var options = {
                    series: [{
                        name: 'Borrowed Books',
                        data: {{ Illuminate\Support\Js::from($borrowingSummary->pluck('total_amount')) }}
                    }, {
                        name: 'Returned Books',
                        data: {{ Illuminate\Support\Js::from($returningSummary->pluck('total_amount')) }}
                    }],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '45%',
                            borderRadius: 5,
                            borderRadiusApplication: 'end'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: <?php echo json_encode($weeks); ?>,
                    },
                    yaxis: {
                        title: {
                            text: 'books'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " books"
                            }
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            </script>
        </div><br />
        <div class="card">
            <div class="table-responsive card-body p-0">
                <table id="datatable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Week</th>
                            <th>Borrowing Amount</th>
                            <th>Returning Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i < count($borrowingSummary); $i++)
                            <tr>
                                <td>{{ ($i+1) }}</td>
                                <td>{{ $borrowingSummary[$i]->total_amount }}</td>
                                <td>{{ $returningSummary[$i]->total_amount }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection




