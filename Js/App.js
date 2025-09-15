const aryAnhInfo = [
    { src: "img/slide/banner.webp" },
    { src: "img/slide/banner2.webp" },
    { src: "img/slide/banner3.webp" },
    { src: "img/slide/banner4.webp" },
    { src: "img/slide/banner5.webp" },
];

var setint = 0;
let indexCurrent = 0;
function loadAnh() {
    for (let index = 0; index < aryAnhInfo.length; index++) {
        const element = aryAnhInfo[index];
        const objImg = new Image();
        objImg.src = element.src;
        aryAnh.push(objImg);
    }
}

function previous() {
    if (indexCurrent > 0) {
        indexCurrent--;
        let objAnh = document.querySelector("#slideshow>img");
        objAnh.src = aryAnhInfo[indexCurrent].src;
    }
}

function next() {
    if (indexCurrent < aryAnhInfo.length - 1) {
        indexCurrent++;
        let objAnh = document.querySelector("#slideshow>img");
        objAnh.src = aryAnhInfo[indexCurrent].src;
    }
}

function autoplay() {
    indexCurrent += 1;
    if (indexCurrent >= aryAnhInfo.length - 1) {
        indexCurrent = 0;
    }
    let objAnh = document.querySelector("#slideshow>img");
    objAnh.src = aryAnhInfo[indexCurrent].src;
}

document.addEventListener("DOMContentLoaded", (event) => {
    stop();
    setint = setInterval(autoplay, 2000);
    var count = 0;
    if (getCookie('cartItems') !== "") {
        var items = JSON.parse(getCookie('cartItems'));
        items.forEach(element => {
            count += Number(element.so_luong);
        });

    }
    document.getElementById('cartItemCount').innerText = count;

});

function play() {
    stop();
    setint = setInterval(autoplay, 2000);
}

function stop() {
    clearInterval(setint);
}

function ShowDetail(item) {
    $("#bodyPopup").load(`./?act=show-popup-detail&id=${item}`, function (responseTxt, statusTxt, xhr) {
        var temp = document.createElement('div');
        temp.innerHTML = responseTxt;
        var content = temp.getElementsByClassName('popupContent');
        if (content.length > 0)
            $(this).html(content[0].innerHTML);
    });
}

function ShowCart() {
    $("#bodyPopup").load(`./?act=show-popup-cart`, function (responseTxt, statusTxt, xhr) {
        var temp = document.createElement('div');
        temp.innerHTML = responseTxt;
        var content = temp.getElementsByClassName('popupContent');
        if (content.length > 0)
            $(this).html(content[0].innerHTML);
    });
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + encodeURIComponent(cvalue) + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return decodeURIComponent(c.substring(name.length, c.length));
        }
    }
    return "";
}

