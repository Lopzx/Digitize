// Sidebar
var sidebarMenu = document.getElementById("sidebar-menu");
var sidebarWrapper = document.getElementById("sidebar-wrapper");

function sidebarMenuWrapper() {
    if (sidebarMenu.classList.contains("hidden")) {
        sidebarMenu.classList.remove("hidden");
    } else {
        sidebarMenu.classList.add("hidden");
    }
}

// Close Sidebar
// window.onclick = function (close) {
//     if ()
// };

let sidebarBlank = document.getElementById("sidebar-blank");
let closeSidebar = document.getElementById("close-sidebar");

closeSidebar.onclick = function () {
    if (!sidebarMenu.classList.contains("hidden")) {
        sidebarMenu.classList.add("hidden");
    }
};
sidebarBlank.onclick = function () {
    if (!sidebarMenu.classList.contains("hidden")) {
        sidebarMenu.classList.add("hidden");
    }
};
