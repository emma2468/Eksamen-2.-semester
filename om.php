<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/om.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <link href="CSS/footer.css" rel="stylesheet">
    <link href="CSS/header.css" rel="stylesheet">




    <title>Style Editor Om</title>

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

    <section class="om" data-container></section>
    <template data-template>
        <article class="omListview">
            <div class="row">
                <div class="column">
                    <img class="image" src="" alt="">
                </div>
                <div class="column1">
                    <h2 data-title></h2>
                    <p data-text></p>
                </div>
            </div>
        </article>
    </template>

</main>



<script>
    document.addEventListener("DOMContentLoaded", getJSON);

    let om;

    let omTemplate = document.querySelector("[data-template]");
    let omContainer = document.querySelector("[data-container]");

    async function getJSON() {
        let jasonData = await fetch("http://milleprintzlau.dk/2.semester/styleeditor_site/wordpress/wp-json/wp/v2/om?slug=anette-thyrsted%22/");
        om = await jasonData.json();
        visOm();
        console.log(om);
    }


    function visOm() {
        console.log(om);
        om.forEach(om => {
                let klon = omTemplate.cloneNode(true).content;
                klon.querySelector(".image").src = om.acf.image;
                klon.querySelector(".image").alt = om.acf.image;

                klon.querySelector("[data-title]").textContent = om.title.rendered;
                klon.querySelector("[data-text]").innerHTML = om.content.rendered;

                omContainer.appendChild(klon);

            }

        )
    }

    //-------til toppen knappen---------
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
