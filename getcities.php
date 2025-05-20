<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "ajax_demo";

// 1) connect
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

// 2) if a state was passed, query its cities
if (isset($_GET['state']) && $_GET['state'] !== "")
{
    $state = mysqli_real_escape_string($conn, $_GET['state']);
    $sql   = "SELECT city_name FROM cities WHERE state_name = '$state'
              ORDER BY city_name";
    $result = mysqli_query($conn, $sql);

    // 3) emit a <select> of cities
    echo "<select id='citySelect' name='city'>";
    echo "<option value=''>-- Select a city --</option>";
    while ($row = mysqli_fetch_assoc($result))
    {
        $city = htmlspecialchars($row['city_name'], ENT_QUOTES, 'UTF-8');
        echo "<option value=\"{$city}\">{$city}</option>";
    }
    echo "</select>";
}
else
{
    // empty or invalid state => clear the span
    echo "";
}

mysqli_close($conn);
?>