<?php 
// try{
// // session_start();
// if(!isset($_SESSION['username'])){
//     header('http://localhost/Attendance%20System%20project/login%20form/login_panel.php?msg=1');
// }
// $validtime  = $_SESSION['login_time'] + 60;
// if(isset($_SESSION['login_time']) && time() < $validtime){
//     $_SESSION['login_time'] = time();
// }else {
//     header('http://localhost/Attendance%20System%20project/login%20form/login_panel.php?msg=2');
// }
// }catch(Exception $ex){
//     die ("session errro: " .$ex->getMessage());
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="menu_barcss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="menu_bar">
        <!-- Sidebar navigation links -->
        <ul>
            <li><a href="teacher_dash_gpt.php?page=dashboard" class="menus">Dashboard</a></li>
            <li><a href="teacher_dash_gpt.php?page=profile" class="menus">Profile</a></li>
            <li><a href="teacher_dash_gpt.php?page=settings" class="menus">Settings</a></li>
            <!-- Add more links as needed -->
        </ul>
    </div>
    <div class="content" id="page-content">
        <!-- Content of the selected page will be loaded here -->
    </div>

    <script>
        $(document).ready(function() {
            // Function to handle loading page content based on URL parameter
            function loadPage(page) {
                $('#page-content').load(page + '.php');
            }

            // Load initial page content based on URL parameter
            var urlParams = new URLSearchParams(window.location.search);
            var initialPage = urlParams.get('page');
            if (initialPage) {
                loadPage(initialPage);
            } else {
                // Default to dashboard if no page parameter is provided
                loadPage('dashboard');
            }

            // Handle click event for navigation links
            $('.menus').click(function(e) {
                e.preventDefault();
                var page = $(this).attr('href');
                var pageName = page.split('=')[1];
                loadPage(pageName);
                history.pushState(null, '', page);
            });
        });
    </script>
</body>
</html>
