document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star');
    
    stars.forEach(star => {
        star.addEventListener('mouseenter', function() {
            const rating = this.getAttribute('data-avaliacao');
            stars.forEach(star => {
                if (star.getAttribute('data-avaliacao') <= rating) {
                    star.classList.add('hover');
                } else {
                    star.classList.remove('hover');
                }
            });
        });

        star.addEventListener('mouseleave', function() {
            stars.forEach(star => star.classList.remove('hover'));
        });

        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-avaliacao');
            stars.forEach(star => {
                if (star.getAttribute('data-avaliacao') <= rating) {
                    star.classList.add('ativo');
                } else {
                    star.classList.remove('ativo');
                }
            });
        });
    });
});
