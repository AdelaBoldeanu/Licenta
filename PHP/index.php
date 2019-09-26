<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
    header("location: applications.php"); // Redirecting To Profile Page
}
?>   
<!doctype html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../CSS/index.css">
        <link rel="stylesheet" type="text/css" href="../CSS/form.css">

    <title>Ministerul Apararii Nationale</title>
    </head>
    <body>
    <div class="container menu" id="con">
    <div class="row">
      <div class="col-8 logo">
        <h2 class="MAN" id="mySpan">Ministerul Apararii Nationale</h2>
        <hr align="right" width= "57%" id="hLine">
      </div>
      <div class="col-3 login-col" id="col-header">
        <a class="login" href="#" onclick="document.getElementById('id01').style.display='block'">LOGARE</a>
      </div>
        
        <div class="col-6 col-4  login" id="col-header">
                
        </div>
        
    </div>
    <img class="flagR" id="flag" src="../Images/Layer%202.png" alt="flag" width="100%">
    <img class="stemaR" id="stema" src="../Images/Layer 3.png" alt="stema Romaniei">
    </div>
      
      
    <div class="container pt-4">
<!--        cariera   -->
        <h1 class="display-4 text-center my-5 text-muted cariera">Cariera</h1>
      <div id="cariera" class="row content">
        <div class="col-lg "> <!--sm-small , md-medium , lg-large -->
            <h3 class="mb-4">Personal militar</h3>
            <img class="mb-4 d-sm-block cMilitara" src="../Images/Poza%20profil1.jpg" alt="Portland">
            <p>Cetăţenii români pot urma cariera militară în calitate de ofiţer, maistru militar, subofiţer sau soldat/gradat profesionist în activitate, în urma absolvirii unei instituţii de învăţământ superior sau postliceal militar, a unui curs de formare profesională ori program de instruire a soldaţilor/gradaţilor profesionişti.</p>
            <p>Absolvenţii de gimnaziu pot opta pentru a deveni elevi la colegiile naţionale militare. După finalizarea studiilor, datorită cunoştinţelor şi deprinderilor dobândite, absolvenţii colegiilor naţionale militare vor fi admişi în instituţiile de învăţământ superior militar (academii militare) sau vor continua pregătirea în învăţământul postliceal militar de formare a maiştrilor militari.</p>
        </div>
        <div class="col-lg ">
            <h3 class="mb-4">Cum pot urma cariera militară</h3>
            <p>Pentru a urma cariera militară este necesară parcurgerea succesivă a trei etape: recrutarea, selecția aptitudinală și concursul de admitere sau de repartizare pe post (în cazul candidaților pentru funcțiile de soldat/gradat profesionist).</p>
            <p>Selecţia sau evaluarea aptitudinală constă în parcurgerea următoarelor probe:</p>
            <ul>
                <li>Probe psihologice:</li>
                    <ul>
                        <li>test de aptitudini;</li>
                        <li>chestionar de personalitate;</li>
                        <li>test situaţional (pentru ofiţeri, maiştri militari şi subofiţeri).</li>
                    </ul>
                <li>Probe fizice</li>
                    <ul>
                        <li>parcurgerea într-un timp determinat a unui traseu utilitar-aplicativ, care conţine 10 elemente pe un circuit de 90 m lungime;</li>
                        <li>probă de rezistenţă pe distanţa de 1000 sau 2000 m, în funcţie de categoria de personal pentru care ai optat.</li>
                    </ul>
                <li>Interviu de evaluare finală.</li>
            </ul>
        </div>

        </div>   <!--  /cariera         -->
        
