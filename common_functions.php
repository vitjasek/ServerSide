<?php

function html_hlavička(string $active_page, string $title = ""){
  $html ='

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssnormalize/cssnormalize-min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <script type="text/javascript" src="js/general.js"></script>';

  $html .= '<title>' . $title . '</title>

  <nav>
    <div class="logo">
      <a href="index.php">
        <img src="img/logoDaNiet.jpg" alt="logo">
      </a>
    </div>
    <div class="menu">';

      $odkazy =  '<a href="index.php"'; $odkazy .= $active_page == "index" ? 'class="active"' : ""; $odkazy .= '>Home</a>';
      $odkazy .= '<a href="zebricky.php"'; $odkazy .= $active_page == "zebricky" ? 'class="active"' : ""; $odkazy .= '>Žebříčky</a>';
      $odkazy .= '<a href="kurzy.php"'; $odkazy .= $active_page == "kurzy" ? 'class="active"' : ""; $odkazy .= '>Přehled kurzů</a>';
      $odkazy .= '<a href="kurz_edit.php"'; $odkazy .= $active_page == "kurz_edit" ? 'class="active"' : ""; $odkazy .= '>Správa kurzů</a>';
      $odkazy .= '<a href="login.php?act=logout" id="logout"'; $odkazy .= $active_page == "login" ? 'class="active"' : ""; $odkazy .= '>Odhlásit</a>';
      $html .= $odkazy;

      //následuje js v html v php - fujky :)
    $html .= '</div>
    <div id="hamburger" class="fa fa-bars fa-lg" onclick="showBurgerMenu()"></div>
    <div class="user">
      <a href="profil.php">
        <img src="img/profileLogo.png" alt="avatar">
      </a>
    </div>
  </nav>
  <div id="mobile_menu">';
  $html .= $odkazy . '</div>';
  return $html;
}

function redirect_if_not_logged(){
  if(PHP_SESSION_NONE == session_status()){
    session_start();
    if(isset($_SESSION['is_loggedin'])){
      if(!$_SESSION['is_loggedin']) header("location: login.php");
    }
    else{
      header("location: login.php");
    }
  }
}

?>