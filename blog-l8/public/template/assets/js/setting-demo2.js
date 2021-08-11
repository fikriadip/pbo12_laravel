"use strict";

// Setting Color

$(window).resize(function () {
    $(window).width();
});

$(".changeBodyBackgroundFullColor").on("click", function () {
    if ($(this).attr("data-color") == "default") {
        $("body").removeAttr("data-background-full");
    } else {
        $("body").attr("data-background-full", $(this).attr("data-color"));
    }

    $(this)
        .parent()
        .find(".changeBodyBackgroundFullColor")
        .removeClass("selected");
    $(this).addClass("selected");
    layoutsColors();
});

$(".changeLogoHeaderColor").on("click", function () {
    if ($(this).attr("data-color") == "default") {
        $(".logo-header").removeAttr("data-background-color");
    } else {
        $(".logo-header").attr(
            "data-background-color",
            $(this).attr("data-color")
        );
    }

    $(this).parent().find(".changeLogoHeaderColor").removeClass("selected");
    $(this).addClass("selected");
    customCheckColor();
    layoutsColors();
});

$(".changeTopBarColor").on("click", function () {
    if ($(this).attr("data-color") == "default") {
        $(".main-header .navbar-header").removeAttr("data-background-color");
    } else {
        $(".main-header .navbar-header").attr(
            "data-background-color",
            $(this).attr("data-color")
        );
    }

    $(this).parent().find(".changeTopBarColor").removeClass("selected");
    $(this).addClass("selected");
    layoutsColors();
});

$(".changeSideBarColor").on("click", function () {
    if ($(this).attr("data-color") == "default") {
        $(".sidebar").removeAttr("data-background-color");
    } else {
        $(".sidebar").attr("data-background-color", $(this).attr("data-color"));
    }

    $(this).parent().find(".changeSideBarColor").removeClass("selected");
    $(this).addClass("selected");
    layoutsColors();
});

$(".changeBackgroundColor").on("click", function () {
    $("body").removeAttr("data-background-color");
    $("body").attr("data-background-color", $(this).attr("data-color"));
    $(this).parent().find(".changeBackgroundColor").removeClass("selected");
    $(this).addClass("selected");
});

function customCheckColor() {
    var logoHeader = $(".logo-header").attr("data-background-color");
    if (logoHeader !== "white") {
        $(".logo-header .navbar-brand").attr(
            "src",
            "../../assets/img/logo.svg"
        );
    } else {
        $(".logo-header .navbar-brand").attr(
            "src",
            "../../assets/img/logo2.svg"
        );
    }
}

var toggle_customSidebar = false,
    custom_open = 0;

if (!toggle_customSidebar) {
    var toggle = $(".custom-template .custom-toggle");

    toggle.on("click", function () {
        if (custom_open == 1) {
            $(".custom-template").removeClass("open");
            toggle.removeClass("toggled");
            custom_open = 0;
        } else {
            $(".custom-template").addClass("open");
            toggle.addClass("toggled");
            custom_open = 1;
        }
    });
    toggle_customSidebar = true;
}

$(document).ready(() => {
    $(window).scroll(function () {
        // STICKY NAVBAR ON SCROLL
        if (this.scrollY > 25) {
            $("#app").addClass("sticky");
        } else {
            $("#app").removeClass("sticky");
        }

        // SCROLL UP BUTTON SHOW/HIDE
        if (this.scrollY > 500) {
            $(".scroll-up-btn").addClass("show");
        } else {
            $(".scroll-up-btn").removeClass("show");
        }
    });

    // SLIDE UP
    $(".scroll-up-btn").click(() => {
        $("html").animate({ scrollTop: 0 });
        // REMOVING SMOOTH SCROLL ON SLIDE-UP BUTTON CLICK
        $("html").css("scrollBehavior", "smooth");
    });
});

function previewFile(input) {
    var file = $("input[type=file]").get(0).files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function () {
            $("#previewImg").attr("src", reader.result);
        };
        reader.readAsDataURL(file);
    }
}
