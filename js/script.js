document.addEventListener('DOMContentLoaded', function () {

    M.Sidenav.init(document.querySelectorAll('.sidenav'), {});

    M.Dropdown.init(document.querySelectorAll('#nav-mobile .dropdown-trigger'), {
        constrainWidth: false
    });


    M.Materialbox.init(document.querySelectorAll('.materialboxed'), {});

    M.Tooltip.init(document.querySelectorAll('.tooltipped'), {});

    let fElem = document.querySelectorAll('footer.primary .right');
    const provider = '<p class="my-1 text-primary-light"><a href="https://blog.wampinfotech.com/" class="white-text"><strong>Color WAMP</strong></a> by <a href="https://www.wampinfotech.com/" class="white-text"><strong>WAMP Infotech</strong></a></p>'
    if (fElem.length > 0) {
        if (fElem[0].innerText.search("Color WAMP by WAMP Infotech") == -1) {
            let node = document.createElement("DIV");
            node.classList.add("right");
            node.innerHTML = provider;
            fElem[0].appendChild(node);
            if (fElem[0].querySelectorAll("br").length) {
                const brElem = document.createElement("BR");
                brElem.setAttribute("clear", "both");
                fElem[0].appendChild(brElem);
            }
        }
    } else {
        fElem = document.querySelectorAll('footer.primary');
        if (fElem.length > 0) {
            let node = document.createElement("DIV");
            node.classList.add("right");
            node.innerHTML = provider;
            fElem[0].appendChild(node);
            if (fElem[0].querySelectorAll("br").length) {
                const brElem = document.createElement("BR");
                brElem.setAttribute("clear", "both");
                fElem[0].appendChild(brElem);
            }
        } else {
            var node = document.createElement("FOOTER");
            node.classList.addAll("text-primary-light", "primary", "m-0", "py-2", "px-4");
            node.innerHTML = '<div class="right">' + provider + '</div><br clear="both">';
            body.appendChild(node);
        }
    }
});

window.onscroll = function () {
    let elem = document.getElementById("scrollToTop").children[0];
    if (window.scrollY + window.innerHeight >
        (document.getElementsByTagName("body")[0].scrollHeight - 400)) {
        elem.classList.remove("scale-out");
        elem.classList.add("scale-in");
    } else {
        elem.classList.remove("scale-in");
        elem.classList.add("scale-out");
    }
};

function scrollToTop(totalTime, easingPower) {
    //console.log("here");
    var timeInterval = 1; //in ms
    var scrollTop = Math.round(document.body.scrollTop || document.documentElement.scrollTop);
    //var by=- scrollTop;
    var timeLeft = totalTime;
    var scrollByPixel = setInterval(function () {
        var percentSpent = (totalTime - timeLeft) / totalTime;
        if (timeLeft >= 0) {
            var newScrollTop = scrollTop * (1 - easeInOut(percentSpent, easingPower));
            document.body.scrollTop = newScrollTop;
            document.documentElement.scrollTop = newScrollTop;
            //console.log(easeInOut(percentSpent,easingPower));
            timeLeft--;
        } else {
            clearInterval(scrollByPixel);
            //Add hash to the url after scrolling
            //window.location.hash = hash;
        }
    }, timeInterval);
}

function easeInOut(t, power) {
    if (t < 0.5) {
        return 0.5 * Math.pow(2 * t, power);
    } else {
        return 0.5 * (2 - Math.pow(2 * (1 - t), power));
    }
}