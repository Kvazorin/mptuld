$('.slider').slick({
    slidesToShow: 1,
    slidesToScroll: 3,
    autoplay: true,
    variableWidth: true,
    autoplaySpeed: 4500,
    infinite: true,
    centerMode: true,

});

$('.slider-small').slick({
    slidesToShow: 6,
    slidesToScroll: 6,
    autoplay: false,
    variableWidth: true,
    infinite: true,
    centerMode: true,

});

var btn = document.getElementById("change_theme");
var link = document.getElementById("theme_link");
btn.addEventListener("click", function () { ChangeTheme(); });
function ChangeTheme() {
    let lightTheme = "/assets/css/styles(light).css";
    let blackTheme = "/assets/css/styles(black).css";

    var currTheme = link.getAttribute("href");
    var theme = "";

    if (currTheme == lightTheme) {
        currTheme = blackTheme;
        theme = "black";
    }
    else {
        currTheme = lightTheme;
        theme = "light";
    }

    link.setAttribute("href", currTheme);

    Save(theme);
}

function Save(theme)
{
    var Request = new XMLHttpRequest();
    Request.open("GET", "./themes.php?theme=" + theme, true); //У вас путь может отличаться
    Request.send();
}

function dropDownFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

