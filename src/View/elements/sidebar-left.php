<?php ?>
<div class="sidenav">
    <button class="dropdown-btn">Wiadomości
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/panel_page/msglist">Lista</a>
        <a href="/panel_page/msg">Dodaj nową</a>
        <a href="/panel_page/msgplik">Dodaj nową z pliku</a>

    </div>

    <button class="dropdown-btn">Subskrybenci
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/panel_page/grupanew">Grupy</a>
        <a href="/panel_page/grupalist">Lista</a>
        <a href="/panel_page/subsnew">Nowy</a>
        <a href="/panel_page/csv">Importuj z pliku csv</a>

    </div>

    <a href="/panel_page/reports">Raporty</a>
    <a href="/panel_page/sendmsg">Wysyłka</a>


    <a href="/logout">Wyloguj się</a>
</div>



<style>
    .sidenav {
        height: 100%;
        width: 100%;

        z-index: 1;

        background-color: #777;
        overflow-x: hidden;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a, .dropdown-btn {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #ffffff;
        display: block;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        outline: none;
    }

    /* On mouse-over */
    .sidenav a:hover, .dropdown-btn:hover {
        color: #f1f1f1;
    }

    /* Main content */
    .main {
        margin-left: 200px; /* Same as the width of the sidenav */
        font-size: 20px; /* Increased text to enable scrolling */
        padding: 0px 10px;
    }

    /* Add an active class to the active dropdown button */
    .active {
        background-color: green;
        color: white;
    }

    /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
    .dropdown-container {
        display: none;
        background-color: #262626;
        padding-left: 8px;
    }

    /* Optional: Style the caret down icon */
    .fa-caret-down {
        float: right;
        padding-right: 8px;
    }

    /* Some media queries for responsiveness */
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
</style>

<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
