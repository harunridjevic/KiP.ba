<?php

session_start();
include "../db/db_conn.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query1 = "SELECT * FROM articles WHERE id=" . $id;
    $res = mysqli_query($conn, $query1);
    $row = mysqli_fetch_assoc($res);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../css/s.css">
    <title>KIP.ba</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
  </head>
  <body>
    <!--CREATE-MODAL-->
    <div id="create-modal" class="create-modal">
      <div class="modal-content">
        <div class="modal-header">
          <span id="close" class="close">
            <div id="button-circle"> &times; </div>
          </span>
          <p>OBJAVA ARTIKLA</p>
          <p id="subt">Ovdje objavljujete vas artikal</p>
        </div>
        <div class="modal-content">
          <form action="../db/insert.php" method="post" enctype="multipart/form-data">
            <input required type="text" name="naziv" placeholder="Naziv artikla (npr. Megane 2 1.9dci)" id="naziv">
            <select id="lokacija" name="kategorija">
              <option value="kategorija">Kategorija</option>
              <option value="automobili">Automobili</option>
              <option value="laptopi">Laptopi</option>
              <option value="kategorija">Ostalo</option>
            </select>
            <input required type="text" name="lokacija" id="lokacija" placeholder="Lokacija (npr. Sarajevo, Tuzla, Zenica...)">
            <label id="slika">
              <span style="float:left;width:20%;margin-top:40px;margin-left:20px;overflow:hidden;">Fotografija <span style="font-size:15px">
                  <br>(kliknite ovdje da dodate <br>vasu sliku) </span>
              </span>
              <input onchange="readURL(this);" style="visibility:hidden;width:1px;height:1px;" type="file" name="image">
              <img style="object-fit: cover;padding:2px;display:inline-block;float:right;border:1px solid black;" id="blah" src="../logo/logov2.png" width="250px" height="150px" alt="your image" />
            </label>
            <textarea required style="height:150px;resize: none;padding:15px" type="text" id="lokacija" placeholder="Opis (detaljan opis onoga sto prodajete)" name="opis"></textarea>
            <input required type="text" name="kontakt" id="lokacija" placeholder="Kontakt (npr. 060-1111/111)">
            <input required style="width:50%;float:left;margin-left:60px;height:90px;" type="text" name="cijena" id="lokacija" placeholder="Cijena (npr. 7000KM)">
            <button type="submit" value="Submit" name="submit" id="send" style="float:right;margin-right:60px;margin-top:10px">
              <svg style="padding:15px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
              </svg>
            </button>
          </form>
        </div>
      </div>
    </div>
    <!--sidebar-->
    <div id="sidebar">
      <a href="home.php">
        <img id="logo" src="../logo/logov1transparent.png">
      </a>
      <!--SEARCH-->
      <form method="POST">
        <div id="search-div">
          <input type="text" id="search" name="search" placeholder="Pretraži..." action="wow.php">
          <button id="search-button" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
          </button>
        </div>
      </form>
      <!--MAIN BUTTONS-->
      <div id="main-buttons">
        <button id="profile-button" onclick="location.href='logout.php';">
          <div id="button-circle">
            <svg id="button-icons" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
          </div> <?php echo $_SESSION["user_name"]; ?>
        </button>
        <button id="profile-button">
          <div id="button-circle">
            <svg id="button-icons" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
          </div> Artikli
        </button>
        <button id="profile-button">
          <div id="button-circle">
            <svg id="button-icons" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div> Opcije
        </button>
        <div id="profile-button" style="display:none"></div>
        <div id="profile-button" style="display:none"></div>
      </div>
      <!--BOTTOM BUTTONS-->
      <div id="bottom-buttons">
        <button id="add-button" onclick="showCreateModal()">
          <svg style="width:70px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
        </button>
        <button id="help"> ? </button>
      </div>
    </div>
    <!--article main part-->
    <main>
      <div id="top-article"> <?php echo "
																		<img id='top-right-article' src='../img/{$row["id"]}.jpg'/>"; ?> <div id="top-left-article">
          <div id="button-article-div" onclick="location.href='home.php';">
            <div id="button-article">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M5 12h25" />
              </svg>
            </div>
          </div>
          <span>
            <span id="subt-article">Naziv artikla:</span>
            <br> <?php echo $row[
        "naziv"
    ]; ?> </span>
          <div id="cijena-article"> <?php echo $row["cijena"]; ?>KM </div>
        </div>
      </div>
      <div id="bottom-article">
        <div id="info-part-article">
          <div id="info-part-article1"> Lokacija: <?php echo $row["lokacija"]; ?> </div>
          <div id="info-part-article2"> Kategorija: <?php echo $row["kategorija"]; ?> </div>
          <div id="info-part-article1"> Kontakt: <?php echo $row["kontakt"]; ?> </div>
          <div id="info-part-article3"> Opis: <?php echo $row["opis"]; ?> </div>
          <div id="info-part-article1"> Napravio: <?php echo $row["kreator"]; ?> <span style="float:right"> <?php echo $row["datum-objave"]; ?> </span>
          </div>
          <div id="info-part-article4"></div>
        </div>
      </div>
    </main>
    <script>
      //create-modal
      var sidebar = document.getElementById('sidebar');
      var modal = document.getElementById("create-modal");
      var close = document.getElementById("close");
      var createButton = document.getElementById("add-button");
      createButton.onclick = function() {
        modal.classList.add("active");
        document.getElementById("top-article").classList.add("darkened");
        document.getElementById("bottom-article").classList.add("darkened");
      }
      close.onclick = function() {
        modal.classList.remove("active");
        document.getElementById("top-article").classList.remove("darkened");
        document.getElementById("bottom-article").classList.remove("darkened");
      }

	  function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
			$('#blah').attr('src', e.target.result).width(250).height(150);
			};
			reader.readAsDataURL(input.files[0]);
		}
    }
    </script>
  </body>
</html>