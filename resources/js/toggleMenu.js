function toggleMenu() {
    const mobileMenu = document.getElementById('mobile-sidebar-menu');

    if (mobileMenu.style.transform === 'translateX(0%)') {
        mobileMenu.style.transform = 'translateX(-100%)';
    } else {
        mobileMenu.style.transform = 'translateX(0%)';
    }
}

window.toggleMenu = toggleMenu;

export default toggleMenu;