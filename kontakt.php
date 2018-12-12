<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/kontakt.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


     <link href="CSS/footer.css" rel="stylesheet">
    <link href="CSS/header.css" rel="stylesheet">




    <title>Style Editor Kontakt</title>

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


</head>




<body>
    <?php include "header.html";?>

    <main>

    <button onclick="topFunction()" id="button" title="Go to top">⥣</button>

    <section id="Kontakt_information">
        <h1>Kontakt</h1>
        <h4>Style Editor | Anette Thyrsted</h4>
        <h4>Telefon | 31 77 32 32</h4>
        <h4>Email | <a href="mailto:anette@styleeditor.dk?Subject=Hello%20again" target="_top">anette@styleeditor.dk</a></h4>
        <h4>CVR | 39034085</h4>
    </section>

    <section id="under_information">


        <div class="row">


            <div class="column">
                <h1>Adminstration</h1>
                <h4>Adresse | Kildedalen 1, 2900 Hellerup</h4>


            </div>

            <div class="column">
                <h2>Style Editor Kontor</h2>
                <h4>Adresse | Rentemestervej 39, 2400 København</h4>
            </div>


            <h5>PAKKER SKAL LEVERS HOS ADMINSTRATION</h5>

        </div>

    </section>

    </main>




<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("button").style.display = "block";
        } else {
            document.getElementById("button").style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

</script>


<?php include "footer.html";?>

</body>



</html>