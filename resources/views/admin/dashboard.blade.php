@extends('layouts.AdminLayout')
@section('title')
    Dashboard
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endsection
@section('header')
    Dashboard
@endsection
@section('content')
    <div class="date-search-sort">
        <div class="date">
            <p>01/01/2023 - 01/01/2024</p> <img src="{{ asset('image/admin/icons/calendar.png') }}" alt="">
        </div>
    </div>

    <div class="dashboard-card">
        <div class="today-sales">
            <div class="card-text">
                Today Sales <br>
                <span>$20.4K</span> <br>
                We have sold 123 items
            </div>

            {{-- <div class="progress">
            </div> --}}
        </div>
        <div class="today-revenue">
            <div class="card-text">
                Today Revenue <br>
                <span>$8.2K</span> <br>
                Avaliable to payout
            </div>

            {{-- <div class="progress">
            </div> --}}
        </div>
        <div class="today-order">
            <div class="card-text">
                Today Orders <br>
                <span>$18.2K</span> <br>
                Avaliable to payout
            </div>
            {{-- 
            <div class="progress">
            </div> --}}
        </div>
        <div class="total-revenue">
            <div class="revenue">
                <div>
                    <p>Todays Revenue</p>
                </div>
                <!-- <div class="profit-loss">
                                                                            <div class="profit">
                                                                                <span></span>
                                                                                <p>Profit</p>
                                                                            </div>
                                                                            <div class="loss">
                                                                                <span></span>
                                                                                <p>Loss</p>
                                                                            </div>

                                                                        </div> -->
            </div>

            <div class="up-percent">
                <span>$50.4K</span>
                <p> <img src="{{ asset('image/admin/icons/Arrow 1.png') }}" alt="">5% than last month</p>
            </div>

            <div class="chartCard">
                <div class="chartBox">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

        </div>
        <div class="most-sold">
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
        </div>


    </div>

    <div class="customer">
        <h3>Latest Orders</h3>

        <div class="customer-table">
            <table>
                <tr>
                    <th>
                        <input type="checkbox" name="" id="">
                    </th>
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
                    <th>
                        Action
                    </th>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot">
                        <span></span>
                        Delivered
                    </td>
                    <td>
                        250,000 MMk
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot dot-orange">
                        <span></span>
                        Pending
                    </td>
                    <td>
                        250,000 MMk
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot dot-orange">
                        <span></span>
                        Pending
                    </td>
                    <td>
                        250,000 MMk
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot">
                        <span></span>
                        Delivered
                    </td>
                    <td>
                        250,000 MMk
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot dot-orange">
                        <span></span>
                        Pending
                    </td>
                    <td>
                        250,000 MMk
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot dot-red">
                        <span></span>
                        Cancled
                    </td>
                    <td>
                        250,000 MMk
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>

            </table>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script>
        // setup 
        const data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep'],
            datasets: [{
                label: 'Profit',
                data: [100000, 80000, 84000, 75000, 80000, 50000, 70000, 80000, 70000],
                backgroundColor: '#475BE8',
                borderColor: 'rgba(0, 0, 0, 1)',
                borderWidth: 1
            }, {
                label: 'Loss',
                data: [70000, 60000, 40000, 90000, 60000, 40000, 50000, 60000, 50000],
                backgroundColor: '#E3E7FC',
                borderColor: 'rgba(0, 0, 0, 1)',
                borderWidth: 1
            }]
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
@endsection
