<?php

include("conn.php");

$country_details = "select * from country";

$query_run = mysqli_query($conn, $country_details);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Country and City Dropdown</h3>

                <form>
                    <div class="form-group">
                        <label >Select Country:</label>
                        <select class="form-control" id="countrySelect">
                            <option>--select country--- </option>
                            <?php
                            foreach ($query_run as $row) {

                                echo "<option value='$row[country_id]'>$row[country_name]</option>";
                            }


                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label >Select state:</label>
                        <select class="form-control" id="stateSelect">
                       <option>--select state-- </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label >Select state:</label>
                        <select class="form-control" id="citySelect">
                       <option>--select city-- </option>

                        </select>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#countrySelect').on('change', function() {

                var sid = $(this).val()
                 $.ajax({
                    url: "state.php",
                   type: "POST",
                   data: { countryid: sid },
                    success: function(mydata) {

                        $("#stateSelect").html(mydata);

                    }
                })

            })

        })

    </script>

<script>
        $(document).ready(function() {
            $('#stateSelect').on('change', function() {

                var cid = $(this).val()
                console.log(cid);
                 $.ajax({
                    url: "city.php",
                   type: "POST",
                   data: { state_id: cid },
                    success: function(data) {

                        $("#citySelect").html(data);

                    }
                })

            })

        })

    </script>




</body>

</html>