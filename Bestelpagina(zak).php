<!DOCTYPE html>
<nav class="nav">
            <span class="spanned">
                 <a href="#" onclick="openSideMenu()">
                     <svg width="30" height="30">
                            <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
                                <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
                                  <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
                     </svg>
                 </a>
            </span>
            <ul class="nav2">
            </ul>
        </nav>
        
        <div id="side-menu" class="sidenavi">
            <a href="#" class="knop-sluit" onclick="closeSideMenu()">&times;</a>
            <a href="Bestelpagina.html" onclick="return confirm('Weet u zeker dat u wilt uitloggen?')">Uitloggen</a>
            <p class="tekstpart">t88577457@gmail.com</p>
        </div>
        
        <div id="mainn">
        </div>
        
        <script>
            function openSideMenu(){
                document.getElementById('side-menu').style.width = '250px';
                document.getElementById('mainn').style.marginLeft = '250px';
            }
            function closeSideMenu(){
                document.getElementById('side-menu').style.width = '0';
                document.getElementById('mainn').style.marginLeft = '0';
            }
        </script>
        </html>
<?php

if (isset($_POST['submit'])) {

 $email=$_GET['email'];  
 $aantal= $_POST['aantal'] ;
 $totaalprijs= $_POST['totaalprijs'] ;
 $verzendkosten= $_POST['verzendkosten'] ;

header("location: bibliotheek/mail2.php?email=$email&aantal=$aantal&totaalprijs= $totaalprijs&verzendkosten=$verzendkosten");

}
?>
<html>
    <Head>
        <link rel="stylesheet" href="CSS.css">



        <script>
            function mult(value){
                var x, y ;

                 var x = 0.37 * value + 1.75 * value  ;
   
                 if(value<50 && value>0) {
                    var y = 7.50;
                   

                } else {

                    if (value>49 && value<100) {
                        var y = 15;

                 } else {
                     if (value>99 && value<150) {
                     var y = 22.5;
                     
                 } else {
                     if (value>149 && value<200) {
                     var y = 30;
                     } else {
                        if (value>199 && value<250) {
                        var y = 37.5;
        
                     }else {
                        if (value>249) {
                        var y = 50;
                        } else {
                            if (x<1) {
                            var y = 0.00;
                            }

                        }}}}}}

                 x = x.toFixed(2);
                 y = y.toFixed(2);
                
             

                document.getElementById('out2x').value = x;
                document.getElementById('out3x').value = y;
            }

            
        </script>

    </Head>
    <body>
        <center> 
        <div class="bestelformulierP">
            <div class="knop">
            <a style="text-decoration: none;" href="Bestelpagina.html" onclick="return confirm('Weet u zeker dat u wilt uitloggen?')"> <h1 class="par k">PARTICULIER</h1> </a>
            <h1 class="zak k" >ZAKELIJK</h1> 
            </div>
            <form class="contact-form" action="" method="POST" >
            <div class="formulier">
           
            <input type="number" min="1" max="999" class="input aantal" onkeyup="mult(this.value)" name="aantal" placeholder="Aantal" required> 
            <button name="submit" type="submit" class="input button">Bestel</button> <br> <br> <br> 
            </div>

       
            <p><? echo $_GET['email']; ?></p>
            <p class="geld">prijs inc. btw: &euro; <input type="number" id="out2x" class="prijs line" value="0" name="totaalprijs" readonly> </p><br>
            <p class="geld">verzendkosten: + &euro; <input type="number" id="out3x" class="prijs" value="0" name="verzendkosten" readonly> </p>
          

        </div>
        </center>
    </form>
</form>
    </body>
</html>
