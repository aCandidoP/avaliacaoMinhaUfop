document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star');
    const avaliacaoDescritiva = document.getElementById('avaliacao-descritiva');
    let countClicks = 0;
    
    const descricoes = {
        1: 'Muito Ruim',
        2: 'Ruim',
        3: 'Regular',
        4: 'Bom',
        5: 'Muito Bom'
    };

    let ratingAtivo = 1; // Padrão "Muito Ruim"

    // Inicializa a descrição com a estrela ativa (clicada)
    const initialRating = document.querySelector('.fiveStars .ativo');
    if (initialRating) {
        const initialRatingValue = initialRating.getAttribute('data-avaliacao');
        ratingAtivo = parseInt(initialRatingValue);
        avaliacaoDescritiva.textContent = descricoes[ratingAtivo];
    } else {
        avaliacaoDescritiva.textContent = descricoes[1]; // Caso não tenha estrela ativa
    }

    stars.forEach(star => {
        // Hover (mouse entra na estrela)
        star.addEventListener('mouseenter', function() {
            const rating = this.getAttribute('data-avaliacao');
            stars.forEach(star => {
                if (star.getAttribute('data-avaliacao') <= rating) {
                    star.classList.add('hover');
                } else {
                    star.classList.remove('hover');
                }
            });
            avaliacaoDescritiva.textContent = descricoes[rating]; // Atualiza descrição ao passar o mouse
        });

        // Hover (mouse sai da estrela)
        star.addEventListener('mouseleave', function() {
            stars.forEach(star => star.classList.remove('hover'));
            // Se já foi clicado, mantém a descrição da estrela ativa
            if (this.classList.contains('ativo')) {
                avaliacaoDescritiva.textContent = descricoes[ratingAtivo];
            }
        });

        // Clique para marcar a estrela
        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-avaliacao');
            ratingAtivo = parseInt(rating); // Atualiza a avaliação ativa
            stars.forEach(star => {
                if (star.getAttribute('data-avaliacao') <= rating) {
                    star.classList.add('ativo');
                } else {
                    star.classList.remove('ativo');
                }
            });

            // Atualiza a descrição após clicar
            avaliacaoDescritiva.textContent = descricoes[rating];
        });

        star.addEventListener('click', function() {
            countClicks++
            if (parseInt(countClicks) >= 1) {
                formComment = document.getElementById('floatingTextarea')
                formComment.removeAttribute('disabled')
                }
            })  
    });

    // Manter a descrição visível ao passar o mouse sobre "Avalie o serviço"
    const labelsStars = document.getElementById('labelsStars');
    labelsStars.addEventListener('mouseover', () => {
        avaliacaoDescritiva.style.visibility = 'visible'; // Torna a descrição visível
    });

    // A descrição não deve desaparecer se o mouse sair das estrelas
    labelsStars.addEventListener('mouseleave', () => {
        // Se já foi clicado, mantém a descrição da estrela ativa
        if (ratingAtivo) {
            avaliacaoDescritiva.textContent = descricoes[ratingAtivo];
        }
    }); 
             
});


const text = document.getElementById('floatingTextarea');
const tamanho = text.getAttribute('maxlength');
const counter = document.getElementById('contador');
const tam = document.getElementById('tamtext');

tam.textContent = tamanho;

let countPress = 0;
let countSpace = 0;

text.addEventListener('input', function(event){    
    var escrito = text.value.length;
    counter.textContent = escrito;
});

const emailusuario = document.getElementById('emailusuariojs');
var select = document.getElementById("nomeusuariojs");
select.addEventListener("click", function (){
    emailusuario.textContent = select.options[select.selectedIndex].value;
});

select.addEventListener("keydown", function (event){
    if(event.key === 'Enter'){
        emailusuario.textContent = select.options[select.selectedIndex].value;
    }
});
