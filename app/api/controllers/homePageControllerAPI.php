<?php
require_once __DIR__ . '/../../service/homePageService.php';

class homePageControllerAPI
{
    private $homePageService;

    function __construct()
    {
        $this->homePageService = new homePageService();
    }

    public function index()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $cards = $this->homePageService->getAllHome();
            header('Content-Type: application/json');
            echo json_encode($cards);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = json_decode(file_get_contents('php://input'), true);
            $heading = $data['heading'];
            $image = $data['image'];
            $paragraph = $data['paragraph'];
            $link = $data['link'];

            $this->homePageService->insertHome($heading, $image, $paragraph, $link);
            header('Content-Type: application/json');
        }

    }

    public function updateHomePages()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = json_decode(file_get_contents('php://input'), true);
            $id = $data['id'];
            $heading = $data['heading'];
            $image = $data['image'];
            $paragraph = $data['paragraph'];
            $link = $data['link'];

            $this->homePageService->updateHomePages($id, $heading, $image, $paragraph, $link);
            header('Content-Type: application/json');
        }

    }

    public function deleteHome()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'];
        $this->homePageService->deleteHome($id);
        header('Content-Type: application/json');
    }

}