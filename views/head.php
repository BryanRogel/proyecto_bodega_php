    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <script type="text/javascript" src="assets/jquery.js"></script>



    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/loader-style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/js/button/ladda/ladda.min.css">


    <link rel="shortcut icon" href="assets/ico/minus.png">
            <!-- MAIN EFFECT -->
        <script type="text/javascript" src="assets/js/preloader.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript" src="assets/js/load.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>

<?php include_once '../src/head.php'; ?>
<script type="text/javascript">
var t;
window.onload=resetTimer;
document.onkeypress=resetTimer;
document.onmousemove=resetTimer;
function logout()
{

  location.href ="../index.php";
 
}
function resetTimer()
{
clearTimeout(t);
t=setTimeout(logout,300000) //5 minutos de inactividad, tiempo en ms
}
</script>
