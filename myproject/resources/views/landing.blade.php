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
        <a href="#" class="logo"><span>H</span>ealth <span>C</span>are.</a>
        <nav class="navbar">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('admin.login') }}">Admin</a></li>
                <li><a href="{{ url('/doctor/register') }}">Doctor</a></li>
                <li><a href="#review">Review</a></li>
                <li><a href="{{ url('/register') }}">Patient</a></li>
                <li><a href="#blog">Blog</a></li>
            </ul>
        </nav>
        <div class="fas fa-bars"></div>
    </header>
    <!-- header navbar section end  -->

    <!-- home section start  -->
    <section id="home" class="home">
        <div class="row">
            <div class="images">
                <img src="{{ asset('images/landing-image.png') }}" alt="">
            </div>
            <div class="content">
                <h1><span>Stay</span> Safe, <span>Stay</span> Healthy.</h1>
                <p>Providing compassionate and quality healthcare services for a healthier community.</p>
                <a href="#"><button class="button">Read More</button></a>
            </div>
        </div>
    </section>
    <!-- home section end  -->

    <!-- review section start  -->
    <section id="review" class="review">
        <h1 class="heading">Our Patient Reviews</h1>
        <h3 class="title">What patients say about us</h3>
        <div class="box-container">
            <div class="box">
                <i class="fas fa-quote-left"></i>
                <p>Providing compassionate and quality healthcare services for a healthier community.</p>
                <div class="images">
                    <img src="./images/img-1.jpg" alt="">
                    <div class="info">
                        <h3>John Doe</h3>
                        <span>Date: 11 2024</span>
                    </div>
                </div>
            </div>
            <div class="box">
                <i class="fas fa-quote-left"></i>
                <p>Excellent service and professional staff!</p>
                <div class="images">
                    <img src="./images/img-2.jpg" alt="">
                    <div class="info">
                        <h3>Jane Smith</h3>
                        <span>Date: 12 2024</span>
                    </div>
                </div>
            </div>
            <div class="box">
                <i class="fas fa-quote-left"></i>
                <p>Best healthcare experience I've had. Highly recommend!</p>
                <div class="images">
                    <img src="./images/img-3.jpg" alt="">
                    <div class="info">
                        <h3>Michael Johnson</h3>
                        <span>Date: 01 2025</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- review section end  -->

     <!-- blog section start  -->

     <section id="blog" class="blog">

<h1 class="heading">blog</h1>
<h3 class="title">Lets Read Some Blog</h3>

<div class="box-container">

    <!-- start here  -->
    <div class="box">
        <!-- images  -->
        <img src="./images/blog 1.png" alt="">

        <div class="content">
            <a href="#">
                <h2>diabetes</h2>
            </a>
            <p>Diabetes is a condition of high blood sugar due to insulin issues, managed with diet, exercise, and medication.</p>
             <!-- button  -->
            <a href="#"> <button class="button">learn more</button></a>
        </div>
    </div>
    <!-- end here  -->

    
    <!-- start here  -->
    <div class="box">
        <!-- images  -->
        <img src="./images/blog 2.png" alt="">

        <div class="content">
            <a href="#">
                <h2>covid-19 vaccine</h2>
            </a>
            <p>COVID-19 is a viral disease causing respiratory issues, spread by droplets, and prevented with vaccines, masks, and hygiene.</p>
             <!-- button  -->
            <a href="#"> <button class="button">learn more</button></a>
        </div>
    </div>
    <!-- end here  -->

    
    <!-- start here  -->
    <div class="box">
        <!-- images  -->
        <img src="./images/blog 3.png" alt="">

        <div class="content">
            <a href="#">
                <h2>prevent epidemic</h2>
            </a>
            <p>Prevent epidemics through vaccination, hygiene, early detection, and public awareness.</p>
             <!-- button  -->
            <a href="#"> <button class="button">learn more</button></a>
        </div>
    </div>
    <!-- end here  -->
</div>
</section>



<!-- blog section end  -->

<!-- card section start  -->

<section id="doctor" class="card">

<div class="container">

    <h1 class="heading">doctors</h1>
    <h3 class="title">our professional doctors</h3>

    <div class="box-container">

        <!-- start here  -->
        <div class="box">
            <img src="./images/doctor-1.jpg" alt="">                
            
            <div class="content">
                <a href="#">
                    <h2>john doe</h2>
                </a>
                <p>professional</p>

                <!-- card icons  -->
                <div class="icons">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>
        <!-- end here  -->

         <!-- start here  -->
         <div class="box">
            <img src="./images/doctor-2.jpg" alt="">                
            
            <div class="content">
                <a href="#">
                    <h2>john doe</h2>
                </a>
                <p>professional</p>

                <!-- card icons  -->
                <div class="icons">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>
        <!-- end here  -->

         <!-- start here  -->
         <div class="box">
            <img src="./images/doctor-3.jpg" alt="">                
            
            <div class="content">
                <a href="#">
                    <h2>john doe</h2>
                </a>
                <p>professional</p>

                <!-- card icons  -->
                <div class="icons">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>
        <!-- end here  -->

    </div>
</div>
</section>
<!-- card section end  -->

    <!-- footer section start  -->
    <footer>
        <p>&copy; 2025 Hospital Management System. All rights reserved.</p>
    </footer>
    <!-- footer section end  -->

    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- custom js file link  -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
