<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hotel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>

        .sendreset
        {
            font-size: 14px;
            background-color: rgba(37, 41, 42, 0.22);

        }
        .sendreset:hover{
            background-color: #e2e2ba;
        }
        #login
        {
            background-color: rgba(224, 222, 215, 0.8);
            margin-top: -12px;
            padding-top: 13px;
            padding-bottom: 5px;
            /*border: solid 1px rgba(227, 209, 160, 0.64);*/
            border-radius: 10px;
        }
        @media (max-width: 344px) {
            h1 {font-size:15px;
                font-weight:bold;
            }
            #login label
            {
                font-size: 13px;
            }
            .sendreset
            {
                font-size: 12px;

            }


        }
        @media (min-width: 345px) {
            h1 {font-size:17px;
                font-weight:bold;
            }
            #login label
            {
                font-size: 14px;
            }

        }


        /* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
        @media (min-width: 768px) {
            h1 {font-size:32px;} /*1rem = 16px*/
        }
    </style>
    <link href="/hotel/style.css" rel="stylesheet" type="text/css">


</head>

<body>


<div id="welcome" class="col-11 col-sm-11 col-md-5 col-lg-5 mx-auto">
    <h1>Login</h1>
</div>
<div id="login" class="col-11 col-sm-11 col-md-5 col-lg-5 mx-auto  d-flex justify-content-center">
    <form method="post" action="adminlog.php" name="login" >
        <div style="color:#f00;text-align: center;">
            <?php

            $l = "";

            if (isset($_GET["l"])) {
                $l = $_GET["l"];

                switch ($l) {
                    case "0" :
                        echo "You are not the Admin!";
                        break;
                }
            }
            ?>
        </div>
        <label for="username">Username: </label><br>
        <input type="text" class="col-11 col-sm-10 col-md-12 col-lg-12" name="username" size="20" maxlength="20" id="username"><br>
        <label for="password ">Password: </label><br>
        <input type="password" class="col-11 col-sm-10 col-md-12 col-lg-12" name="password" id="password"><br>
        <input class="sendreset m-2 m col-10  col-sm-4 col-md-5 col-lg-5" type="submit" name="sd" value="login">
        <input class="sendreset m-2 col-10 col-sm-4 col-md-5 col-lg-5" type="reset" name="rd" value="cancel">
    </form>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
