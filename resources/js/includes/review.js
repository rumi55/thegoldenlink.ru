window.show_video = function (src) {
    modal({
        content: `<iframe width="420" height="315" src="${src}" frameborder="0" allowfullscreen></iframe>`,
    }).show();
}
