const langSelector = document.querySelector('#lang');

langSelector.addEventListener('change', function () {
    const lang = langSelector.value;
    fetch('scripts/lang.php', {
        method: 'POST',
        body: JSON.stringify({ action: 'changeLang', lang: lang })
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            location.reload();
        })
        .catch(error => {
            console.error(error);
            location.reload();
        });
});