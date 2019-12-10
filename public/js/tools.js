// Progress Scrolling Bar

$(window).scroll(function() {
    let scroll = $(window).scrollTop(),
        dh = $(document).height(),
        wh = $(window).height(),
        scrollPercent = (scroll / (dh - wh)) * 100;
    $("#progressBar").css("height", scrollPercent + "%");
});

// Background Fading On Scroll

//let headerBg = document.getElementById("bg");
//window.addEventListener("scroll", function() {
//  headerBg.style.opacity = 1 - +window.pageYOffset / 550 + "";
//headerBg.style.top = +window.pageYOffset + "px";
//headerBg.style.backgroundPositionY = -+window.pageYOffset / 4 + "px";
//});

// Alert message Show and Hide

$("#infoText")
    .delay(1000)
    .fadeOut(2000);

$("#save").click(function() {
    let image_name = $("#image").val();
    let imageHeight = $("image").naturalHeight;
    console.log(imageHeight);
    console.log();
    if (image_name == "") {
        //   alert("Veuilez selectionner une image");
        //  return false;
    } else {
        let extension = $("#image")
            .val()
            .split(".")
            .pop()
            .toLowerCase();
        if (jQuery.inArray(extension, ["gif", "png", "jpg", "jpeg"]) == -1) {
            alert("Format image invalid");
            $("#image").val("");
            return false;
        }
    }
});

// Display the navBar on page loading

// Do things while scrolling

$(window).scroll(function() {
    let wScroll = $(this).scrollTop();
    console.log(wScroll);
    if (wScroll > 100) {
    } else {
    }
    // $("#navHeader").css("top", "-10vh");
});

// Banner Title on mouseMove

$(".recipient").mousemove(function(event) {
    let moveX = ($(window).width() / 10 - event.pageX) * 0.4;
    let moveY = ($(window).height() / 10 - event.pageY) * 0.2;

    $(".div_to_move").css("margin-left", moveX * 1.3 + "px");
    $(".div_to_move").css("margin-top", moveY * 1.1 + "px");
});

// Hide navBar scrolling down and shot it scrolling up

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navHeader").style.top = "0";
        document.getElementById("navHeader").style.backgroundImage =
            "linear-gradient(rgb(34, 34, 34) 1%, rgb(4, 4, 4) 100%)";
    } else {
        document.getElementById("navHeader").style.top = "-10vh";
    }
    prevScrollpos = currentScrollPos;
};

// Message Help

$(".meteo_wrapper div").click(function(e) {
    e.preventDefault();
});

//

$(".nav_link_box").mouseover(function() {
    $("#navHeader").css(
        "box-shadow",
        "rgb(0, 216, 255) 0px 0px 5px, rgb(0, 216, 255) 0px 0px 10px, rgb(0, 216, 255) 0px 0px 20px"
    );
});

$(".nav_link_box").mouseover(function() {
    $("#navHeader").css(
        "box-shadow",
        "rgb(0, 216, 255) 0px 0px 5px, rgb(0, 216, 255) 0px 0px 10px, rgb(0, 216, 255) 0px 0px 20px"
    );
});

$(".nav_link_box").mouseout(function() {
    $("#navHeader").css("box-shadow", "none");
});

//$(".dropdown-item").mouseover(function() {
//   $(".dropdown-menu").css(
//       "box-shadow",
//       "rgb(0, 216, 255) 0px 0px 5px, rgb(0, 216, 255) 0px 0px 10px, rgb(0, 216, 255) 0px 0px 20px"
//    );
//});

//$(".dropdown-item").mouseout(function() {
//   $(".dropdown-item").css("box-shadow", "none");
//});

// Show navbar setTimout

$(".pagination_hide_article").click(function() {
    $(this).toggleClass("pagination_show");
    $(".pagination_slide_article").html() == "Lire Plus"
        ? $(".pagination_slide_article").html("Fermer")
        : $(".pagination_slide_article").html("Lire Plus");
});

$(".pagination_hide_add").click(function() {
    $(this).toggleClass("pagination_show");
    $(".pagination_slide_add").html() == "Lire Plus"
        ? $(".pagination_slide_add").html("Fermer")
        : $(".pagination_slide_add").html("Lire Plus");
});

function runIt() {
    $(".cyberTruck_alert_box")
        .animate({ right: "+=400" }, 800)
        .animate({ right: "+=00" }, 1000000)
        .animate({ right: "-=400" }, 800);
}

// Video

let vid = document.getElementById("headerVideo");

$("#pauseHeaderVideo").click(function() {
    vid.pause();

    $(this).hide();
    $("#playHeaderVideo").show();
});

$("#playHeaderVideo").click(function() {
    vid.play();

    $(this).hide();
    $("#pauseHeaderVideo").show();
});
