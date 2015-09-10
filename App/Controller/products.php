<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 9/09/2015
 * Time: 5:07 PM
 */

require_once('../App/Library/Files/UploadImage.php');
require_once('../App/Library/Files/ResizeImage.php');

class products extends Controller {

    public function index()
    {
        echo 'Hello';
    }

    public function create()
    {
        $this->view('Product/create');
    }

    /**
     * Adds products to the databse
     * Uploads images
     * Resizes the image for a main image and a thumbnail
     *
     */
    public function store(){

        $this->model('Product');

        // Variables needed
        $max = 500 * 1024; //size of the image
        $destination =  'images/products';

        // Save the newly created image path to the database
        if (!empty($_FILES['image']['name']))
        {
            $file = $this->uploadFile($destination, $max);
            $resize = new \App\library\ResizeImage($file, 400, 400);
            $resize->createResizeImage();
            $resize->createThumbNail(200, 200);
        }

        Product::Add($_POST['Name'], $file, $_POST['Price'], $_POST['Description']);
        $link = Links::action_link('home/index');
        header('location: ' . $link);

    }

    /**
     * Upload a file
     *
     * @param $destination
     * @param $max
     * @return string
     * @throws \Exception
     */
    private function uploadFile($destination, $max)
    {
        try {
            $upload = new UploadImage($destination);
            $upload->setMaxSize($max);
            $upload->upload();
            $results = $upload->getMessages();
        } catch (Exception $e) {
            $results = $e->getMessage();
        }

        // Collecting the data to save into the table
        $fileName = $upload->getName(current($_FILES));
        $file = $destination . '/' . $fileName;

        return $file;
    }
}