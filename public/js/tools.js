// Progress Scrolling Bar

$(window).scroll(function() {
    let scroll = $(window).scrollTop(),
        dh = $(document).height(),
        wh = $(window).height(),
        scrollPercent = (scroll / (dh - wh)) * 100;
    $("#progressBar").css("height", scrollPercent + "%");
});

// Background Fading On Scroll

let headerBg = document.getElementById("bg");
window.addEventListener("scroll", function() {
    headerBg.style.opacity = 1 - +window.pageYOffset / 550 + "";
    headerBg.style.top = +window.pageYOffset + "px";
    headerBg.style.backgroundPositionY = -+window.pageYOffset / 4 + "px";
});

// Alert message Show and Hide

$("#infoText")
    .delay(1000)
    .fadeOut(2000);

$("#save").click(function() {
    let image_name = $("#image").val();
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

function myFunction() {
    alert("hello");
}
