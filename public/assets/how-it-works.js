document.addEventListener('DOMContentLoaded', function () {
    var subnavLinks = Array.prototype.slice.call(document.querySelectorAll('.steps-subnav a'));
    if (!subnavLinks.length) return;

    var sections = subnavLinks
        .map(function (link) { return document.querySelector(link.getAttribute('href')); })
        .filter(Boolean);

    function setActive(id) {
        subnavLinks.forEach(function (link) {
            link.classList.toggle('is-active', link.getAttribute('href') === '#' + id);
        });
    }

    if ('IntersectionObserver' in window && sections.length) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    setActive(entry.target.id);
                }
            });
        }, { rootMargin: '-96px 0px -60% 0px', threshold: 0 });

        sections.forEach(function (section) { observer.observe(section); });
    }
});
