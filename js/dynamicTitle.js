window.onload = function () {
    var pageTitle = document.title;
    var attentionMessage = "👋 Don\'t forget to come back!";

    document.addEventListener('visibilitychange', function (e) {
        var isPageActive = !document.hidden;

        if (!isPageActive) {
            document.title = attentionMessage;
        } else {
            document.title = pageTitle;
        }
    });
};