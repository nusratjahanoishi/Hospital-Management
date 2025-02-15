<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>


    <!-- header navbar section start  -->

    <header>

        <!-- logo name  -->
        <a href="#" class="logo"><span>P</span>atient <span>C</span>ares.</a>

        <!-- navbar link  -->
        <nav class="navbar">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/admin/register') }}">admin</a></li>
                <li><a href="{{ url('/doctor/register') }}">Doctor</a></li>
                <li><a href="#review">review</a></li>
                <li><a href="{{ url('/register') }}">Patient</a></li>
                <li><a href="#blog">blog</a></li>
            </ul>
        </nav>

        <div class="fas fa-bars"></div>
    </header>
    <!-- header navbar section end  -->

    <!-- home section start  -->

    <section id="home" class="home">

        <div class="row">

            <!-- home images  -->
            <div class="images">
                <img src="{{ asset('images/landing-image.png') }}" alt="">   
            </div>

            <!-- home heading  -->
            <div class="content">
                <h1><span>Stay</span> Safe, <span>Stay</span> Healthy.</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa, officiis.</p>
                <a href="#"><button class="button">read more</button></a>
            </div>
        </div>
    </section>
    <!-- home section end  -->

    <footer>
        <p>&copy; 2025 Landing Page Project. All rights reserved.</p>
    </footer>

    <!-- footer section end  -->
 

    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- custom js file link  -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>