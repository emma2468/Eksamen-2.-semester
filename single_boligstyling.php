<!DOCTYPE html>
<html lang="da">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/single_boligstyling.css" type="text/css">
    <title>Event Styling Bolig Styling</title>

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>

<body>

    <?php include "header.html";?>

    <main class="eventContainer">

        <button onclick="topFunction()" id="button" title="Go to top">⥣</button>

        <section class="singleContainer">
            <article class="home">
                <a href="boligstyling.html"><button class="tilbage">TILBAGE</button></a>
                <h2 class="data-navn"></h2>
                <p class="data-langbeskrivelse"></p>
            </article>
        </section>

        <!--        Slideshow-->

        <div class="slideshow-container">

            <div class="billeder_container">

                <div class="mySlides fade">
                    <div class="numbertext">1 / 8</div>
                    <img class="image1" src="" alt="">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 8</div>
                    <img class="image2" src="" alt="">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 8</div>
                    <img class="image3" src="" alt="">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">4 / 8</div>
                    <img class="image4" src="" alt="">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">5 / 8</div>
                    <img class="image5" src="" alt="">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">6 / 8</div>
                    <img class="image6" src="" alt="">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">7 / 8</div>
                    <img class="image7" src="" alt="">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">8 / 8</div>
                    <img class="image8" src="" alt="">
                </div>



                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
                <span class="dot" onclick="currentSlide(6)"></span>
                <span class="dot" onclick="currentSlide(7)"></span>
                <span class="dot" onclick="currentSlide(8)"></span>
            </div>
        </div>

    </main>

    <script>
        let urlParams = new URLSearchParams(window.location.search);
        let id = urlParams.get("id");
        let home = {};
        let dest = document.querySelector(".eventContainer");


        document.addEventListener("DOMContentLoaded", hentJson);
        async function hentJson() {
            let dataJson = await fetch("http://milleprintzlau.dk/2.semester/styleeditor_site/wordpress/wp-json/wp/v2/home/" + id);
            home = await dataJson.json();

            console.log(",jhmmj", home)

            visEvent();
        }

        function visEvent() {
            console.log(home, home.title)
            let display = document.querySelector(".singleContainer");
            console.log(",jhmmj", home)
            dest.querySelector(".data-navn").textContent = home.title.rendered;
            dest.querySelector(".data-langbeskrivelse").innerHTML = home.content.rendered;

            //slideshow images

            dest.querySelector(".image1").src = home.acf.image1;
            dest.querySelector(".image1").alt = home.acf.image1;

            dest.querySelector(".image2").src = home.acf.image2;
            dest.querySelector(".image2").alt = home.acf.image2;

            dest.querySelector(".image3").src = home.acf.image3;
            dest.querySelector(".image3").alt = home.acf.image3;

            dest.querySelector(".image4").src = home.acf.image4;
            dest.querySelector(".image4").alt = home.acf.image4;

            dest.querySelector(".image5").src = home.acf.image5;
            dest.querySelector(".image5").alt = home.acf.image5;

            dest.querySelector(".image6").src = home.acf.image6;
            dest.querySelector(".image6").alt = home.acf.image6;

            dest.querySelector(".image7").src = home.acf.image7;
            dest.querySelector(".image7").alt = home.acf.image7;

            dest.querySelector(".image8").src = home.acf.image8;
            dest.querySelector(".image8").alt = home.acf.image8;

        }


        //--------slideshow---------

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }

        //----------til toppen knap------------

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
