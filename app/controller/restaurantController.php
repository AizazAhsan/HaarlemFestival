<?php
require_once __DIR__ . '/../service/restaurantService.php';
require_once __DIR__ . '/../model/restaurant.php';
require_once __DIR__ . '/../model/session.php';


class restaurantController
{
    private restaurantService $restaurantService;

    public function __construct()
    {
        $this->restaurantService = new restaurantService();
    }

    public function displayFoodPage(): void
    {
        $restaurants = $this->restaurantService->getAllRestaurants();
        require __DIR__ . '/../view/yummy/yummy_homepage.php';
    }

    public function manageSessions(): void
    {
        if (isset($_SESSION['current_user']) && $_SESSION['current_user']->role == '3')
            require __DIR__ . '/../view/management/manageSessions.php';
        else
            header('Location: /festival/yummy');
    }


    public function manageRestaurant(): void
    {
        if(isset($_SESSION['current_user']) && $_SESSION['current_user']->role == '3')
            require __DIR__ . '/../view/management/manageRestaurant.php';
        else
            header('Location: /festival/yummy');
    }

    public function displayFormRestaurant(): void
    {
        if (isset($_SESSION['current_user']) && $_SESSION['current_user']->role == '3')
            require __DIR__ . '/../view/management/addRestaurant.php';
        else
            header('Location: /festival/yummy');
    }

    public function addRestaurant(): void
    {
        $picture_name = '/images/' . $_FILES['picture']['name'];
        //upload picture to public/images
        $target_dir = __DIR__ . "/../public/images/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
        $this->restaurantService->addRestaurant($_POST['name'], $_POST['description'], $_POST['address'], $_POST['cuisines'], $_POST['dietary'], $picture_name);
        header('Location: /manage/restaurant');
    }

    public function editRestaurant(): void
    {
        if (isset($_POST['id'])) {
            $restaurant = $this->restaurantService->getRestaurantByID($_POST['id']);
            require __DIR__ . '/../view/management/editRestaurant.php';
        } else
            header('Location: /manage/restaurant');
    }

    public function updateRestaurant(): void
    {
        if (isset($_FILES['picture'])) {
            $picture_name = '/images/' . $_FILES['picture']['name'];
            //upload picture to public/images
            $target_dir = __DIR__ . "/../public/images/";
            $target_file = $target_dir . basename($_FILES["picture"]["name"]);
            move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
        } else {
            $picture_name = $_POST['old_pic_path'];
        }
        $this->restaurantService->updateRestaurant($_POST['id'], $_POST['name'], $_POST['description'], $_POST['address'], $_POST['cuisines'], $_POST['dietary'], $picture_name);
        header('Location: /manage/restaurant');
    }

    public function editSession(): void
    {
        if (isset($_POST['id'])) {
            $session = $this->restaurantService->getSessionById($_POST['id']);
            require __DIR__ . '/../view/management/editSession.php';
        } else
            header('Location: /festival/yummy');
    }

    public function updateSession(): void
    {
        $this->restaurantService->updateSession($_POST['id'], $_POST['startTime'], $_POST['endTime'], $_POST['date'], $_POST['capacity'], $_POST['reservationPrice'], $_POST['sessionPrice'], $_POST['reducedPrice'], $_POST['restaurantId']);
        header('Location: /manage/session');

    }


    public function addSession(): void
    {
        $this->restaurantService->addSession($_POST['startTime'], $_POST['endTime'], $_POST['date'], $_POST['capacity'], $_POST['reservationPrice'], $_POST['sessionPrice'], $_POST['reducedPrice'], $_POST['restaurantId']);
        header('Location: /manage/session');
    }

    public function displayFormSession(): void
    {
        if (isset($_SESSION['current_user']) && $_SESSION['current_user']->role == '3')
            require __DIR__ . '/../view/management/addSession.php';
        else
            header('Location: /festival/yummy');
    }

    public function displayRestaurant(): void
    {
        $restaurant = $this->restaurantService->getRestaurantByID(intval($_POST['id']));
        if ($restaurant == null) {
            // handle the error, e.g. by redirecting to an error page
            die('Error: Restaurant not found.');
        }
        $restaurant->sessions = $this->restaurantService->getSessionsByRestaurantId(intval($_POST['id']));
        require __DIR__ . '/../view/yummy/view_restaurant.php';
    }


}