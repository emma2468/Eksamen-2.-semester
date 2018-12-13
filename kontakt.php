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

  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">




</head>




<body>


         <div class="burgermenu">
        <a href="index.php"><img class="nav_burger_logo" src="img/logo_styleeditor-01.png" alt="nav_logo"></a>
        <button class="burger">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </button>
    </div>



<header class="mobil">



        <!--Navigationsbaren på laptop-->
        <nav>
            <ul>
         <a href="ekstraside.php">
                    <li>PORTFOLIO</li>

                </a>

                  <a href="webshop.php">
                    <li>SHOP</li>

                </a>


                <a href="om.php">
                    <li>OM STYLE EDITOR</li>
                </a>
                <a href="kontakt.php">
                    <li>KONTAKT</li>
                </a>
            </ul>
        </nav>
    </header>



<header class="desktop">

        <nav>
            <ul>


                 <div class="dropdown">
               <li>PORTFOLIO ↓</li>

              <div class="dropdown-content">
    <a href="eventstyling.php"><li>Event Styling</li></a>
     <a href="boligstyling.php"><li>Bolig Styling</li></a>
  </div>
</div>



                  <a href="webshop.php">
                    <li>SHOP</li>

                </a>

                <a href="index.php"><img class="nav_logo" src="img/logo_styleeditor-01.png" alt="nav_logo"></a>


                <a href="om.php">
                    <li>OM STYLE EDITOR</li>
                </a>
                <a href="kontakt.php">
                    <li>KONTAKT</li>
                </a>
            </ul>
        </nav>
    </header>

   <script>
//Script til burgermenu
function onLoad() {

    function toggleMenu() {
        document.querySelector(".burger").classList.toggle("change");
        document.querySelector("nav").classList.toggle("show");
    }
    document.querySelector(".burger").addEventListener("click", toggleMenu);
    document.querySelector("ul").addEventListener("click", toggleMenu);

     }

       //Vil først starte når DOM-indholdet er loaded
document.addEventListener("DOMContentLoaded", function (event) {
    onLoad();
});
</script>
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



</body>



</html>
