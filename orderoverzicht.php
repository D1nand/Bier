<!DOCTYPE html>
<html>
    <Head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="CSS.css">
    </Head>
    <body>
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
       
        
    </nav>
    
    <div id="side-menu" class="sidenavi">
        <a href="#" class="knop-sluit" onclick="closeSideMenu()">&times;</a>
        <a href="orderoverzicht.php">Orderoverzicht</a>
        <a href="klantenoverzicht.php">Klantenoverzicht</a>
        <a href="loginn.php">Uitloggen</a>
    </div>
    
    <div id="mainn">

    
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
       
     <center>
        <h1 style="padding-bottom: 4%;">Orderoverzicht</h1>
      </center>
    </body>
</html>