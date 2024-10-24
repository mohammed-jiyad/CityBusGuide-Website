<?php
//include("authentication.php");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Route</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            
            background-color:white;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
            padding-left: 5px;
            padding-right: 5px;
            background-image: url(Routee.jpg);
            background-size: cover;
            color: #333;
        }

        .main-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .content-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .container {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 410px;
            height: auto;
            margin-right: 20px;
        }

        .bus-route {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 370px;
            height: auto;
            position: relative;
            margin-top: 20px;
        }

        .stop {
            display: flex;
            align-items: center;
            position: relative;
            padding: 10px 0;
        }

        .circle {
            width: 12px;
            height: 12px;
            background-color: dodgerblue;
            border-radius: 50%;
            position: relative;
            margin-right: 15px;
            z-index: 1;
        }

        .stop:before {
            content: '';
            position: absolute;
            width: 2px;
            background-color: dodgerblue;
            top: 0;
            bottom: 0;
            left: 5px;
            z-index: 0;
        }

        .stop:first-child:before {
            top: 50%;
        }

        .stop:last-child:before {
            height: 50%;
            bottom: auto;
        }

        .details {
            flex-grow: 1;
        }

        .label {
            font-size: 16px;
            color: #333;
        }

        p {
            color: #007bff;
        }

        h1 {
            font-family: 'Lato', sans-serif;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .schedule {
            background-color: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 450px;
            height: 370px;
        }
        .schedule1{
            background-color: #fff;
        }

        .schedule h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .schedule p {
            font-size: 14px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #f2f2f2;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            font-weight: bold;
            background-color: #f4f4f4;
        }

        .hero {
    background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
    width: 100%;
    padding: 20px;
    margin-bottom: 20px;
    box-sizing: border-box;
    text-align: center;
    color: black;
    border-radius: 10px;
}
.foot{
    color: black;
    
}
    </style>
</head>
<body>
    <div class="main-content">
        <section class="hero">
            <h1>Bus Details</h1>
        </section>
        <div class="content-wrapper">
            <div class="container">
                <h1>Bus Route Schedule of 1A</h1>
                <div class="bus-route">
                    <div class="stop">
                        <div class="circle"></div>
                        <div class="details">
                            <div class="label"><strong>Banashankari</strong></div>
                            <p><small>Expected time of Arrival - 9:00AM</small></p>
                        </div>
                    </div>
                    <div class="stop">
                        <div class="circle"></div>
                        <div class="details">
                            <div class="label"><strong>Kumarswamy Layout</strong></div>
                            <p><small>Expected time of Arrival - 9:20AM</small></p>
                        </div>
                    </div>
                    <div class="stop">
                        <div class="circle"></div>
                        <div class="details">
                            <div class="label"><strong>Yeshwanthpur</strong></div>
                            <p><small>Expected time of Arrival - 9:50AM</small></p>
                        </div>
                    </div>
                    <div class="stop">
                        <div class="circle"></div>
                        <div class="details">
                            <div class="label"><strong>Koramangla</strong></div>
                            <p><small>Expected time of Arrival - 10:30AM</small></p>
                        </div>
                    </div>
                    <div class="stop">
                        <div class="circle"></div>
                        <div class="details">
                            <div class="label"><strong>Jayaprakash Nagar</strong></div>
                            <p><small>Expected time of Arrival - 11:10AM</small></p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="schedule">
                <h1>1A Bus Schedule</h1>
                <p>1A bus route operates every day. Regular schedule hours: 09:00-11:10</p>
                <div class="schedule1">
                <table>
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Operating Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sun</td>
                            <td>09:00 - 11:10</td>
                        </tr>
                        <tr>
                            <td>Mon</td>
                            <td>09:00 - 11:10</td>
                        </tr>
                        <tr>
                            <td>Tue</td>
                            <td>09:00 - 11:10</td>
                        </tr>
                        <tr>
                            <td>Wed</td>
                            <td>09:00 - 11:10</td>
                        </tr>
                        <tr>
                            <td>Thu</td>
                            <td>09:00 - 11:10</td>
                        </tr>
                        <tr>
                            <td>Fri</td>
                            <td>09:00 - 11:10</td>
                        </tr>
                        <tr>
                            <td>Sat</td>
                            <td>09:00 - 11:10</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <footer>
        <p>&copy; City Bus Guide 2024</p>
    </footer>
    </div>
    
</body>
</html>
