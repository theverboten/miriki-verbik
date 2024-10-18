<?php include 'header.php'; ?>





<!-- INTRO section -->



<div class="col-8" style="margin: auto; width: 125%;">
  
  <table width="900px">
            <div class="col-6" style=" width: 40%;">
            <?php component('intro', [
    
    'class' => '--smaller-title',
    'topTitle' => 'Pojďme spolupracovat.',
    'topPerex' => 'Pokud máte jakýkoliv dotaz, přání, neváhejte nás kontaktovat níže: ',
    'buttonUrl' => 'onas',
    'buttonText' => 'kontaktujte nás',
            ]); ?>
            
            </div>
  </table>
 </div>


<!-- galery -->
<section class="section img__cols">
    <div class="container">

        <div class="row">
            <div class="col-4 sm:col-6 xs:col-12">
                <div class="img cover">
                    <img src="./root/obsah/detail/14.png" alt="">
                </div>
            </div>
            <div class="col-4 sm:col-6 xs:col-12">
            <img src="./root/obsah/detail/2.png" alt="">
            </div>
            <div class="col-4 sm:col-6 xs:col-12">
                <div class="img cover">
                    <img src="./root/obsah/detail/1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- description -->
<div class="container">
  <div class="col-10" style="margin: auto; width: 50%;">
  <body>
  <table width="800px">
    <tr>
      <td><h5 class="col-6" style="margin: auto; width: 120%;"><strong>Navrhujeme s citem pro architekturu, realizujeme komplexně.</strong></h5></td>
      <td></td>
    </tr>
    <tr>
      <td><h3>&#x2022;</h3></td>
      <td></td>
    </tr>
    <tr>
      <td><div class="col-10" style=" width: 90%;">Zajímáme se o místo, kde se zakázka realizuje. Do projektu obvykle vstupujeme až ve chvíli, kdy je situace daná a musíme se jí přizpůsobit a navnímat ji. Věříme, že to pravé řešení na sebe nutně nepoutá veškerou pozornost. Architekturu nebo krajinu citlivě dotváříme.</div></td>
      <td><div class="col-10" style="margin: auto; width: 90%;">Pracujeme v interiéru i exteriéru. Z oceli realizujeme oplocení včetně bran a branek, schodiště, zábradlí, mříže, zahradní a porkový mobiliář, konstrukce i přístřešky. Provedeme vás celým procesem od návrhu až po realizaci a v případě potřeby zapojíme i další profese. Třeba truhláře nebo skláře. Našim cílem je, aby vám celý proces spolupráce přinášel radost.</div></td>
    </tr>
  </table>
  <br>
  <br>
  <br>
  <br>
  <br>
  
  <hr class="col-7" style="height:2px; border:none; color:#333; background-color:#333; margin: auto; width: 110%;">
  <h4 class="col-6" style="margin: auto; width: 120%;">Napište nám</h4>
  <br>
  <br>
 </body>
 </div>
</div>


<!-- form -->
 <body>
  
<div class="container" id="container-form">
  <div class="col-6" style="margin: auto; width: 50%;">


<form>

<style>form {
  
  display: grid; 
  grid-template-columns: 1fr 1fr;
  gap: 20px;

}

form h3,
form h4,
form p,
form button {
  grid-column: span 2;
}

.form-group {
  display: flex;
  flex-direction: column;
}
</style>

  <div id="d1" class="form-group">
    <label>Jméno</label>
    <input style="border: none; border-color: transparent; height:40px;" type="text" className="form-control" placeholder="Miriam" />
  </div>
  <div id="d2" class="form-group">
    <label>Příjmení</label>
    <input style="border: none; border-color: transparent; height:40px;" type="text" className="form-control" placeholder="Kantůrková" />
  </div>
  <div id="d3" class="form-group">
    <label>E-mail</label>
    <input style="border: none; border-color: transparent; height:40px;" type="email" className="form-control" placeholder="" />
  </div>
  <div id="d4" class="form-group">
    <label>Telefon</label>
    <input style="border: none; border-color: transparent; height:40px;" type="password" className="form-control" placeholder="" />
  </div>
  
  <label><br>Vaše zpráva, dotaz nebo poptávka</label>
  <div style="
    grid-column: 1 / 3;
    grid-row: 4 / 5;
  " id="d5" class="">
    <textarea style="height:200px; width:710px ; border: none; border-color: transparent;
    " type="text" className="form-control" placeholder=""></textarea>
  </div>
  
  <p class="" style="font-size: 13px;"><input type="radio" />
    Souhlasím se zpracováním osobních údajů pro účely kontaktování a zpracování nabídky
  </p>
  </form>
  <button id="buttonHideElement" style="width:200px; color:White; background-color:Black;" type="submit" className="btn btn-primary btn-block" class="button button--outline gs_reveal gs_reveal_fromRight">odeslat zprávu</button>
 </div>
 
</div>

<br>

</body>



<!-- hidden text -->
<body>

<div class="container" id="hidden-form" style="visibility: hidden;">

<div class="container">
  <div class="col-8" style="margin: auto; width: 13%;">
  
  <table width="200px">
  <div class="col-8">
                <div class="">
                    <img src="./root/obsah/checkmark.png" alt="Checkmark" class="center">
                </div>
            </div>
  </table>
 
 
 </div>


  <div class="col-10" style="margin: auto; width: 30%;">
 
  <table width="600px">
  <div class="col-10" style="text-align: center; font-size: 17px;">Děkujeme, zpráva byla úspěšně odeslána. Budeme vás kontaktovat v co nejkratším možném termínu.
  
  <br>
  
  <br>
  Miriki
  <br>
  <br>
  <br>
  <button id="buttonShowElement" style="width:200px; color:Black; background-color:White;" type="submit" className="btn btn-primary btn-block" class="button button--outline">přejít na úvod</button>
  
  </table>
  </div>
 </div>
 </div>

<script type="text/javascript">
        document.getElementById("buttonHideElement").onclick = function () {
          document.getElementById("container-form").style.display = "none";
            document.getElementById("hidden-form").style.visibility = "visible";
        }
    </script>

<script type="text/javascript">
        document.getElementById("buttonShowElement").onclick = function () {
          document.getElementById("container-form").style.display = "block";
            document.getElementById("hidden-form").style.visibility = "hidden";
        }
    </script>
 
</div>
<br>
<br>
</body>



<br>
<br>
<br>
<br>




<?php include 'footer.php'; ?>