<?php
include __DIR__ . '/../header.php'; ?>

    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-center mb-3">Manage Restaurants</h1>
        <a href="/add/restaurant" class="btn btn-success">Add new</a>
    </div>

    <div class="table table-responsive">
        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Description</th>
                <th scope="col">Cuisines</th>
                <th scope="col">Dietary</th>
                <th scope="col">Photos</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>

            </tr>
            </thead>
            <tbody class="table-group-divider" id="restaurantTable">

            <script>

                function loadRestaurants() {
                    fetch('http://localhost/api/restaurant')
                        .then(result => result.json())
                        .then((restaurants)=>{
                            restaurants.forEach(restaurant => {
                                appendRestaurant(restaurant);
                            })
                            console.log(restaurants);
                        })
                }

                function deleteRestaurant(eventId) {

                    const obj = {id: eventId};
                    fetch('http://localhost/api/delete/restaurant', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(obj),
                    }).then(result => {
                        console.log(result)
                    });
                }
                function appendRestaurant(restaurant)
                {

                    const newRow = document.createElement("tr");
                    const idCol = document.createElement("th");
                    const nameCol = document.createElement("td");
                    const addressCol = document.createElement("td");
                    const descriptionCol = document.createElement("td");
                    const cuisinesCol = document.createElement("td");
                    const dietaryCol = document.createElement("td");
                    const photosCol = document.createElement("td");
                    const deleteButtonCol = document.createElement("td");
                    const editButtonCol = document.createElement("td");
                    const deleteButton = document.createElement("button")
                    const editButton = document.createElement("button")
                    const editForm = document.createElement("form");
                    const idInput = document.createElement("input");
                    editForm.action = '/edit/restaurant';
                    editForm.method = 'post';

                    deleteButton.className = "btn btn-danger";
                    editButton.className = "btn btn-warning";
                    deleteButton.type = "button";
                    editButton.type = "submit";
                    idCol.scope = "row";
                    idInput.type = "hidden";

                    idInput.name = "id";
                    idInput.value = restaurant.id;
                    idCol.innerHTML = restaurant.id;
                    nameCol.innerHTML = restaurant.name;
                    addressCol.innerHTML = restaurant.address;
                    descriptionCol.innerHTML = restaurant.description;
                    cuisinesCol.innerHTML = restaurant.cuisines;
                    dietaryCol.innerHTML = restaurant.dietary;
                    photosCol.innerHTML = restaurant.photo;
                    deleteButton.innerHTML = "Delete";
                    editButton.innerHTML = "Edit";

                    deleteButton.addEventListener('click', function ()
                    {
                        deleteRestaurant(restaurant.id);
                        table.removeChild(newRow);
                    })

                    editForm.appendChild(editButton);
                    editForm.appendChild(idInput);

                    deleteButtonCol.appendChild(deleteButton);
                    editButtonCol.appendChild(editForm);

                    newRow.appendChild(idCol);
                    newRow.appendChild(nameCol);
                    newRow.appendChild(addressCol);
                    newRow.appendChild(descriptionCol);
                    newRow.appendChild(cuisinesCol);
                    newRow.appendChild(dietaryCol);
                    newRow.appendChild(photosCol);
                    newRow.appendChild(deleteButtonCol);
                    newRow.appendChild(editButtonCol);

                    const table = document.getElementById("restaurantTable");
                    table.appendChild(newRow);
                }
                loadRestaurants();
            </script>
        </table>
    </div>

<?php
include __DIR__ . '/../footer.php'; ?>