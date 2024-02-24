<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #E4D8CC;
        }

        .bar-container {
            width: 80%;
            margin: 50px auto;
            background-color: #D0A59F;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            vertical-align: bottom;
            padding: 0 5px;
        }

        .bar {
            height: 150px; /* Adjust the height as needed */
            width: 10px;
            background-color: #7D5452;
            opacity: .5;
            transition: height 0.6s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #000;
        }

        .bar-text {
            padding: 5px;
            border-radius: 5px;
            color: #fff;
            margin-top: 5px;
        }

        .bar:nth-child(even) {
            background-color: #2ecc71;
        }



        .month-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            width: 100%;
        }

        th {
            flex: 1;
            text-align: center;
            color: #000;
        }
    </style>
    <title>Yearn Art | Home</title>
</head>
<body>

<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
    @include('admin.header')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <h2>Quantity Sold</h2>
            <div style="display: flex; justify-content: space-between;">
                <canvas id="verticalChart"></canvas>

                <!-- Horizontal Bar Chart -->

            </div>

            <canvas id="horizontalChart"></canvas>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Vertical Bar Chart
                    fetch('/get-data')
                        .then(response => response.json())
                        .then(data => {
                            var ctx = document.getElementById('verticalChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Jan', 'Feb', 'Mar', 'Label 4', 'Label 5'],
                                    datasets: [{
                                        label: 'Quantity Sold',
                                        data: data.data,
                                        backgroundColor: '#7D5452',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });

                    // Horizontal Bar Chart
                    fetch('/get-data')  // Adjust the route for horizontal data
                        .then(response => response.json())
                        .then(data => {
                            var ctx = document.getElementById('horizontalChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'horizontalBar',
                                data: {
                                    labels: ['Category A', 'Category B', 'Category C', 'Category D', 'Category E'],
                                    datasets: [{
                                        label: 'Quantity Sold',
                                        data: data.data,
                                        backgroundColor: '#2ecc71',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        x: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                });
            </script>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
</body>
</html>
