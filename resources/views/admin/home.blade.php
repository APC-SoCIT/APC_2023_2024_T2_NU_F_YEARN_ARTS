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
            <div class="bar-container">
                <table>
                   <tr>
                    <td>
                        <div class="bar" style="height: 60%;">
                            <div class="bar-text">60%</div>
                        </div>
                    </td>
                   </tr>
                   <tr>
                    <th>Jan</th>
                    <th>Feb</th>
                    <th>Mar</th>
                    <th>Apr</th>
                    <th>May</th>
                    <th>Jun</th>
                    <th>Jul</th>
                    <th>Aug</th>
                    <th>Sep</th>
                    <th>Oct</th>
                    <th>Nov</th>
                    <th>Dec</th>
                   </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
</body>
</html>
