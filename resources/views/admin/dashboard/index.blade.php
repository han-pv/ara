@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl mt-5">
        <div class="h1 fw-bold">Dashboard</div>
        <div class="row">
            <div class="col-6">
                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            </div>
            <div class="col-6">
                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            </div>
        </div>
        <script>
            const postsCounts = @json($posts_count);
            const dates = @json($dates);
            (() => {
                'use strict'
                const ctx = document.getElementById('myChart')
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dates,
                        datasets: [{
                            data: postsCounts,
                            lineTension: 0,
                            backgroundColor: 'transparent',
                            borderColor: '#007bff',
                            borderWidth: 4,
                            pointBackgroundColor: '#007bff'
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                boxPadding: 3
                            }
                        }
                    }
                })
            })()
        </script>
@endsection