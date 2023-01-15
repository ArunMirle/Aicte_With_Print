<?php

include "../connection.php";

$id = $_GET["id"];
mysqli_query($data, "DELETE FROM `user_info`.`event_booking` where `id`=$id;");
?>

<script type="text/javascript">
window.location = "profile.php";
</script>