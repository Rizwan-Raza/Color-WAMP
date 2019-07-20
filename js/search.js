function toggleSearch(el) {
    var elem = document.getElementById("search-top");
    navs = elem.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("menu-item");
    if (!elem.classList.contains("streched")) {
        elem.style.display = "block";
        if (window.innerWidth <= 992) {
            for (const element of navs) {
                element.classList.add("scale-out");
            }
        }
        setTimeout(() => {
            if (window.innerWidth <= 992) {
                for (const element of navs) {
                    element.style.display = "none";
                }
            }
            elem.classList.add("streched")
            elem.focus();
            el.getElementsByClassName("material-icons")[0].innerHTML = "close";
        }, window.innerWidth <= 992 ? 300 : 0);
    } else {
        elem.classList.remove("streched")
        el.getElementsByClassName("material-icons")[0].innerHTML = "search";
        if (window.innerWidth <= 992) {
            for (const element of navs) {
                element.style.display = "inline-block";
            }
            setTimeout(() => {
                for (const element of navs) {
                    element.classList.remove("scale-out");
                }
            }, 300);
        }
    }
}