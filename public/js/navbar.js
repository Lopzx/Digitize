

// Sidebar
let sidebarMenu = document.querySelector("#sidebar-menu");
let sidebarWrapper = document.querySelector("#sidebar-wrapper");

function sidebarMenuWrapper() {
    if (sidebarMenu.classList.contains("hidden")) {
        sidebarMenu.classList.remove("hidden");
    } else {
        sidebarMenu.classList.add("hidden");
    }
}

let closeSidebar = document.querySelector("#close-sidebar");
let sidebarBlank = document.querySelector("#sidebar-blank");

sidebarBlank.onclick = function () {
    if (!sidebarMenu.classList.contains("hidden")) {
        sidebarMenu.classList.add("hidden");
    }
};

closeSidebar.onclick = function () {
    if (!sidebarMenu.classList.contains("hidden")) {
        sidebarMenu.classList.add("hidden");
    }
};

// Dropdown Profile (Navbar)
let navbarMenu = document.querySelector("#navbar-menu");
let navbarProfileWrapper = document.querySelector("#navbar-profile-wrapper");

function navbarProfile() {
    if (navbarMenu.classList.contains("hidden")) {
        navbarMenu.classList.remove("hidden");
    } else {
        navbarMenu.classList.add("hidden")
    }
}

window.onclick = function (close) {
    if (
        !navbarProfileWrapper.contains(close.target) &&
        !navbarMenu.classList.contains("hidden")
    ) {
        navbarMenu.classList.add("hidden");
    }
}
// Logout Popup
let logoutPopup = document.querySelector("#logout-popup");
let logoutBtn = document.querySelector("#logout-btn");
let logoutSidebarBtn = document.querySelector("#logout-sidebar-btn");
let logoutCancel = document.querySelector("#logout-cancel")

logoutBtn.onclick = function () {
    logoutPopup.classList.remove("hidden");
}
logoutSidebarBtn.onclick = function (e) {
    e.preventDefault();
    logoutPopup.classList.remove("hidden");
}
logoutCancel.onclick = function () {
    logoutPopup.classList.add("hidden");
}
