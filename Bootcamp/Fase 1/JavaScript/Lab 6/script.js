let container = document.getElementById("games-container");
let games = [];
let selectedGenre = "All";
let selectedGames = [];
let buyButton = document.getElementById("buyButton");

function loadData() {
    fetch('games.json')
        .then(res => res.json())
        .then(data => {
            games = Array.isArray(data) ? data : [data];
            displayGames(games);
        })
        .catch(() => {
            document.getElementById('output').textContent = "Ошибка загрузки!";
        });
}

function displayGames(games) {
    container.innerHTML = '';

    const filteredGames = games.filter(game => {

        const genreMatch = selectedGenre === "All" || game.genre === selectedGenre;

        const priceValue = parseFloat(document.getElementById('priceFilter').value);
        const priceMatch = isNaN(priceValue) || game.price <= priceValue;

        return genreMatch && priceMatch;
    });

    filteredGames.forEach(game => {
        let gameElement = document.createElement("div");
        gameElement.className = "game-container";


        let title = document.createElement("h3");
        title.textContent = game.title + ':';
        gameElement.appendChild(title);

        let pElements = document.createElement("div");
        pElements.className = "p-elements"



        let genre = document.createElement("p");
        genre.textContent = `Genre: ${game.genre}`;
        pElements.appendChild(genre);


        let rating = document.createElement("p");
        rating.textContent = `Rating: ${game.rating}`;
        pElements.appendChild(rating);

        let price = document.createElement("p");
        price.textContent = `Price: $${game.price.toFixed(2)}`;
        price.className = "price";
        pElements.appendChild(price);

        gameElement.appendChild(pElements);
        let checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.className = "game-checkbox";
        gameElement.appendChild(checkbox);

        checkbox.addEventListener("change", function() {
            if (checkbox.checked) {
                selectedGames.push(game);
            } else {
                selectedGames = selectedGames.filter(g => g !== game);
            }
            console.log(selectedGames);
        });

        container.appendChild(gameElement);
    });
}

document.querySelectorAll('.dropdown-menu .option').forEach(option => {
    option.addEventListener('click', () => {
        selectedGenre = option.dataset.genre;
        displayGames(games);  // обновить отображение
    });
});

document.getElementById('filterButton').addEventListener('click', () => {
    displayGames(games);  // обновить отображение
});

buyButton.addEventListener("click", function() {
    let str = 'Your Order:\n\n';
    let total = 0;

    for (let i in selectedGames) {
        let game = selectedGames[i];
        str += `${game.title.padEnd(30)} - $${game.price.toFixed(2)}\n`;
        total += game.price;
    }
    str += `\n${'='.repeat(40)}\n`;
    str += `Total: $${total.toFixed(2)}\n`;
    alert(str);
});

const dropdownButton = document.querySelector('.dropdown-button');
const dropdown = document.querySelector('.dropdown');

dropdownButton.addEventListener('click', () => {
    dropdown.classList.toggle('open');
});

function closeDropdown() {
    dropdown.classList.remove('open');
}

loadData();
