document.addEventListener("DOMContentLoaded", function (event) {
    let selectOptions = document.querySelectorAll('.selector>div');
    selectOptions.forEach(function (option) {
        option.addEventListener('click', function (event) {
            changeSelect(this);
        });
    });
    let cards = document.querySelectorAll('.card');
    cards.forEach(function (card) {
        card.addEventListener('click', function (event) {
            this.classList.toggle('card-selected');
        });
    });
});


function removeActiveSelect() {
    let selectOptions = document.querySelectorAll('.selector>div');
    selectOptions.forEach(function (option) {
        option.classList.remove('selector-active');
    });
}

function changeSelect(element) {
    removeActiveSelect();
    element.classList.add('selector-active');
    let selectedType = element.dataset.type;
    let title = document.querySelector('.content-title');
    if (selectedType == 'all-cars') {
        title.innerHTML = 'Все машины';
    }
    if (selectedType == 'hatchback') {
        title.innerHTML = 'Хэтчбек';
    }
    if (selectedType == 'jeep') {
        title.innerHTML = 'Джип';
    }
    if (selectedType == 'passenger') {
        title.innerHTML = 'Седан';
    }
    hideAllCards();
    showCards(selectedType);
}

function hideAllCards() {
    let cards = document.querySelectorAll('.card');
    cards.forEach(function (card) {
        card.classList.add('card-hidden');
    });
}

function showCards(type) {
    let cards = document.querySelectorAll('.card');
    cards.forEach(function (card) {
       let cardType = card.dataset.type;
       if (type == 'all-cars' || type == cardType) {
           card.classList.remove('card-hidden');
       }
    });
}