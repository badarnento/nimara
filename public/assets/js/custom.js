function getCookie(name) {
    let match = document.cookie.match(new RegExp("(^| )" + name + "=([^;]+)"));
    return match ? match[2] : null;
}

const menu = document.getElementById("menu");
const menuBtn = document.getElementById("menu-btn");
const closeBtn = document.getElementById("close-btn");

menuBtn.addEventListener("click", () => {
    menu.classList.add("active");
});
closeBtn.addEventListener("click", () => {
    menu.classList.remove("active");
});

let startX = 0;
menu.addEventListener("touchstart", (e) => {
    startX = e.touches[0].clientX;
});
menu.addEventListener("touchmove", (e) => {
    let moveX = e.touches[0].clientX;
    if (startX - moveX > 50) {
        menu.classList.remove("active");
    }
});
