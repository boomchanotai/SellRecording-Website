<?php

    $conn = new mysqli("localhost", "root", "", "monbakery");
    $sql = "SELECT * FROM product";
    $sql = $conn->query($sql);
    $productamonut = $sql->num_rows -1;

    echo $productamonut;
?>