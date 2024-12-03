const toggleButton = document.getElementById('toggleButton');
const toggleBackButton = document.getElementById('toggleBackButton');
const cardContainer = document.getElementById('cardContainer');

toggleButton.addEventListener('click', function() {
    cardContainer.classList.add('flipped');
});

toggleBackButton.addEventListener('click', function() {
    cardContainer.classList.remove('flipped');
});