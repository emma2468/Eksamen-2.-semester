<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/eventstyling.css" type="text/css">

      <link href="CSS/footer.css" rel="stylesheet">
    <link href="CSS/header.css" rel="stylesheet">


    <title>Event Styling Eventstyling</title>


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

        <button onclick="topFunction()" id="button" title="Go to top">⥣</button>


        <section class="styling_events" data-container></section>
        <template data-template>
            <article class="stylingeventListview">
                <h1 class="heading" data-title></h1>
                <p class="description" data-text></p>

            </article>
        </template>



        <section class="events_portfolio" data-container1></section>
        <template data-template1>
            <article class="portfolioListview">
                <h1 class="heading_events" data-title1></h1>
                <img src="" alt="">

            </article>
        </template>

    </main>




    <script>
        document.addEventListener("DOMContentLoaded", getJson);

        let intro;

        let introTemplate = document.querySelector("[data-template]");
        let introContainer = document.querySelector("[data-container]");

        let allEvents;

        let eventTemplate = document.querySelector("[data-template1]");
        let eventContainer =
            document.querySelector("[data-container1]");

        //---------Hent Json------------

        async function getJson() {
            let jsonData = await fetch("http://milleprintzlau.dk/2.semester/styleeditor_site/wordpress/wp-json/wp/v2/pages?slug=event-styling-pages");
            intro = await jsonData.json();
            visIntro();
            console.log(intro);

            let jsonData1 = await fetch("http://milleprintzlau.dk/2.semester/styleeditor_site/wordpress/wp-json/wp/v2/event/?per_page=100")
            allEvents = await jsonData1.json();
            visEvents();
            console.log(allEvents);
        }

        //-------functions--------------

        function visIntro() {
            console.log(intro);
            intro.forEach(intro => {
                let klon = introTemplate.cloneNode(true).content;
                klon.querySelector("[data-title]").textContent = intro.title.rendered;
                klon.querySelector("[data-text]").innerHTML = intro.content.rendered;
                introContainer.appendChild(klon);
            })
        }

        function visEvents() {
            console.log(allEvents);
            allEvents.forEach(events => {
                let klon = eventTemplate.cloneNode(true).content;
                klon.querySelector("[data-title1]").textContent = events.title.rendered;
                klon.querySelector("img").src = events.acf.image;
                klon.querySelector("img").alt = events.acf.image;
                //single
                klon.querySelector("img").addEventListener("click", () => {
                    window.location.href = "single_eventstyling.php?id=" + events.id;
                })
                //singleslut
                eventContainer.appendChild(klon);
            })
        }

        //----------til toppen knap-----------------

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
