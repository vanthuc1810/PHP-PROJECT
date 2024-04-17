<?php
require 'vendor/autoload.php';
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use GuzzleHttp\Psr7\Request;

Configuration::instance([
    'cloud' => [
      'cloud_name' => 'vanthuc', 
      'api_key' => '143549995223456', 
      'api_secret' => 'TtV28amUWGGl281c4ACPJASZPgM'],
    'url' => [
      'secure' => true]]);


if (isset($_FILES['product_img']['name'])) {
  $file_temp = $_FILES['product_img']['name'];
  $uploadApi = new UploadApi();
  $file_temp = 'C:\Users\VanThuc\OneDrive\Desktop\Giai tich\admin\uploads\\' . $file_temp;
  $response = $uploadApi->upload($file_temp);
}
?>
