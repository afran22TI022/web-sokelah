<?php 
if(isset($_GET['page'])) {
    $page = $_GET['page'];
    if(file_exists($page . '.php')) {
        include($page.'.php');
    } else {
        echo "<center><h5>yaaaaa tidak ditemukan</h5></center>";
    }
} else {
    include 'Home.php'; // Jika ?page tidak ada, tampilkan Home
}
?>