<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/db.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(dirname(__DIR__) . '/templates');
$twig = new Environment($loader, []);
$db = new DB(HOST, USER, PASS, DB_NAME);

try {
    if ($_GET['image_id']) {
        $id = $_GET['image_id'];
        if (is_numeric($id)) {
            $db->incImageViewsCount($id);
            $image = mysqli_fetch_assoc($db->getImage($id));
            if ($image) {
                echo $twig->render('image.twig', ['image' => $image]);
            } else {
                throw new Exception("Can't find image with id = " . $id);
            }
        } else {
            throw new Exception('image_id is not numeric');
        }
    } else {
        $images = mysqli_fetch_all($db->getImage(), MYSQLI_ASSOC);
        echo $twig->render('gallery.twig', ['images' => $images]);
    }
} catch (Exception $e) {
    var_dump($e);
}
