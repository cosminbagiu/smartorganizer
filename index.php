<?php
 include_once "header.php";

?>
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
<main>
  <script>
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="images/slide2back.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Cine suntem?</h1>
                <p>SmartOrganizer este o platformă ce aduce în sprijinul utilizatorului diferite metode smart de organizare personală.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="images/slide3back.png" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Serviciile oferite</h1>
                <p>Platforma oferă utilizatorului posibilitatea de a-și adăuga remindere cu alertă prin email, noțite cât și un portofel virtual pentru stocare de fișiere.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="images/registewall.png" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Nu ai încă un cont?</h1>
                <p>Acum este momentul să te înregistrezi pe Smart Organizer pentru a te bucura de toate funcționalitățile de care dispunem.</p>
                <p><a class="btn btn-success" href="signup.php" role="button">Înregistrează-te acum</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>    
      <section class="about-us py-5 " id="despre">
              <div class="container mt-5">
            <div class="row">
              <div class="col-md-6">
                  <h1 class='text-success'>Despre noi</h1>
                  <hr>
                  <p>Smart Organizer este o aplicație web care a fost creată pentru organizarea și gestionarea corectă a timpului. Această platformă se folosește pentru moment gratuit, însă pentru a accesa funcționalitățile acesteia este necesară autentificarea.</p>
                  <p>Platforma permite utilizatorilor să-și creeze propriul profil, să adauge remindere pentru diferite evenimente, să stocheze notițe personale precum și salvarea de fișiere de tip document, audio și fotografii.</p>
                  <p>Dacă te-am făcut curios, înregistrează-te acum: </p>
                  <p><a class="btn btn-success" href="signup.php" role="button">Mergi către înregistrare</a></p>
              </div>
              <div class="col-md-6">
                  <img src="images/seo-slide.png "alt=""> 
              </div>
            </div>
          </div>
      </section>
        <!-- START THE FEATURETTES -->

        <center><hr class="featurette-divider" id="services"></center>

        <div class="row featurette" >
          <div class="col-md-7">
            <h2 class="featurette-heading">Reminder cu alertă prin mail <span class="text-muted">Toate evenimentele aici</span></h2>
            <p class="lead">Funcția de reminder te va ajuta să fii la curent cu toate evenimentele pe care ți le-ai planificat. Ai posibilitatea să o editezi în caz că au apărut modificări și chiar să o ștergi.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="images/reminders.png" alt="Generic placeholder image" style="width:500px;max-width:700px">
          </div>
        </div>

        <center><hr class="featurette-divider"></center>

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">O soluție digitală la îndemâna tuturor! <span class="text-muted"> Uită de post-it-uri</span></h2>
            <p class="lead">Oricând ai nevoie să notezi ceva, deschide laptop-ul și conectează-te pe platformă pentru a putea stoca toate ideile ce până acum ocupau o grămada de hârtie.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="images/notes.png" alt="Generic placeholder image" style="width:500px;max-width:700px">
          </div>
        </div>

        <center><hr class="featurette-divider"></center>

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Portofelul tău <span class="text-muted">virtual</span></h2>
            <p class="lead">Te-ai săturat să fii nevoit să ai o memorie USB cu tine tot timpul? Soluția este aici, ai propriul portofel virtual ce-ți permite să stochezi toate fișierele de care ai nevoie.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="images/wallet.png" alt="Generic placeholder image" style="width:500px;max-width:700px">
          </div>
        </div>

        <center><hr class="featurette-divider"></center>
        <footer class="container">
        <p class="float-right"><a href="#" onclick="topFunction()">Back to top</a></p>
        <p>&copy; 2021 Smart Organizer &middot; <a href="login.php">Login</a></p>
      </footer>
        
</main>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap-4.0.0/assets/js/vendor/holder.min.js"></script>

<?php
include_once "footer.php";
?>
