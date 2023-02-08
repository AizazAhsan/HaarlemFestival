<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>Home Page</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
        <div class="container">
            <a class="navbar-brand" href="/">Brunswick</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['current_user'])){
                            echo"<a class='nav-link' href='/register'>Register User</a>";
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['current_user'])){
                            echo"<a class='nav-link' href='/add/lawyer'>Add Lawyer</a>";
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['current_user'])){
                            echo"<a class='nav-link' href='/management'>Manage Appointments</a>";
                        }
                        ?>
                    </li>
                </ul>
                <form action="/addAppointment" method="post">

                    <input class="form-control btn btn-primary m-2" type="submit" value="Book Appointment"/>

                </form>
                <form action="/logout" method="post">
                    <?php
                    if (isset($_SESSION['current_user'])){
                        echo"<input class='form-control btn btn-outline-primary m-3' type='submit' value='Logout'/>";
                    }
                    ?>

                </form>

            </div>
        </div>
    </nav>

        <div class="row">
            <div class="col-centered">
                <div class="text-center" style=" width:100%; height: 350px;    background-image: url('https://picsum.photos/id/352/3264/2176');
    background-size: cover;">
                    <h1 class="fw-bald text-white">Brunswick</h1>
                    <p>
                    <h3 class="fw-light text-white">The law is equal for all</h3>
                    </p>
                </div>
            </div>
        </div>


    <div class="card" id="company_overview">
        <div class="card-body">
         <div class="card-header"><h4 class="text-white text-center" style=" width:100%; height: 150px;    background-image: url('https://picsum.photos/id/378/5000/3333');
             background-size: cover;"> Overview of the company</h4></div>
            <div class="card-text">
                <p>Brunswick handles all types of litigation in state and federal courts throughout the United States. The firm is particularly recognized for its representation of plaintiffs in high-stakes commercial litigation, business law litigation, federal and state securities, intellectual property, trademark, false advertising, and insurance litigation, as well as its trial and appellate work in such civil matters as lease/lease finance, real estate, investment, insurance, consumer lending, finance and insurance, employment law, health care, environmental, insurance and environmental, transportation,warrant and repossession, and employment law.</p>
            </div>
        </div>
    </div>

    <div class="row ml-1">
        <h2 class="text-center"> Company top employees</h2>
        <div id="card1" class="card col-sm-6 col-md-4 col-8 col-xl-3 m-5">
            <div class="card-body text-center">
                <div class="card-header "> <h4> Albert Hopkins</h4></div>
                <div class="card-picture">
                    <img src="/php_images/images.jpeg" width="200" height="150">
                </div>
            </div>
        </div>
        <div id="card2" class="card col-md-4 col-sm-6 col-8 col-xl-3 m-5">
            <div class="card-body text-center">
                <div class="card-header "> <h4> Amalia Crooks</h4></div>
                <div class="card-picture">
                    <img src="/php_images/lawyer.jpg" width="200" height="150">
                </div>
            </div>
        </div>
        <div id="card3" class="card col-sm-6 col-md-4 col-8 col-xl-3 m-5">
            <div class="card-body text-center">
                <div class="card-header"> <h4> John Smith</h4></div>
                <div class="card-picture">
                    <img src="/php_images/law.jpg" width="200" height="150">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">

        <h2 class="text-center">  Customers Reviews</h2>

        <div  class="row">
            <div id="card4" class="card col-sm-6 col-md-4 col-8 col-xl-3 m-5" >
                <div class="card-body text-center">
                    <div class="card-picture">
                        <img src="https://picsum.photos/id/177/2515/1830" style="height: 175px; width: 100%;" alt="something went wrong">

                    </div>
                    <div class="card-text">
                        <p> "Best law Company ever!!" - Mirko </p>
                    </div>
                </div>
            </div>
            <div id="card5" class="card col-sm-6 col-md-4 col-8 col-xl-3 m-5" >
                <div class="card-body text-center">
                    <div class="card-picture">
                        <img src="https://picsum.photos/id/64/4326/2884" style="height: 175px; width: 100%;" alt="something went wrong">
                    </div>
                    <div class="card-text">
                        <p> "Solved my case in no time!" - Lucy </p>
                    </div>
                </div>
            </div>
            <div id="card6" class="card col-md-4 col-8 col-sm-6 col-xl-3 m-5" >
                <div class="card-body text-center">
                    <div class="card-picture">

                        <img src="https://picsum.photos/id/65/4912/3264" style="height: 175px; width: 100%;" alt="something went wrong">


                    </div>
                    <div class="card-text">
                        <p>"Best firm ever, very professional lawyers!" - Maria </p>
                    </div>
                </div>
            </div>

        </div>



    <footer>
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                    </a>
                    <span class="mb-3 mb-md-0 text-muted">© 2022 Mirko Cuccurullo</span>
                </div>

                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3">
                        <a href="https://www.twitter.com">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                            </svg>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a href="https://www.facebook.com">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>

                            </svg>
                        </a>

                    </li>
                    <li class="ms-3">
                        <a href="https://www.discord.com">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
                                <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </footer>
        </div>
    </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                crossorigin="anonymous"></script>
</body>
</html>

