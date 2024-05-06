<?php
// Thêm API key của bạn ở đây
$apiKey = 'f1cab202dd944a0fa2091e70b9a4cd6d';

// Thiết lập các tham số cho yêu cầu API
$endpoint = 'https://newsapi.org/v2/top-headlines';
$source = 'bbc-news'; // Thay đổi nguồn tin tại đây
$country = 'us'; // Thay đổi quốc gia tại đây (nếu cần)
$category = 'business'; // Thay đổi loại tin tại đây (nếu cần)

// Xây dựng URL cho yêu cầu API
$url = "https://newsdata.io/api/1/news?apikey=pub_43560cbec9b4b0b5795ecefab06d40381f155&q=news&country=vi";

// Gửi yêu cầu API và nhận phản hồi
$response = file_get_contents($url);

// Xử lý phản hồi
if ($response) {
    $data = json_decode($response);
} else {
    // Không thể kết nối đến API
    echo "Failed to connect to News API.";
}
?>

<?php

$results = $data ->results;

foreach($results as $result)
{
?>

<div class="container">
    <div class="h2">Xin chao</div>
    <img src="<?php echo $result -> image_url ?>" alt="" style="width: 400px; height: 300px;">
</div>
<?php
}
?>
