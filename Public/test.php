<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 30/08/2015
 * Time: 8:00 PM
 */?>

    <?php
    try {
        require_once('../Database/connect.php');
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
?>

<?php

echo $dsn;


if ($db) {
    echo 'Connection Successful';
} elseif (isset($error)) {
    echo 'Connection failed ' . $error;
}

try{
    $sql = "SELECT useUserID, useFirstName, useLastName FROM tblUser";

    $result = $db->query($sql);
    $errorInfo = $db->errorInfo();
    if(isset($errorInfo[2])){
        $error = $errorInfo[2];
        return $error;
    }

} catch(Exception $e) {
    $error = $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Clothing Mart</title>

</head>
<body>

<pre>
    <?php var_dump($result->fetch()) ?>
</pre>
</body>
</html>
