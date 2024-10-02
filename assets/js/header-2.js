// MOBILE MENU SIDEBAR
const edMobileMenuOpenBtn = document.querySelector(".ed-mobile-menu-open-btn");
const edMobileMenuContents = document.querySelectorAll(".to-go-to-sidebar-in-mobile");
const edMobileMenuContainer = document.querySelector(".ed-header-nav-in-mobile");
const edHeaderNav = document.querySelectorAll(".ed-header-nav li");
if (window.innerWidth < 1400) {
    edHeaderNav.forEach(edHeaderNavItem => {
        edHeaderNavItem.addEventListener("click", () => {
            edHeaderNavItem.classList.toggle("active");
        });
    });

    edMobileMenuContents.forEach(edMobileMenuContent => {
        edMobileMenuContainer.appendChild(edMobileMenuContent);
        window.addEventListener("resize", () => {
            if (window.innerWidth < 1400) {
                edMobileMenuContainer.appendChild(edMobileMenuContent);
            };
        });
    });
};

edMobileMenuOpenBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    edSidebar.classList.add("active");
    edOverlay.classList.add("active");
});