
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Home Page</title>
    <link href="css/style.css" rel="stylesheet">
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

                <input class="form-control btn btn-primary" type="submit" value="Book Appointment"/>

            </form>
            <form action="/logout" method="post">

                <input class="form-control btn btn-outline-primary m-2" type="submit" value="Logout"/>

            </form>

        </div>
    </div>
</nav>

<div class="container">
    <header class="header my-3 text-center"> <h1> Appointment Management </h1></header>
    <div id="appointments" class="row">



    </div>
</div>

<script>
    function loadData() {
        const articleDiv = document.getElementById('appointments');
        articleDiv.innerHTML = '';

        fetch('http://localhost/api/appointment')
            .then(result => result.json())
            .then((appointments)=>{
                appointments.forEach(appointment => {
                    appendAppointment(appointment);
                })
            })
    }



    function appendAppointment(appointment){

        const articleDiv = document.getElementById('appointments');
        const card = document.createElement('div');
        card.classList.add('card');
        card.classList.add('col-md-4');
        card.classList.add('col-sm-8');
        card.classList.add('col-xl-3');
        card.classList.add('text-bg-light');
        card.classList.add('m-5');
        const body = document.createElement('div');
        body.classList.add('card-body');
        const cardText = document.createElement('p');
        cardText.classList.add('card-text');
        const titleH2 = document.createElement('h2');
        titleH2.innerText = appointment.client_name;

        const cardText2 = document.createElement('p');
        cardText2.classList.add('card-text');
        cardText2.innerText = 'Date: ' + appointment.date;

        const cardText3 = document.createElement('p');
        cardText3.classList.add('card-text');
        cardText3.innerText = 'Time from: ' + appointment.time_from + ' to ' + appointment.time_to;


        const cardText4 = document.createElement('p');
        cardText4.classList.add('card-text');
        cardText4.innerText = 'Lawyer: ' + appointment.lawyer_name;

        const cardFooter = document.createElement('div');
        cardFooter.classList.add('card-footer');
        cardFooter.classList.add('text-bg-light');

        const form = document.createElement('form');
        form.method = 'post';
        form.classList.add('my-1');

        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'appointmentID';
        input.id = 'id';
        input.value = appointment.id;


        const deleteButton = document.createElement('input');
        deleteButton.type = 'submit';
        deleteButton.setAttribute('onclick','deleteItem(this)');
        deleteButton.classList.add('btn', 'btn-danger', 'm-2');
        deleteButton.value = 'Delete';
        deleteButton.name = 'deleteButton';
        deleteButton.id = appointment.id;

        const editButton = document.createElement('input');
        editButton.type = 'submit';
        editButton.setAttribute('formaction','/editAppointment');
        editButton.setAttribute('onclick','editItem(this)');
        editButton.classList.add('btn', 'btn-outline-primary', 'm-2');
        editButton.value = 'Edit';
        editButton.name = 'editButton';
        editButton.id = 'editButton';

        articleDiv.append(card);
        card.append(body);
        body.append(cardText);
        cardText.append(titleH2);
        body.append(cardText2);
        body.append(cardText3);
        body.append(cardText4);
        body.append(cardFooter);
        cardFooter.append(form);
        form.append(deleteButton);
        form.append(editButton);
        form.append(input);
    }
    loadData();
</script>

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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

<script>
    function deleteItem(e){
        console.log("Button element", e)
        var form = e.parentElement;
        var footer = form.parentElement;
        var body = footer.parentElement;
        var card = body.parentElement;
        card.remove();

        var id = e.id;

        var obj = {
            id: id,
        }

        fetch('http://localhost/api/appointmentDelete', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(obj)
        }).then(function (response) {
            return response.json()
        })
    }
</script>

<script>
    function editItem(e){
        document.getElementById(e.id).submit();
    }
</script>

</html>




