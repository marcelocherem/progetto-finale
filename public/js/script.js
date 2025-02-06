//effetti sulle foto dei prodotti
document.addEventListener('DOMContentLoaded', function() {
    const imgProduct = document.querySelector('.imgProduct');
    const zoomImg = imgProduct.querySelector('img.zoom');

    imgProduct.addEventListener('mousemove', function(event) {
        const rect = imgProduct.getBoundingClientRect();
        const x = (event.clientX - rect.left) / rect.width * 100;
        const y = (event.clientY - rect.top) / rect.height * 100;

        zoomImg.style.transformOrigin = `${x}% ${y}%`;
    });

    imgProduct.addEventListener('mouseleave', function() {
        zoomImg.style.transformOrigin = 'center center';
    });
});

// area di ricerca
const searchBtn = document.querySelector('.search');
const searchArea = document.querySelector('.containerSearchBar');
const closeSearchArea = document.querySelector('.close');

searchBtn.addEventListener("click", function(event) {
    searchArea.classList.toggle('searchAppear');
});

closeSearchArea.addEventListener("click", function(event) {
    searchArea.classList.remove('searchAppear');
});