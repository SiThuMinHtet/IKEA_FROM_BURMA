@extends('layouts.AdminLayout')
@section('title')
    Dashboard
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection
@section('header')
    Dashboard
@endsection

@section('content')
    {{-- <div class="date-search-sort">
        <div class="date">
            <p>01/01/2023 - 01/01/2024</p> <img src="{{ asset('image/admin/icons/calendar.png') }}" alt="">
        </div>
    </div> --}}

    <div class="dashboard-card">
        <div class="today-sales">
            <div class="card-text">
                Total Sales <br>
                <span>${{ $totalSales }}</span> <br>
                We have sold {{ $totalItems }} items
            </div>

            {{-- <div class="progress">
            </div> --}}
        </div>
        <div class="today-revenue">
            <div class="card-text">
                Total Customer <br>
                <span>{{ $totalCustomers }}</span>
            </div>

            {{-- <div class="progress">
            </div> --}}
        </div>
        <div class="today-order">
            <div class="card-text">
                Total Orders <br>
                <span>{{ $totalOrders }}</span> <br>
                Avaliable to payout
            </div>
            {{-- 
            <div class="progress">
            </div> --}}
        </div>
        <div class="total-revenue">
            <div class="revenue">
                <div>
                    <p>Monthly Sales</p>
                </div>

            </div>

            {{-- <div class="up-percent">
                <span>$50.4K</span>
                <p> <img src="{{ asset('image/admin/icons/Arrow 1.png') }}" alt="">5% than last month</p>
            </div> --}}

            <div class="chartCard">
                <div class="chartBox">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

        </div>
        {{-- <div class="most-sold">
            <h3>Most Sold Items</h3>
            <div class="bed-progress">
                <div class="progress-bar-text">
                    <p>Bed</p>
                    <p>70%</p>
                </div>

                <div class="progress-bar">
                    <span data-width="70%"></span>
                </div>
            </div>
            <div class="bed-progress">
                <div class="progress-bar-text">
                    <p>Sofa</p>
                    <p>40%</p>
                </div>

                <div class="sofa-progress-bar">
                    <span data-width="70%"></span>
                </div>
            </div>
            <div class="bed-progress">
                <div class="progress-bar-text">
                    <p>Lamp</p>
                    <p>60%</p>
                </div>

                <div class="lamp-progress-bar">
                    <span data-width="70%"></span>
                </div>
            </div>
            <div class="bed-progress">
                <div class="progress-bar-text">
                    <p>Cabinet</p>
                    <p>80%</p>
                </div>

                <div class="cabinet-progress-bar">
                    <span data-width="70%"></span>
                </div>
            </div>
            <div class="bed-progress">
                <div class="progress-bar-text">
                    <p>Others</p>
                    <p>20%</p>
                </div>

                <div class="others-progress-bar">
                    <span data-width="70%"></span>
                </div>
            </div>
        </div> --}}
        <div class="doughnut-container">
            <div class="chart-title">Monthly Orders</div>
            <div id="donutchart" style="width: 100%; height: 100%;"></div>
        </div>


    </div>

    <div class="customer">
        <h3>Latest Orders</h3>

        <div class="customer-table">
            <table>
                <tr>
                    <th>
                        Product Name
                    </th>
                    <th>
                        Order ID
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Customer Name
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Amount
                    </th>
                </tr>
                {{-- @dd($orderlist); --}}
                @foreach ($orderlist as $item)
                    <tr>
                        <td>
                            {{ $item->productname }}
                        </td>
                        <td>
                            {{ $item->order_id }}
                        </td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            {{ $item->customername }}
                        </td>
                        <td>
                            {{ $item->status }}
                        </td>
                        <td>
                            {{ $item->price }}
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script>
        const salesData = @json($monthlySales);
        // setup 
        const data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Sales',
                data: salesData,
                backgroundColor: '#475BE8',
                borderColor: 'rgba(0, 0, 0, 1)',
                borderWidth: 1
            }]
            // , {
            //     label: 'Loss',
            //     data: [70000, 60000, 40000, 90000, 60000, 40000, 50000, 60000, 50000],
            //     backgroundColor: '#E3E7FC',
            //     borderColor: 'rgba(0, 0, 0, 1)',
            //     borderWidth: 1
            // }
        };

        // config 
        const config = {
            type: 'bar',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // render init block
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        // Instantly assign Chart.js version
        const chartVersion = document.getElementById('chartVersion');
        chartVersion.innerText = Chart.version;
    </script>



    {{-- doughnut --}}

    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['User Payment Type', 'Order Qty'],
                ['One Time', {{ $onetimeorder }}],
                ['Account', {{ $ReguserOrder }}]
            ]);

            var options = {
                backgroundColor: '#2E2E48',
                pieHole: 0.6,
                legend: {
                    position: 'bottom',
                    textStyle: {
                        color: 'white',
                    }
                },
                pieSliceText: 'none',
                titleTextStyle: {
                    color: 'white'
                },
                slices: {
                    0: {
                        color: 'white'
                    },
                    1: {
                        color: '#475BE8'
                    }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
@endsection
