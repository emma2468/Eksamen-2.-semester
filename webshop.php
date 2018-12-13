<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/webshop.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="CSS/footer.css" rel="stylesheet">
    <link href="CSS/header.css" rel="stylesheet">







    <title>Style Editor Webshop</title>

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

        <!--        til toppen knappen-->
        <button onclick="topFunction()" id="button" title="Go to top">⥣</button>

        <!--       Section til indhold af modale vinduet, når man trykker på en vare-->

         <!--        modal vindue-->

        <section id="modal">
            <div id="modal_content">
                <button class="modal_close">X</button>

                <h2 class="modal_navn"></h2>
                <div class="modal_langbeskrivelse"></div>
                <img class="modal_image" src="" alt="">
                <div class="modal_pris"></div>
                <a class="kob" href="mailto:anette@styleeditor.dk?Subject=Hello%20again" target="_blank"><button class="kobet">KØB</button></a>



            </div>
        </section>


        <!--    section til site nav-->

        <div class="row">


            <!--    sorteringsknapper/navigationen blandt vare-->
            <div class="column1">
                <section id="sorteringsknapper">
                    <h1>VÆLG KATRGORI</h1>
                    <div class="knapper">
                        <button class="menu_item" data_kategori="alle">ALLE</button>
                        <button class="menu_item" data_kategori="VINTAGE GLAS">GLAS</button>
                        <button class="menu_item" data_kategori="TALLERKENER">TALLERKNER</button>
                        <button class="menu_item" data_kategori="RODEBUNKEN">RODEBUNKE</button>


                    </div>


                    <p>Shoppen foregår over mail, det betyder at køb knappen henviser til Anettes Thyrsteds mail. Skriv til Anette hvis du gerne vil købe varen.</p>
                </section>

            </div>

            <!--        Template til vare container. Det er hver af varene der er pakket ind i en vare container-->

            <div class="column">

                <section class="vare"></section>
                <template class="vare_template">
                    <article class="vare_container">
                        <div class="genre"></div>


                        <img class="image" src="" alt="">
                        <div class="title"></div>


                        <div class="pris"></div>

                      <a class="kob" href="mailto:anette@styleeditor.dk?Subject=Hello%20again" target="_blank"><button class="kobet">KØB</button></a>
                    </article>
                </template>
            </div>

        </div>


    </main>


    <script>
        // der gør at HTML loades før json loades
        document.addEventListener("DOMContentLoaded", getJson);


        //variabel til at vise alle events
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

        //function til at vise events
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

                    // indkaldelse af indholdet af hver Vare

                    let klon = vareTarget.cloneNode(true).content;

                    klon.querySelector(".pris").textContent = vare.acf.pris + " kr";
                    klon.querySelector(".kob").href = vare.acf.kob;
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

    </script>



  <?php include "footer.html";?>
</body>

</html>
