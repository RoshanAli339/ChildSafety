<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tail.css">
    <script src="https://kit.fontawesome.com/639e972ac7.js" crossorigin="anonymous"></script>
    <title>Testing</title>
</head>

<body class="bg-gradient-to-r from-indigo-300 to-purple-4000">
    <header class="bg-[#FFFFFF30]">
        <nav class="flex items-center justify-between pr-8 pl-2 h-16 lg:justify-center">
            <a href="#" class="flex items-center justify-around max-lg:w-5/6 lg:w-4/6 lg:justify-normal space-x-2">
                <img src="./protection.png" width="50px" height="50px">
                <p class="headText font-Comfortaa font-bold text-xl whitespace-nowrap">Parent Dashboard</p>
            </a>

            <div class="drop-menu absolute -top-full -left-8 max-lg:bg-[#FFFFFF30] w-full flex 
                        flex-col gap-6 items-end py-2 text-lg font-bold font-Poppins
                        lg:static lg:flex-row lg:justify-end lg:gap-8">
                <ul class="flex flex-col items-end gap-6 lg:flex-row max-lg:w-2/6">
                    <li class="hover:text-orange-400"><a href="#">Dashboard</a></li>
                    <li class="hover:text-orange-400"><a href="#">History</a></l>
                    <li class="hover:text-orange-400"><a href="#">Attendance</a></li>
                </ul>

                <div class="flex flex-col items-center gap-6">
                    <button class="bg-red-600 rounded-lg px-4">Log out</button>
                </div>
            </div>
            <div class="toggle-button lg:hidden">
                <i class="fa-solid fa-bars fa-lg"></i>
            </div>
        </nav>
    </header>

    <div class="w-screen flex flex-col justify-center h-screen items-center" data-nosnippet>
        <h3 class="font-Comfortaa text-2xl ">Your child's live location: </h3>
        <div id="map" class="w-4/5 h-[500px] rounded-lg"></div>
    </div>
    <?php
        include 'conn.php';

        $stmt = $conn->prepare("SELECT date, ST_X(location) as 'latitude', ST_Y(location) as 'longitude' FROM pin ORDER BY date DESC LIMIT 1;");
        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();
        $lat = $result['latitude'];
        $long = $result['longitude'];
        $dt = $result['date'];
    ?>
    <script>
        const toggle = document.querySelector('.toggle-button')
        const dropDown = document.querySelector('.drop-menu')

        toggle.addEventListener("click", ()=>{
            dropDown.classList.toggle('-top-full');
            dropDown.classList.toggle('top-16');
        })

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
