<?php
session_start();
$username = $_SESSION['user_name'];
if (!isset($_SESSION['user_name'])) {
    header("location:../login.php");
}   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <script src="filter.js"></script>
    <script>
    $(document).ready(function() {
        $("#btn").click(function() {
            var x = $("#ride").val();
            console.log(x);
            $.ajax({
                url: "../cabnew/ajax.php",
                method: "POST",
                data: {
                    x: x
                },
                success: function(msg) {
                    $(".main").html(msg);
                }
            });
        });
        x = 2;
        $.ajax({
            url: "../cabnew/ajax.php",
            method: "POST",
            data: {
                x: x
            },
            success: function(msg) {
                $(".main").html(msg);
            }
        });
    });
    </script>
</head>

<body>
    <?php include("navigation.php") ?>
    <select id="ride">
        <option value="2">
            ALL RIDES
        </option>
        <option value="0">
            PENDING RIDES
        </option>
        <option value="1">
            SUCCESSFULL RIDES
        </option>
    </select>
    <input type="button" id="btn" value="PRESS">
    <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
    <!-- <label for="sorting">Sort BY</label> -->
    <select name="sort1" onchange="sortTable1(this.value,myTable)">
        <option value="" selected hidden disabled>SORT BY</option>
        <option value="5">Distance</option>
        <option value="6">Weight</option>
        <option value="7">Ride Fare</option>
    </select>
    <div class="main"></div>
</body>

</html>