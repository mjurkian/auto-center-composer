document.addEventListener("DOMContentLoaded",
    function () {
        let div, n,
            v = document.getElementsByClassName("youtube-player");
        for (n = 0; n < v.length; n++) {
            div = document.createElement("div");
            div.setAttribute("data-id", v[n].dataset.id);
            div.innerHTML = addThumb(v[n].dataset.id);
            div.onclick = Iframe;
            v[n].appendChild(div);
        }
    });

function addThumb(id) {
    let thumb = '<img src="https://i.ytimg.com/vi/ID/maxresdefault.jpg">',
        play = '<div class="play"></div>';
    return thumb.replace("ID", id) + play;
}

function Iframe() {
    let iframe = document.createElement("iframe");
    let embed = "https://www.youtube.com/embed/ID?autoplay=1";
    iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("allowfullscreen", "1");
    this.parentNode.replaceChild(iframe, this);
}
