<?php
session_start();
if ($_SESSION['login'] == "") {
    // header("Location: dashboard.php");
    echo '<script>window.location="login.php"</script>';
} else if ($_SESSION['user'] != "admin") {
    echo '<script>window.location="index_user.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin, dashboard">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dompet : Payment Admin Template">
    <meta property="og:title" content="Dompet : Payment Admin Template">
    <meta property="og:description" content="Dompet : Payment Admin Template">
    <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <?php require 'view/title.php' ?>

    <!-- Datatable -->
    <link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/nouislider/nouislider.min.css">
    <!-- Style css -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>



    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <svg class="logo-abbr" width="53" height="53" viewbox="0 0 53 53">
                    <path d="M21.6348 8.04782C21.6348 5.1939 23.9566 2.87204 26.8105 2.87204H28.6018L28.0614 1.37003C27.7576 0.525342 26.9616 0 26.1132 0C25.8781 0 25.639 0.0403711 25.4052 0.125461L7.3052 6.7133C6.22916 7.105 5.67535 8.29574 6.06933 9.37096L7.02571 11.9814H21.6348V8.04782Z" fill="#759DD9"></path>
                    <path d="M26.8105 5.97754C25.6671 5.97754 24.7402 6.90442 24.7402 8.04786V11.9815H42.8555V8.04786C42.8555 6.90442 41.9286 5.97754 40.7852 5.97754H26.8105Z" fill="#F8A961"></path>
                    <path class="svg-logo-primary-path" d="M48.3418 41.8457H41.0957C36.8148 41.8457 33.332 38.3629 33.332 34.082C33.332 29.8011 36.8148 26.3184 41.0957 26.3184H48.3418V19.2275C48.3418 16.9408 46.4879 15.0869 44.2012 15.0869H4.14062C1.85386 15.0869 0 16.9408 0 19.2275V48.8594C0 51.1462 1.85386 53 4.14062 53H44.2012C46.4879 53 48.3418 51.1462 48.3418 48.8594V41.8457Z" fill="#5BCFC5"></path>
                    <path class="svg-logo-primary-path" d="M51.4473 29.4238H41.0957C38.5272 29.4238 36.4375 31.5135 36.4375 34.082C36.4375 36.6506 38.5272 38.7402 41.0957 38.7402H51.4473C52.3034 38.7402 53 38.0437 53 37.1875V30.9766C53 30.1204 52.3034 29.4238 51.4473 29.4238ZM41.0957 35.6348C40.2382 35.6348 39.543 34.9396 39.543 34.082C39.543 33.2245 40.2382 32.5293 41.0957 32.5293C41.9532 32.5293 42.6484 33.2245 42.6484 34.082C42.6484 34.9396 41.9532 35.6348 41.0957 35.6348Z" fill="#5BCFC5"></path>
                </svg>
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="brand-title" width="283.000000pt" height="59.000000pt" viewBox="0 0 283.000000 59.000000" preserveAspectRatio="xMidYMid meet">

                    <g transform="translate(0.000000,59.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M61 576 c-7 -9 -10 -16 -6 -16 5 0 0 -9 -10 -20 -9 -10 -22 -18 -29 -17 -8 1 -12 -42 -14 -144 l-3 -147 32 -31 c29 -29 35 -31 108 -31 74 0 78 1 109 33 30 31 32 37 31 107 0 41 -3 70 -5 63 -3 -7 -12 -9 -20 -6 -12 4 -12 8 -4 13 7 4 9 16 5 29 -5 18 -14 21 -61 21 -42 0 -56 -4 -61 -17 -4 -10 -1 -19 6 -21 9 -3 9 -7 0 -18 -6 -8 -8 -14 -3 -14 5 0 20 -9 34 -20 14 -11 18 -18 9 -15 -13 5 -15 1 -12 -19 5 -23 2 -26 -26 -26 l-31 0 0 69 c0 46 -4 71 -12 74 -10 4 -10 6 0 6 6 1 12 9 12 20 0 27 51 36 57 10 3 -11 12 -19 20 -19 13 0 13 3 3 15 -11 13 -10 14 4 9 9 -3 16 -10 16 -14 0 -7 20 -8 63 -1 4 0 7 6 7 12 0 5 -5 7 -10 4 -6 -4 -10 6 -10 21 0 17 -11 39 -27 56 -15 15 -22 28 -17 28 16 0 52 -46 57 -72 4 -22 4 -22 6 3 1 16 -9 35 -29 54 -25 24 -39 29 -102 33 -60 3 -76 1 -87 -12z m149 -81 c0 -9 -9 -15 -22 -14 -17 1 -19 2 -5 6 9 2 17 9 17 14 0 5 2 9 5 9 3 0 5 -7 5 -15z m56 -261 c-3 -8 -11 -14 -18 -14 -9 0 -9 3 0 12 7 7 13 37 14 67 l2 56 3 -54 c2 -29 2 -60 -1 -67z m-220 -26 l29 -33 -32 29 c-31 28 -38 36 -30 36 2 0 16 -15 33 -32z m194 -2 c0 -2 -8 -10 -17 -17 -16 -13 -17 -12 -4 4 13 16 21 21 21 13z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M327 538 c5 -64 10 -81 21 -74 5 3 9 -2 9 -10 0 -8 -6 -13 -13 -10 -10 4 -12 -19 -11 -104 2 -109 -8 -139 -16 -45 l-3 50 -2 -56 c-2 -51 1 -58 32 -88 32 -31 36 -32 112 -30 68 1 83 5 105 26 28 26 27 10 17 303 -1 25 2 55 6 68 7 21 5 22 -41 22 l-48 0 4 -81 c2 -51 -1 -85 -8 -92 -13 -13 -15 -81 -3 -73 5 3 9 -1 9 -9 0 -8 -4 -12 -8 -9 -5 3 -7 -9 -6 -26 1 -19 7 -30 17 -30 13 0 13 -1 0 -10 -21 -14 -30 -12 -30 5 0 8 -4 15 -9 15 -5 0 -7 -9 -4 -20 3 -11 1 -20 -5 -20 -5 0 -13 11 -16 25 -4 14 -12 25 -19 25 -9 0 -9 2 1 8 9 6 10 16 3 34 -7 18 -6 29 2 37 8 8 6 11 -9 11 -18 1 -18 1 -1 14 14 11 17 29 17 99 0 94 -2 97 -69 97 l-38 0 4 -52z m90 -5 c-3 -10 -5 -4 -5 12 0 17 2 24 5 18 2 -7 2 -21 0 -30z m134 -10 c-11 -4 -11 -7 0 -13 7 -5 14 -16 15 -24 3 -21 -32 -21 -40 0 -7 18 10 44 28 43 6 0 5 -3 -3 -6z m-54 -155 c-3 -8 -6 -5 -6 6 -1 11 2 17 5 13 3 -3 4 -12 1 -19z m5 -125 c-6 -2 -9 -10 -6 -15 4 -7 2 -8 -5 -4 -13 9 -5 26 12 25 9 0 8 -2 -1 -6z m-9 -36 c4 3 7 2 7 -4 0 -12 -30 -26 -38 -18 -3 3 0 5 7 5 9 0 9 6 1 23 -10 20 -10 20 3 5 8 -10 17 -15 20 -11z m-117 -9 c0 -10 -1 -18 -2 -18 0 0 -8 8 -17 18 -15 16 -15 18 1 18 10 0 18 -8 18 -18z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M698 583 c12 -2 30 -2 40 0 9 3 -1 5 -23 4 -22 0 -30 -2 -17 -4z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M801 583 c25 -3 45 -14 65 -36 l29 -32 -31 28 c-28 25 -36 27 -107 25 -42 -2 -77 -6 -77 -10 0 -5 -3 -7 -7 -7 -31 5 -33 -3 -33 -118 0 -64 -2 -114 -5 -111 -3 2 -6 58 -6 124 -2 78 -5 106 -9 81 -4 -21 -6 -51 -5 -67 1 -17 2 -64 3 -106 2 -57 5 -73 15 -68 8 5 8 2 -2 -9 -11 -14 -11 -17 0 -17 12 0 12 -2 0 -9 -11 -7 -11 -9 0 -14 10 -4 10 -6 2 -6 -7 -1 -13 -11 -13 -23 0 -19 2 -20 10 -8 6 10 10 11 10 3 0 -10 26 -13 98 -13 64 0 103 4 112 13 12 10 12 9 1 -5 -10 -14 -33 -18 -119 -21 l-107 -3 111 -2 c109 -2 118 0 123 31 0 4 7 20 16 37 11 21 12 31 3 36 -8 5 -7 10 3 18 18 14 18 67 0 85 -11 12 -11 16 0 25 16 12 25 71 10 62 -5 -4 -4 7 2 24 10 27 9 32 -23 65 -27 28 -41 35 -69 33 l-36 -1 36 -4z m-16 -105 c8 -38 10 -218 3 -218 -5 0 -8 5 -8 10 0 6 -8 10 -17 10 -15 0 -16 -2 -3 -10 13 -8 12 -10 -2 -10 -10 0 -19 3 -19 8 -1 4 -4 18 -6 32 -2 14 -5 61 -6 106 -2 80 -2 80 22 76 16 -3 22 -1 17 7 -4 6 -3 11 3 11 6 0 13 -10 16 -22z m27 -72 c3 -14 1 -31 -3 -38 -6 -8 -9 1 -9 25 0 42 6 48 12 13z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M1010 564 c-13 -32 -12 -37 0 -29 15 9 12 -6 -4 -19 -11 -9 -76 -292 -76 -333 0 -7 19 -11 54 -11 53 1 54 1 60 33 5 27 12 34 36 37 22 3 30 0 31 -11 0 -12 3 -11 9 4 6 14 7 6 3 -22 l-6 -43 62 0 c55 0 62 2 57 18 -2 9 -8 36 -11 60 -4 23 -11 42 -16 42 -6 0 -8 4 -5 8 6 10 -32 235 -45 270 -7 18 -16 22 -48 22 -22 0 -42 -5 -44 -12 -4 -10 -6 -10 -6 0 -2 23 -41 13 -51 -14z m147 -46 c-3 -7 -5 -2 -5 12 0 14 2 19 5 13 2 -7 2 -19 0 -25z m10 -40 c-3 -8 -6 -5 -6 6 -1 11 2 17 5 13 3 -3 4 -12 1 -19z m-81 -64 c-4 -9 -9 -15 -11 -12 -3 3 -3 13 1 22 4 9 9 15 11 12 3 -3 3 -13 -1 -22z m-109 -76 c-3 -8 -6 -5 -6 6 -1 11 2 17 5 13 3 -3 4 -12 1 -19z m221 -23 c-3 -3 -9 2 -12 12 -6 14 -5 15 5 6 7 -7 10 -15 7 -18z m19 -107 c-3 -7 -5 -2 -5 12 0 14 2 19 5 13 2 -7 2 -19 0 -25z m-72 -18 c3 -5 1 -10 -4 -10 -6 0 -11 5 -11 10 0 6 2 10 4 10 3 0 8 -4 11 -10z m-178 -6 c-3 -3 -12 -4 -19 -1 -8 3 -5 6 6 6 11 1 17 -2 13 -5z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M1270 409 c0 -117 3 -178 10 -174 6 3 10 1 10 -4 0 -6 -4 -11 -10 -11 -5 0 -10 -11 -10 -25 0 -24 3 -25 53 -25 28 0 48 4 42 8 -6 4 -8 32 -4 67 l6 60 3 -60 3 -60 6 55 6 55 14 -48 c10 -34 17 -44 23 -35 6 9 8 5 6 -12 -3 -24 -1 -25 58 -28 l62 -3 4 36 c2 19 -1 40 -7 46 -7 9 -7 10 1 6 8 -5 11 15 9 66 -1 40 -3 72 -4 72 -1 0 -2 44 -3 98 0 92 -1 97 -22 96 -20 0 -20 -1 -1 -9 15 -6 9 -9 -25 -9 -34 0 -40 3 -25 9 19 8 19 9 -2 9 -21 1 -23 -3 -23 -55 0 -30 4 -53 9 -50 5 4 7 -3 4 -14 -5 -18 -7 -18 -29 -3 -13 8 -24 20 -24 27 0 6 5 4 10 -4 11 -17 13 -1 4 25 -6 13 -9 14 -16 3 -6 -9 -7 -6 -3 9 3 12 1 31 -5 43 -9 17 -21 20 -70 20 l-60 0 0 -181z m98 164 c-15 -2 -42 -2 -60 0 -18 2 -6 4 27 4 33 0 48 -2 33 -4z m93 -190 c-12 -20 -14 -14 -5 12 4 9 9 14 11 11 3 -2 0 -13 -6 -23z m-94 -5 c-3 -8 -6 -5 -6 6 -1 11 2 17 5 13 3 -3 4 -12 1 -19z m147 -20 c-9 -14 -23 2 -17 18 4 12 8 13 14 3 4 -7 5 -17 3 -21z m26 -39 c0 -6 -4 -7 -10 -4 -5 3 -10 11 -10 16 0 6 5 7 10 4 6 -3 10 -11 10 -16z m-227 -136 c-7 -2 -19 -2 -25 0 -7 3 -2 5 12 5 14 0 19 -2 13 -5z m160 0 c-7 -2 -21 -2 -30 0 -10 3 -4 5 12 5 17 0 24 -2 18 -5z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M1651 576 c-7 -9 -10 -16 -6 -16 5 0 0 -9 -10 -20 -9 -10 -22 -18 -29 -17 -8 1 -12 -42 -14 -144 l-3 -147 32 -31 c29 -29 35 -31 108 -31 74 0 78 1 109 33 30 31 32 37 31 107 0 41 -3 70 -5 63 -3 -7 -12 -9 -20 -6 -12 4 -12 8 -4 13 7 4 9 16 5 29 -5 18 -14 21 -61 21 -42 0 -56 -4 -61 -17 -4 -10 -1 -19 6 -21 9 -3 9 -7 0 -18 -6 -8 -8 -14 -3 -14 5 0 20 -9 34 -20 14 -11 18 -18 9 -15 -13 5 -15 1 -12 -19 5 -23 2 -26 -26 -26 l-31 0 0 69 c0 46 -4 71 -12 74 -10 4 -10 6 0 6 6 1 12 9 12 20 0 27 51 36 57 10 3 -11 12 -19 20 -19 13 0 13 3 3 15 -11 13 -10 14 4 9 9 -3 16 -10 16 -14 0 -7 20 -8 63 -1 4 0 7 6 7 12 0 5 -4 7 -10 4 -6 -4 -10 6 -10 21 0 17 -11 39 -27 56 -15 15 -22 28 -17 28 16 0 52 -46 57 -72 4 -22 4 -22 6 3 1 16 -9 35 -29 54 -25 24 -39 29 -102 33 -60 3 -76 1 -87 -12z m149 -81 c0 -9 -9 -15 -22 -14 -17 1 -19 2 -5 6 9 2 17 9 17 14 0 5 2 9 5 9 3 0 5 -7 5 -15z m56 -261 c-3 -8 -11 -14 -18 -14 -9 0 -9 3 0 12 7 7 13 37 14 67 l2 56 3 -54 c2 -29 2 -60 -1 -67z m-220 -26 l29 -33 -32 29 c-31 28 -38 36 -30 36 2 0 16 -15 33 -32z m194 -2 c0 -2 -8 -10 -17 -17 -16 -13 -17 -12 -4 4 13 16 21 21 21 13z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M1980 564 c-13 -32 -12 -37 0 -29 15 9 12 -6 -4 -19 -11 -9 -76 -292 -76 -333 0 -7 19 -11 54 -11 53 1 54 1 60 33 5 27 12 34 36 37 22 3 30 0 31 -11 0 -12 3 -11 9 4 6 14 7 6 3 -22 l-6 -43 62 0 c55 0 62 2 57 18 -2 9 -8 36 -11 60 -4 23 -11 42 -16 42 -6 0 -8 4 -5 8 6 10 -32 235 -45 270 -7 18 -16 22 -48 22 -22 0 -42 -5 -44 -12 -4 -10 -6 -10 -6 0 -2 23 -41 13 -51 -14z m147 -46 c-3 -7 -5 -2 -5 12 0 14 2 19 5 13 2 -7 2 -19 0 -25z m10 -40 c-3 -8 -6 -5 -6 6 -1 11 2 17 5 13 3 -3 4 -12 1 -19z m-81 -64 c-4 -9 -9 -15 -11 -12 -3 3 -3 13 1 22 4 9 9 15 11 12 3 -3 3 -13 -1 -22z m-109 -76 c-3 -8 -6 -5 -6 6 -1 11 2 17 5 13 3 -3 4 -12 1 -19z m221 -23 c-3 -3 -9 2 -12 12 -6 14 -5 15 5 6 7 -7 10 -15 7 -18z m19 -107 c-3 -7 -5 -2 -5 12 0 14 2 19 5 13 2 -7 2 -19 0 -25z m-72 -18 c3 -5 1 -10 -4 -10 -6 0 -11 5 -11 10 0 6 2 10 4 10 3 0 8 -4 11 -10z m-178 -6 c-3 -3 -12 -4 -19 -1 -8 3 -5 6 6 6 11 1 17 -2 13 -5z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M2235 582 c-3 -3 -5 -15 -4 -26 0 -21 1 -21 9 -1 6 14 9 -4 9 -55 1 -52 -2 -70 -9 -60 -8 12 -10 11 -10 -7 0 -17 4 -21 17 -16 13 5 15 2 10 -11 -4 -10 -7 -21 -7 -24 0 -4 -5 0 -10 8 -6 10 -9 -25 -9 -102 l1 -118 31 0 c24 0 28 3 17 10 -12 8 -10 10 8 10 13 0 20 -4 17 -10 -3 -5 3 -10 14 -10 23 0 27 20 10 52 -8 15 -8 19 0 14 7 -4 11 1 11 13 0 18 6 21 48 21 42 0 52 4 83 38 36 38 53 102 27 102 -9 0 -9 3 0 12 7 7 12 31 12 53 0 33 -6 47 -32 71 -17 16 -28 22 -24 14 4 -8 -1 -5 -11 7 -16 21 -26 22 -111 21 -51 -1 -94 -4 -97 -6z m245 -47 c11 -13 10 -14 -4 -9 -9 3 -16 10 -16 15 0 13 6 11 20 -6z m-90 -105 c0 -47 -2 -50 -25 -50 -19 0 -25 5 -26 23 -1 12 -2 29 -3 37 -2 22 14 40 35 40 16 0 19 -8 19 -50z m97 8 c-3 -8 -6 -5 -6 6 -1 11 2 17 5 13 3 -3 4 -12 1 -19z m-80 -80 c-3 -8 -6 -5 -6 6 -1 11 2 17 5 13 3 -3 4 -12 1 -19z m43 -63 c-9 -11 -29 -14 -69 -13 l-56 2 55 3 c30 2 59 8 65 14 15 15 19 10 5 -6z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M2535 582 c-3 -3 -5 -15 -4 -26 0 -21 1 -21 9 -1 6 14 9 -4 9 -55 1 -52 -2 -70 -9 -60 -8 12 -10 11 -10 -7 0 -17 4 -21 17 -16 13 5 15 2 10 -11 -4 -10 -7 -21 -7 -24 0 -4 -5 0 -10 8 -6 10 -9 -25 -9 -102 l1 -118 31 0 c24 0 28 3 17 10 -12 8 -10 10 8 10 13 0 20 -4 17 -10 -3 -5 3 -10 14 -10 23 0 27 20 10 52 -8 15 -8 19 0 14 7 -4 11 1 11 13 0 18 6 21 48 21 42 0 52 4 83 38 36 38 53 102 27 102 -9 0 -9 3 0 12 7 7 12 31 12 53 0 33 -6 47 -32 71 -17 16 -28 22 -24 14 4 -8 -1 -5 -11 7 -16 21 -26 22 -111 21 -51 -1 -94 -4 -97 -6z m245 -47 c11 -13 10 -14 -4 -9 -9 3 -16 10 -16 15 0 13 6 11 20 -6z m-90 -105 c0 -47 -2 -50 -25 -50 -19 0 -25 5 -26 23 -1 12 -2 29 -3 37 -2 22 14 40 35 40 16 0 19 -8 19 -50z m97 8 c-3 -8 -6 -5 -6 6 -1 11 2 17 5 13 3 -3 4 -12 1 -19z m-80 -80 c-3 -8 -6 -5 -6 6 -1 11 2 17 5 13 3 -3 4 -12 1 -19z m43 -63 c-9 -11 -29 -14 -69 -13 l-56 2 55 3 c30 2 59 8 65 14 15 15 19 10 5 -6z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M30 550 c-8 -5 -12 -12 -9 -15 4 -3 12 1 19 10 14 17 11 19 -10 5z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M1620 550 c-8 -5 -12 -12 -9 -15 4 -3 12 1 19 10 14 17 11 19 -10 5z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M311 444 c0 -11 3 -14 6 -6 3 7 2 16 -1 19 -3 4 -6 -2 -5 -13z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M271 404 c0 -11 3 -14 6 -6 3 7 2 16 -1 19 -3 4 -6 -2 -5 -13z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M1861 404 c0 -11 3 -14 6 -6 3 7 2 16 -1 19 -3 4 -6 -2 -5 -13z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M312 375 c0 -16 2 -22 5 -12 2 9 2 23 0 30 -3 6 -5 -1 -5 -18z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M130 340 c0 -5 5 -10 11 -10 5 0 7 5 4 10 -3 6 -8 10 -11 10 -2 0 -4 -4 -4 -10z" />
                        <path class="svg-title-path" fill-rule="evenodd" fill="rgb(25, 59, 98)" d="M1720 340 c0 -5 5 -10 11 -10 5 0 7 5 4 10 -3 6 -8 10 -11 10 -2 0 -4 -4 -4 -10z" />
                    </g>
                </svg>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Dashboard
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="assets/images/avatar/1.png" width="20" alt="">
                            <div class="header-info ms-3">
                                <span class="font-w600 ">
                                    <?php
                                    require "controller/koneksi.php";
                                    $kondisiNama = $_SESSION['login'];
                                    $ambilnama = mysqli_query($koneksi, "SELECT * FROM data_admin_221013 WHERE username_admin_221013='$kondisiNama'");
                                    $dataNama = mysqli_fetch_assoc($ambilnama);
                                    echo $dataNama['nama_admin_221013'];
                                    ?>
                                </span>
                                <small class="text-end font-w400">Administrator</small>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="controller/login/logout.php" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ms-2">Logout </span>
                            </a>
                        </div>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Menu</span>
                        </a>
                        <?php
                        require 'view/menu.php';
                        ?>

                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-072-printer"></i>
                            <span class="nav-text">Laporan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="laporan_barang_masuk.php">Barang Masuk</a></li>
                            <li><a href="laporan_barang_keluar.php">Barang Keluar</a></li>
                        </ul>

                    </li>
                </ul>
                <div class="copyright">
                    <p> © 2022 All Rights Reserved</p>
                    <p class="fs-12">Made with <span class="heart"></span> by DexignLab</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Menu</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Data distributor</a></li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Distributor</h4>
                                <button type="button" class="btn btn-outline-primary" id="tambah" data-bs-toggle="modal" data-bs-target="#tambahdata">+ Tambah Data</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>Nama Distributor</td>
                                                <td>Alamat</td>
                                                <td>Telephone</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require 'controller/koneksi.php';
                                            $result = mysqli_query($koneksi, "SELECT * FROM data_distributor_221013");
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $row['nama_dist_221013']; ?></td>
                                                    <td><?= $row['alamat_dist_221013']; ?></td>
                                                    <td><?= $row['telp_221013']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-secondary" id="edits" data-bs-toggle="modal" data-bs-target="#editdata" data-id="<?php echo $row['id_dist_221013']; ?>" data-nama="<?= $row['nama_dist_221013']; ?>" data-alamat="<?= $row['alamat_dist_221013']; ?>" data-telp="<?= $row['telp_221013']; ?>" "><svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" id="hapus" data-bs-toggle="modal" data-bs-target="#hapusdata" data-id="<?php echo $row['id_dist_221013']; ?>" data-nama="<?php echo $row['nama_dist_221013']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                            </svg></button>
                                                    </td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--**********************************
            Content body end
        ***********************************-->





            <!-- modal tambah -->
            <div class="modal fade" id="tambahdata" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title  fw-bold" id="deleteprojectLabel">Tambah Data Distributor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="modal-body justify-content-center flex-column d-flex">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="text-input2" class="form-label">Nama</label>
                                            <input type="text" id="tnama" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="text-input2" class="form-label">Alamat</label>
                                            <input type="text" id="talamat" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label for="text-input2" class="form-label">Telephone</label>
                                            <input type="number" id="ttelp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="tambah()">Tambah Data</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- modal edit -->
            <div class="modal fade" id="editdata" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title  fw-bold" id="deleteprojectLabel">Edit Data Distributor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="modal-body justify-content-center flex-column d-flex">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="text-input2" class="form-label">Nama</label>
                                            <input type="text" id="uid" class="form-control" hidden disabled>
                                            <input type="text" id="unama" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label for="text-input2" class="form-label">Alamat</label>
                                            <input type="text" id="ualamat" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label for="text-input2" class="form-label">Telephone</label>
                                            <input type="text" id="utelp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="updatedata()">Update Data</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- modal hapus -->
            <div class="modal fade" id="hapusdata" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title  fw-bold" id="deleteprojectLabel">Hapus Data Merek</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="modal-body justify-content-center flex-column d-flex">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="hid" class="form-control" disabled hidden>
                                            <svg class="text-danger" xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                            </svg>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <h5>Yakin ingin menghapus data <b class="text-danger"><span id="tampil"></span></b> ?</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="hapusdata()">Hapus Data</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            <!--**********************************
            Footer start
        ***********************************-->
            <div class="footer">

                <div class="copyright">
                    <p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/" target="_blank">DexignLab</a> 2022</p>
                </div>
            </div>
            <!--**********************************
            Footer end
        ***********************************-->




        </div>
        <!--**********************************
        Main wrapper end
    ***********************************-->

        <?php
        require 'view/script.php';
        ?>


        <script type="text/javascript">
            // tambah data
            function tambah() {
                let nama = $('#tnama').val();
                let alamat = $('#talamat').val();
                let telp = $('#ttelp').val();
                let pilih = 1;
                if (nama == "" || alamat == "" || telp == "") {
                    Swal.fire('', 'field tidak boleh kosong', 'error');
                } else {
                    let fd = new FormData();
                    fd.append('nama', nama);
                    fd.append('alamat', alamat);
                    fd.append('telp', telp);
                    fd.append('pilih', pilih);
                    $.ajax({
                        url: "controller/controller_dist.php",
                        type: "POST",
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response)
                            $('#tambahdata').modal('hide');
                            if (response === "sukses") {
                                swal.fire({
                                    title: "Berhasil",
                                    text: "Berhasil Menyimpan Data",
                                    icon: "success",
                                    showConfirmButton: true,
                                }).then(function(isConfirm) {
                                    if (isConfirm) {
                                        window.location.replace("data_dist.php");
                                    }
                                });

                            } else if (response === "gagal") {
                                Swal.fire('', 'Distributor telah terdaftar', 'error');
                            } else {
                                alert("Gagal input !");
                            }
                        },
                    });
                }
            }

            // update
            $(document).on("click", "#edits", function() {
                let id = $(this).attr("data-id");
                let nama = $(this).attr("data-nama");
                let alamat = $(this).attr("data-alamat");
                let telp = $(this).attr("data-telp");

                $('#uid').val(id);
                $('#unama').val(nama);
                $('#ualamat').val(alamat);
                $('#utelp').val(telp);

            });

            function updatedata() {
                let nama = $('#unama').val();
                let alamat = $('#ualamat').val();
                let telp = $('#utelp').val();
                let id = $('#uid').val();
                let pilih = 2;
                if (nama == "" || alamat == "" || telp == "" || id == "") {
                    Swal.fire('', 'field tidak boleh kosong', 'error');
                } else {
                    let fd = new FormData();

                    fd.append('nama', nama);
                    fd.append('alamat', alamat);
                    fd.append('telp', telp);
                    fd.append('id', id);
                    fd.append('pilih', pilih);

                    $.ajax({
                        url: "controller/controller_dist.php",
                        type: "POST",
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response)
                            $('#tambahdata').modal('hide');
                            if (response === "sukses") {
                                swal.fire({
                                    title: "Berhasil",
                                    text: "Berhasil Update Data",
                                    icon: "success",
                                    showConfirmButton: true,
                                }).then(function(isConfirm) {
                                    if (isConfirm) {
                                        window.location.replace("data_dist.php");
                                    }
                                });


                            } else {
                                alert("Gagal update !");
                            }
                        },
                    });
                }
            }

            // hapus
            $(document).on("click", "#hapus", function() {
                let id = $(this).attr("data-id");
                let nama = $(this).attr("data-nama");
                document.getElementById("tampil").innerHTML = nama;
                $('#hid').val(id);
            });

            function hapusdata() {
                let id = $('#hid').val();
                let pilih = 3;
                let fd = new FormData();
                console.log(id);
                fd.append('id', id);
                fd.append('pilih', pilih);
                $.ajax({
                    url: "controller/controller_dist.php",
                    type: "POST",
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response)
                        $('#hapusdata').modal('hide');
                        if (response === "sukses") {
                            swal.fire({
                                title: "Berhasil",
                                text: "Berhasil Hapus Data",
                                icon: "success",
                                showConfirmButton: true,
                            }).then(function(isConfirm) {
                                if (isConfirm) {
                                    window.location.replace("data_dist.php");
                                }
                            });

                        } else {
                            alert("Gagal hapus !");
                        }
                    },
                });
            }
        </script>

</body>

</html>