<!--    anunturi    -->
        <h1 id="anunturi" class="display-4 text-center my-5 text-muted">Anunturi</h1>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                    <div class="card mb-3">
                      <img class="card-img-top" src="../Images/recrutari.jpg" alt="Recrutari">
                      <div class="card-body">
                        <h5 class="card-title">Direcția generală management resurse umane organizează concurs de ocupare a 3 (trei) funcții vacante de ofițer</h5>
                          <p class="card-text">Detalii <a href="https://dmru.mapn.ro/app/webroot/fileslib/upload/files/2018/anunturi/anunt-0114.pdf" target="_blank">aici</a>!</p>
                      </div>
                    </div>
              </div>

              <div class="col-md-6 col-lg-4">
                    <div class="card mb-3">
                      <img class="card-img-top" src="../Images/decorati.jpg" alt="Decorati">
                      <div class="card-body">
                        <h4 class="card-title">Doi sefi din armata romana au fost decorati in SUA</h4>
                        <p class="card-text">Detalii <a href="http://www.ziare.com/stiri/armata/doi-sefi-din-armata-romana-au-fost-decorati-in-sua-1542189" target="_blank">aici</a></p>

                      </div>
                    </div>
              </div>

              <div class="col-md-6 col-lg-4">
                    <div class="card mb-3">
                      <img class="card-img-top" src="../Images/inventie.jpg" alt="Robie">
                      <div class="card-body">
                        <h5 class="card-title">Armata Romana a lansat, zilele trecute, cea mai noua inventie a sa in domeniul echipamentelor militate: vesta antiglont pentru femei. </h5>
                        <p class="card-text">Detalii <a href="http://www.ziare.com/constanta/stiri-actualitate/inventie-pentru-femeile-din-armata-romana-6993481" target="_blank">aici</a></p>

                      </div>
                    </div>
              </div>

              <div class="col-md-6 col-lg-4">
                    <div class="card mb-3">
                      <img class="card-img-top" src="../Images/Scorpionii.jpg" alt="Scorpionii Rosii">
                      <div class="card-body">
                        <h4 class="card-title">Zi de sărbătoare pentru Batalionul 26 Infanterie "Neagoe Basarab" - Scorpionii Roşii !</h4>
                        <p class="card-text">Detalii <a href="https://www.forter.ro/ministerul-apararii-nationale/zi-de-s%C4%83rb%C4%83toare-pentru-scorpionii-ro%C5%9Fii/32140" target="_blank">aici</a></p>

                      </div>
                    </div>
              </div>

              <div class="col-md-6 col-lg-4">
                    <div class="card mb-3">
                      <img class="card-img-top" src="../Images/Afganistan.jpg" alt="Afganistan">
                      <div class="card-body">
                        <h4 class="card-title">Alături de camarazii noştri! Povestea incidentului din Afganistan</h4>
                        <p class="card-text">Detalii <a href="https://www.forter.ro/ministerul-apararii-nationale/al%C4%83turi-de-camarazii-no%C5%9Ftri-povestea-incidentului-din-afganistan/32073" target="_blank">aici</a></p>

                      </div>
                    </div>
              </div>

              <div class="col-md-6 col-lg-4">
                    <div class="card mb-3">
                      <img class="card-img-top" src="../Images/Doneaza.jpg" alt="DoneazaSange">
                      <div class="card-body">
                        <h4 class="card-title">Donează sânge pentru a salva vieţi!Militarii Batalionului 33 Vânători de Munte "Posada".</h4>
                        <p class="card-text">Detalii <a href="https://www.forter.ro/ministerul-apararii-nationale/doneaz%C4%83-s%C3%A2nge-pentru-salva-vie%C5%A3i/31925" target="_blank">aici</a></p>

                      </div>
                    </div>
              </div>
            </div>
        <!--    /anunturi    -->

        </div>
        <!--   /container     -->
        
        
        <!--   FORM   -->
      
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Nume utilizator</b></label>
      <input type="text" placeholder="Introduceti nume utilizator" name="uname" required>

      <label for="psw"><b>Parola</b></label>
      <input type="password" placeholder="Introduceti parola" name="psw" required>
        
      <button type="submit" name="login">Logare</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Anulare</button>
        <span class="psw">Ati uitat <a href="#" onclick="myFunction()">Numele de utilizator</a> sau <a href="#" onclick="SecondFunction()">parola</a>?</span>
    </div>
  </form>
</div>
      
<!--   /FORM   -->
        


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../JavaScript/form.js"></script>
    <script src="../JavaScript/index.js"></script>
    </body>
    </html>
