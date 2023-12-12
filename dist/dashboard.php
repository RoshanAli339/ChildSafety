<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="tail.css">
</head>

<body>
    <nav class="w-full bg-green-400 flex justify-between items-center">
        <div class="flex w-full py-3 justify-start px-3">
            <img src="./protection.png" width="50px" height="50px">
            <ul class="flex flex-row items-center justify-center w-[400px] font-Poppins">
                <li class="px-3">
                    <a href="dashboard.php">Dashboard</a>
                </li>
                <li class="px-3">
                    History
                </li>
                <li class="px-3">
                    Attendance History
                </li>
            </ul>
        </div>
        <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4
             focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2
            dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 w-[100px] h-[50px]">
            Log Out</button>
    </nav>

    <?php
    include 'conn.php';

    $stmt = $conn->prepare("SELECT date, ST_X(location) as 'latitude', ST_Y(location) as 'longitude' FROM pin ORDER BY date DESC LIMIT 1;");
    $stmt->execute();

    $result = $stmt->get_result()->fetch_assoc();
    $lat = $result['latitude'];
    $long = $result['longitude'];
    $dt = $result['date'];
    ?>
    <div class="w-full flex flex-col justify-center h-screen items-center">
        <h3 class="font-Comfortaa text-3xl ">Your child's live location: </h3>
        <div id="map" class="w-4/5 h-[500px]"></div>
    </div>

    <script>
        function initMap() {
            const latlong = {
                lat: <?php echo $lat ?>,
                lng: <?php echo $long ?>
            }
            var options = {
                zoom: 18,
                center: latlong
            }

            var map = new google.maps.Map(document.getElementById('map'), options)

            var marker = new google.maps.Marker({
                position: {
                    lat: <?php echo $lat ?>,
                    lng: <?php echo $long ?>
                },
                map: map,
                icon: './child.svg'
            })
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqHW3QmMMYPOP6uR5MMFvQQoIB3OkdhnE&callback=initMap"></script>

</body>

</html>