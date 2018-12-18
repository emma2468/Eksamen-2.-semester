<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Style Editors webshop side indeholder alle style editors produkter til salg">
    <link href="https://fonts.googleapis.com/css?family=Heebo:300,400" rel="stylesheet">


    <link rel="stylesheet" href="CSS/webshop.css">

    <link href="CSS/footer.css" rel="stylesheet">
    <link href="CSS/header.css" rel="stylesheet">


    <title>Style Editor webshop</title>

       <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">




</head>

<body>

    <?php include "header.html";?>

    <main>

        <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <p>Køb foregår via mail, og betaling ved kontooverførsel eller mobilepay. Først når jeg har modtaget en mail, sender jeg en faktura.</p>
</div>



        <!--        til toppen knappen-->
        <button onclick="topFunction()" id="button" title="Go to top">⥣</button>




        <!--        modal vindue-->

        <section id="modal">
            <div id="modal_content">
                <button class="modal_close">X</button>
<div class="desktop_modal">
                <h2 class="modal_navn"></h2>
                <div class="modal_langbeskrivelse"></div>
                <img class="modal_image" src="" alt="">
 </div>
                <div class="modal_pris"></div>




    <a class="kob" href="mailto:anette@styleeditor.dk?Subject=webshop &body=
    Hej Style Editor,%0D%0A%0D%0A
                     %0D%0A%0D%0A
    jeg vil gerne bestille (x) antal af (navnet på prodtuktet)%0D%0A%0D%0A
                  %0D%0A%0D%0A
     - med venlig hilsen (deres navn)"><button class="kobet">KØB</button></a>


            </div>
        </section>


        <!--    section til site nav-->

        <div class="row">


            <!--    sorteringsknapper/navigationen blandt vare-->

                <section id="sorteringsknapper">

                    <h1>VÆLG KATEGORI</h1>

                    <div class="knapper">
                        <button class="menu_item" data_kategori="alle">ALLE</button>
                        <button class="menu_item" data_kategori="VINTAGE GLAS">GLAS</button>
                        <button class="menu_item" data_kategori="TALLERKENER">TALLERKNER</button>
                        <button class="menu_item" data_kategori="RODEBUNKEN">UNIKA</button>


                    </div>



                </section>



            <!--        Template til vare container. Det er hver af varene der er pakket ind i en vare container-->

            <div class="column">

                <section class="vare"></section>
                <template class="vare_template">
                    <article class="vare_container">
                        <div class="genre"></div>


                        <img class="image" src="" alt="">
                        <div class="title"></div>


                        <div class="pris"></div>
    <a class="kob" href="mailto:anette@styleeditor.dk?Subject=webshop &body=
    Hej Style Editor,%0D%0A%0D%0A
                     %0D%0A%0D%0A
    jeg kunne godt tænke med at købe (x) antal af (navnet på prodtuktet)%0D%0A%0D%0A
                  %0D%0A%0D%0A
     - med venlig hilsen (deres navn)"><button class="kobet">KØB</button></a>

                    </article>
                </template>
            </div>

        </div>






    </main>


    <script>

            //  HTML loades før json loades
            document.addEventListener("DOMContentLoaded", getJson);

            //variabel til at vise alle vare
            let allVare;

            //variabler der henter template ned fra html
            let vareTarget = document.querySelector(".vare_template");
            let vareOutPut = document.querySelector(".vare");

            vareFilter = "alle";

            //variabel til modal vindue section
            let modal = document.querySelector("#modal");

            //henter json fra wordpress
            async function getJson() {
            let jsondata = await fetch("http://milleprintzlau.dk/2.semester/styleeditor_site/wordpress/wp-json/wp/v2/shop/?per_page=100");

            allVare = await jsondata.json();
            console.log(vareFilter);
            visVare();
        }

            //forEach loop til sortering af genre / sorteringsknapperne
            document.querySelectorAll(".menu_item").forEach(knap => {
            knap.addEventListener("click", filtrering);
                    })

            //funtion til filtrering
            function filtrering() {

            vareOutPut.textContent = "";
            vareFilter = this.getAttribute("data_kategori");
            visVare();
                    }

            //function til at vise Vare
            function visVare() {

            //upsitedown fra wordpress
            allVare.reverse();
            allVare.forEach(vare => {


            //if statement til filtreringen
            if (vareFilter == vare.acf.genre) {
                    udskriv();
                } else if (vareFilter == "alle") {
                    udskriv();
                }

            //udskrivningen når man trykker på en af filtreringsknapperne

            function udskriv() {

                    // indkaldelse af indholdet af vare

                    let klon = vareTarget.cloneNode(true).content;

                    klon.querySelector(".pris").textContent = vare.acf.pris + " kr";
                    klon.querySelector(".title").textContent = vare.title.rendered;
                    klon.querySelector(".image").src = vare.acf.image;
                    klon.querySelector(".image").alt = vare.acf.image;

                    //når man klikker på følgende elementer går man videre til modal
                    klon.querySelector(".image").addEventListener("click", () => {
                        visModal(vare);
                    })

                    vareOutPut.appendChild(klon);
                }
            })
                }

            //  modal vindue function
            function visModal(varen) {

            console.log("visModal");

            modal.classList.add("vis");



            modal.querySelector(".modal_image").src = varen.acf.image;
               modal.querySelector(".modal_image").alt = varen.acf.image;

            modal.querySelector(".modal_navn").textContent = varen.title.rendered;

            modal.querySelector(".modal_langbeskrivelse").innerHTML = varen.content.rendered;

            modal.querySelector(".modal_pris").textContent = varen.acf.pris + " Kr.";





            modal.querySelector(".modal_close").addEventListener("click", skjulModal);
        }


            //function til at skjule modal igen når man trykker på .modal_close

            function skjulModal() {
            console.log("skjulModal");
            modal.classList.remove("vis");
                }




        //----------til toppen knappen--------

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


        //Script til burgermenu
function onLoad() {
    function toggleMenu() {
        document.querySelector(".burger").classList.toggle("change");
        document.querySelector(".mobil_nav").classList.toggle("show");

    }
    document.querySelector(".burger").addEventListener("click", toggleMenu);
    document.querySelector("ul").addEventListener("click", toggleMenu);
}
       //Vil først starte når DOM-indholdet er loaded
document.addEventListener("DOMContentLoaded", function (event) {
    onLoad();
});

    </script>



    <?php include "footer.html";?>

</body>

</html>
