<?php

session_start();
include "../db/db_conn.php";

//Get all the articles
if (isset($_SESSION["id"]) && isset($_SESSION["user_name"])) {

    $query1 = "SELECT * FROM articles";
    $retval = mysqli_query($conn, $query1);
    ?>
<!DOCTYPE html>
<html>
  <head>
    <title>KIP.ba</title>
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
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
    <!--main content-->
    <main id="main"> <?php
    $grayOrWhite = 1;
    //search system
    $pretraga = "";
    if (isset($_POST["search"]) and $_POST["search"] != "") {
        $input = $_POST["search"];

        if (!empty($input)) {
            $query2 = "SELECT * FROM articles WHERE naziv LIKE '%$input%'";
            $res = mysqli_query($conn, $query2);
            if (mysqli_num_rows($res) < 1) {
                echo "Nema rezultata";
            } else {
                while ($row2 = mysqli_fetch_array($res)) {
                    if ($grayOrWhite) {
                        echo "
																
																<div class='article1' onclick='goToArticle({$row2["id"]});'>
																	<img class='image' src='../img/{$row2["id"]}.jpg'>
																		<span class='article-title'>{$row2["naziv"]}</span>
																		<span class='article-subtitle'>#{$row2["id"]} - " .
                            substr($row2["datum-objave"], 0, 10) .
                            " - {$row2["lokacija"]}</span>
																		<span class='price1'>{$row2["cijena"]}KM</span>
																	</div>";
                        $grayOrWhite = 0;
                    } else {
                        echo "
																	
																	<div class='article2' onclick='goToArticle({$row2["id"]});'>
																		<img class='image' src='../img/{$row2["id"]}.jpg'>
																			<span class='article-title'>{$row2["naziv"]}</span>
																			<span class='article-subtitle'>#{$row2["id"]} - " .
                            substr($row2["datum-objave"], 0, 10) .
                            " - {$row2["lokacija"]}</span>
																			<span class='price2'>{$row2["cijena"]}KM</span>
																		</div>";
                        $grayOrWhite = 1;
                    }
                }
            }
        }
    }
    //if search is empty just write out all the articles
    else {
        while ($row = mysqli_fetch_assoc($retval)) {
            if ($grayOrWhite) {
                echo "
																		
																		<div class='article1' onclick='goToArticle({$row["id"]});'>
																			<img class='image' src='../img/{$row["id"]}.jpg'>
																				<span class='article-title'>{$row["naziv"]}</span>
																				<span class='article-subtitle'>#{$row["id"]} - " .
                    substr($row["datum-objave"], 0, 10) .
                    " - {$row["lokacija"]}</span>
																				<span class='price1'>{$row["cijena"]}KM</span>
																			</div>";
                $grayOrWhite = 0;
            } else {
                echo "
																			
																			<div class='article2' onclick='goToArticle({$row["id"]});'>
																				<img class='image' src='../img/{$row["id"]}.jpg'>
																					<span class='article-title'>{$row["naziv"]}</span>
																					<span class='article-subtitle'>#{$row["id"]} - " .
                    substr($row["datum-objave"], 0, 10) .
                    " - {$row["lokacija"]}</span>
																					<span class='price2'>{$row["cijena"]}KM</span>
																				</div>";
                $grayOrWhite = 1;
            }
        }
    }
    ?> </main>
  </body>
  <script>
    function init() {
      new SmoothScroll(document, 120, 12)
    }

    function SmoothScroll(target, speed, smooth) {
      if (target === document) target = (document.scrollingElement || document.documentElement || document.body.parentNode || document.body) // cross browser support for document scrolling
      var moving = false
      var pos = target.scrollTop
      var frame = target === document.body && document.documentElement ? document.documentElement : target // safari is the new IE
      target.addEventListener('mousewheel', scrolled, {
        passive: false
      })
      target.addEventListener('DOMMouseScroll', scrolled, {
        passive: false
      })

      function scrolled(e) {
        e.preventDefault(); // disable default scrolling
        var delta = normalizeWheelDelta(e)
        pos += -delta * speed
        pos = Math.max(0, Math.min(pos, target.scrollHeight - frame.clientHeight)) // limit scrolling
        if (!moving) update()
      }

      function normalizeWheelDelta(e) {
        if (e.detail) {
          if (e.wheelDelta) return e.wheelDelta / e.detail / 40 * (e.detail > 0 ? 1 : -1) // Opera
          else return -e.detail / 3 // Firefox
        } else return e.wheelDelta / 120 // IE,Safari,Chrome
      }

      function update() {
        moving = true
        var delta = (pos - target.scrollTop) / smooth
        target.scrollTop += delta
        if (Math.abs(delta) > 0.5) requestFrame(update)
        else moving = false
      }
      var requestFrame = function() { // requestAnimationFrame cross browser
        return (window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(func) {
          window.setTimeout(func, 1000 / 50);
        });
      }()
    }
    //create-modal
    var sidebar = document.getElementById('sidebar');
    var modal = document.getElementById("create-modal");
    var close = document.getElementById("close");
    var createButton = document.getElementById("add-button");
    createButton.onclick = function() {
      modal.classList.add("active");
      document.getElementById("main").classList.add("darkened");
    }
    close.onclick = function() {
      modal.classList.remove("active");
      document.getElementById("main").classList.remove("darkened");
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

    function goToArticle(id) {
      window.location.href = "article.php?id=" + id;
    }
  </script>
</html> <?php
} else {
    header("Location: ../index.php");

    exit();
}

?>