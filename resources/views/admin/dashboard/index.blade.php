<?php 
    $test = $pie;
?>

@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="col-md-12 overflow-auto mt-4 mb-4">
        <div class="btn-group col-md-3 offset-md-9 btn-group-justified" role="group">
            <a href='http://stuntech.id:8000/api/v1/download_excel?json_body={"model_names": ["StuntingTrace"]}' class="btn btn-success legitRipple" target="_blank">
                Download Excel
            </a>
        </div>
    </div>
    <div class="section-table">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Grafik Trends Stunting</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="stuntingChart" width="400" height="130"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Data Stunting</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart1Year" width="400" height="150"></canvas>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6>Grafik Tahun Kedua</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart2Year" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6>Grafik Tahun Ketiga</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart3Year" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6>Grafik Tahun Keempat</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart4Year" width="400" height="200"></canvas>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="pie" width="400" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@section('scripts')
<script src={{ asset('/assets/js/chartJs/chart.js') }}></script>
<script type="text/javascript">
    var dataLineChart = {!! json_encode($growthAgeMonthStunting) !!};
    var dataLineChartArrayMedian = Object.values(dataLineChart["dataGrowthAgeMonthStunting"][0]);
    var dataLineChartArrayNormal = Object.values(dataLineChart["dataGrowthAgeMonthStunting"][1]);
    var dataLineChartArrayTinggi = Object.values(dataLineChart["dataGrowthAgeMonthStunting"][2]);
    var dataLineChartArrayPendek = Object.values(dataLineChart["dataGrowthAgeMonthStunting"][-1]);
    var dataLineChartArraySangatPendek = Object.values(dataLineChart["dataGrowthAgeMonthStunting"][-2]);
    console.log(dataLineChartArrayMedian);
    const DATA_COUNT = 7;
    const NUMBER_CFG = {count: DATA_COUNT, min: -100, max: 100};
    const stuntingChartCtx = document.getElementById('stuntingChart');
    const stuntingChart = new Chart(stuntingChartCtx, {
        type: 'line',
        data: 
        {
            labels: ['Lahir', '1 Bulan', '2 Bulan', '3 Bulan', '4 Bulan', '5 Bulan', '6 Bulan', '7 Bulan', '8 Bulan', '9 Bulan', '10 Bulan', '11 Bulan', '1 Tahun', 
                    '1 Tahun 1 Bulan', '1 Tahun 2 Bulan', '1 Tahun 3 Bulan', '1 Tahun 4 Bulan', '1 Tahun 5 Bulan', '1 Tahun 6 Bulan', '1 Tahun 7 Bulan', '1 Tahun 8 Bulan', '1 Tahun 9 Bulan', '1 Tahun 10 Bulan', '1 Tahun 11 Bulan', '2 Tahun',
                    '2 Tahun 1 Bulan', '2 Tahun 2 Bulan', '2 Tahun 3 Bulan', '2 Tahun 4 Bulan', '2 Tahun 5 Bulan', '2 Tahun 6 Bulan', '2 Tahun 7 Bulan', '2 Tahun 8 Bulan', '2 Tahun 9 Bulan', '2 Tahun 10 Bulan', '2 Tahun 11 Bulan', '3 Tahun',
                    '3 Tahun Bulan', '3 Tahun 2 Bulan', '3 Tahun 3 Bulan', '3 Tahun 4 Bulan', '3 Tahun 5 Bulan', '3 Tahun 6 Bulan', '3 Tahun 7 Bulan', '3 Tahun 8 Bulan', '3 Tahun 9 Bulan', '3 Tahun 10 Bulan', '3 Tahun 11 Bulan', '4 Tahun',
                    '4 Tahun Bulan', '4 Tahun 2 Bulan', '4 Tahun 3 Bulan', '4 Tahun 4 Bulan', '4 Tahun 5 Bulan', '4 Tahun 6 Bulan', '4 Tahun 7 Bulan', '4 Tahun 8 Bulan', '4 Tahun 9 Bulan', '4 Tahun 10 Bulan', '4 Tahun 11 Bulan', '5 Tahun'],
            datasets: [
                // {
                // label: 'Grafik Data Median',  
                // // data: [12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10,12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5],
                // data : dataLineChartArrayMedian,
                // backgroundColor: [
                //     'rgba(255, 99, 132, 0.2)',
                //     'rgba(54, 162, 235, 0.2)',
                //     'rgba(255, 206, 86, 0.2)',
                //     'rgba(75, 192, 192, 0.2)',
                // ],
                // borderColor: [
                //     'rgba(255, 99, 132, 1)',
                //     'rgba(54, 162, 235, 1)',
                //     'rgba(255, 206, 86, 1)',
                //     'rgba(75, 192, 192, 1)',
                // ],
                // borderWidth: 1,
                // yAxisID: 'y',
                // },
                {
                label: 'Grafik Data Normal',  
                // data: [12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10,12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5],
                data : dataLineChartArrayNormal,
                backgroundColor: [
                    // 'rgba(255, 99, 132, 0.2)',
                    // 'rgba(54, 162, 235, 0.2)',
                    // 'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1,
                yAxisID: 'y',
                },
                {
                label: 'Grafik Data Tinggi',  
                // data: [12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10,12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5],
                data : dataLineChartArrayTinggi,
                backgroundColor: [
                    // 'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    // 'rgba(255, 206, 86, 0.2)',
                    // 'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    // 'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1,
                yAxisID: 'y',
                },
                {
                label: 'Grafik Data Pendek',  
                // data: [12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10,12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5],
                data : dataLineChartArrayPendek,
                backgroundColor: [
                    // 'rgba(255, 99, 132, 0.2)',
                    // 'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    // 'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1,
                yAxisID: 'y',
                },
                {
                label: 'Grafik Data Sangat Pendek',  
                // data: [12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10,12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 19, 3, 5, 2, 3, 4, 5],
                data : dataLineChartArraySangatPendek,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    // 'rgba(54, 162, 235, 0.2)',
                    // 'rgba(255, 206, 86, 0.2)',
                    // 'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    // 'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1,
                yAxisID: 'y',
                },
        ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script type="text/javascript">
    const barChart1YearCtx = document.getElementById('barChart1Year');
    const barChart1YearChart = new Chart(barChart1YearCtx, {
        type: 'bar',
        data: {
            labels: ['Lahir', '1 Bulan', '2 Bulan', '3 Bulan', '4 Bulan', '5 Bulan', '6 Bulan', '7 Bulan', '8 Bulan', '9 Bulan', '10 Bulan', '11 Bulan', '1 Tahun', 
                    '1 Tahun 1 Bulan', '1 Tahun 2 Bulan', '1 Tahun 3 Bulan', '1 Tahun 4 Bulan', '1 Tahun 5 Bulan', '1 Tahun 6 Bulan', '1 Tahun 7 Bulan', '1 Tahun 8 Bulan', '1 Tahun 9 Bulan', '1 Tahun 10 Bulan', '1 Tahun 11 Bulan', '2 Tahun',
                    '2 Tahun 1 Bulan', '2 Tahun 2 Bulan', '2 Tahun 3 Bulan', '2 Tahun 4 Bulan', '2 Tahun 5 Bulan', '2 Tahun 6 Bulan', '2 Tahun 7 Bulan', '2 Tahun 8 Bulan', '2 Tahun 9 Bulan', '2 Tahun 10 Bulan', '2 Tahun 11 Bulan', '3 Tahun',
                    '3 Tahun Bulan', '3 Tahun 2 Bulan', '3 Tahun 3 Bulan', '3 Tahun 4 Bulan', '3 Tahun 5 Bulan', '3 Tahun 6 Bulan', '3 Tahun 7 Bulan', '3 Tahun 8 Bulan', '3 Tahun 9 Bulan', '3 Tahun 10 Bulan', '3 Tahun 11 Bulan', '4 Tahun',
                    '4 Tahun Bulan', '4 Tahun 2 Bulan', '4 Tahun 3 Bulan', '4 Tahun 4 Bulan', '4 Tahun 5 Bulan', '4 Tahun 6 Bulan', '4 Tahun 7 Bulan', '4 Tahun 8 Bulan', '4 Tahun 9 Bulan', '4 Tahun 10 Bulan', '4 Tahun 11 Bulan', '5 Tahun'],
            datasets: [
            {
                label: 'Data Jumlah Status Normal',  
                data: dataLineChartArrayNormal,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            },
            {
                label: 'Data Jumlah Status Sangat Pendek',  
                data: dataLineChartArraySangatPendek,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            },
            {
                label: 'Data Jumlah Status Pendek',  
                data: dataLineChartArrayPendek,
                backgroundColor: [
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            },
            {
                label: 'Data Jumlah Status Tinggi',  
                data: dataLineChartArrayTinggi,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            },
        ]
        },
        options: {
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true,
                    title: {
                        display: true,
                        text: 'value'
                        }
                }
            }
        }
    });

    // const barChart2YearCtx = document.getElementById('barChart2Year');
    // const barChart2YearChart = new Chart(barChart2YearCtx, {
    //     type: 'bar',
    //     data: 
    //     {
    //         labels: ['1 Tahun 1 Bulan', '1 Tahun 2 Bulan', '1 Tahun 3 Bulan', '1 Tahun 4 Bulan', '1 Tahun 5 Bulan', '1 Tahun 6 Bulan', '1 Tahun 7 Bulan', '1 Tahun 8 Bulan', '1 Tahun 9 Bulan', '1 Tahun 10 Bulan', '1 Tahun 11 Bulan', '2 Tahun'],
    //         datasets: [{
    //             label: 'Grafik Jumlah Stunting Tahun Pertama',  
    //             data: [12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //                 'rgba(75, 192, 192, 0.2)',
    //             ],
    //             borderColor: [
    //                 'rgba(255, 99, 132, 1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });

    // const barChart3YearCtx = document.getElementById('barChart3Year');
    // const barChart3earChart = new Chart(barChart3YearCtx, {
    //     type: 'bar',
    //     data: {
    //         labels: ['2 Tahun 1 Bulan', '2 Tahun 2 Bulan', '2 Tahun 3 Bulan', '2 Tahun 4 Bulan', '2 Tahun 5 Bulan', '2 Tahun 6 Bulan', '2 Tahun 7 Bulan', '2 Tahun 8 Bulan', '2 Tahun 9 Bulan', '2 Tahun 10 Bulan', '2 Tahun 11 Bulan', '3 Tahun'],
    //         datasets: [{
    //             label: 'Grafik Jumlah Stunting Tahun Pertama',  
    //             data: [12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //                 'rgba(75, 192, 192, 0.2)',
    //             ],
    //             borderColor: [
    //                 'rgba(255, 99, 132, 1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });

    // const barChart4YearCtx = document.getElementById('barChart4Year');
    // const barChart4YearChart = new Chart(barChart4YearCtx, {
    //     type: 'bar',
    //     data: {
    //         labels: ['3 Tahun 1 Bulan', '3 Tahun 2 Bulan', '3 Tahun 3 Bulan', '3 Tahun 4 Bulan', '3 Tahun 5 Bulan', '3 Tahun 6 Bulan', '3 Tahun 7 Bulan', '3 Tahun 8 Bulan', '3 Tahun 9 Bulan', '3 Tahun 10 Bulan', '3 Tahun 11 Bulan', '4 Tahun'],
    //         datasets: [{
    //             label: 'Grafik Jumlah Stunting Tahun Pertama',  
    //             data: [12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //                 'rgba(75, 192, 192, 0.2)',
    //             ],
    //             borderColor: [
    //                 'rgba(255, 99, 132, 1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });
</script>

<script type="text/javascript">
    var dataPie = {!! json_encode($pie) !!};
    var dataPieArray = Object.values(dataPie["dataPie"]);
    console.log(dataPie["dataPie"]);

        const pieCtx = document.getElementById('pie');
        const pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Sangat Pendek', 'Pendek', 'Normal', 'Tinggi'],
            datasets: [{
                label: '# of Votes',
                data: dataPieArray,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
        plugins: {
            datalabels: {
                formatter: (value, pieCtx) => {
                    let sum = 0;
                    let dataArr = pieCtx.chart.data.datasets[0].data;
                    dataArr.map(data => {
                    sum += data;
                    });
                    let percentage = (value*100 / sum).toFixed(2)+"%";
                    // return percentage;
                    return "halo";
                },
                color: '#fff',
            }
        }
    });
</script>
@endsection