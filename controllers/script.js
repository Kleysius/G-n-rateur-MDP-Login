let password = document.getElementById('password');
let tableauminuscule = ["a", "z", "e", "r", "t", "y", "u", "i", "o", "p", "q", "s", "d", "f", "g", "h", "j", "k", "l", "m", "w", "x", "c", "v", "b", "n"];
let tableaumajuscule = ["A", "Z", "E", "R", "T", "Y", "U", "I", "O", "P", "Q", "S", "D", "F", "G", "H", "J", "K", "L", "M", "W", "X", "C", "V", "B", "N"];
let tableaunumero = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
let tableausymbole = ["$", "%", "^", "&", "!", "@", "#", ":", ";", "'", ",", ".", ">", "/", "*", "-", ",", "|", "?", "~", "_", "=", "+"];
let copyButton = document.getElementById("copy");

function generate() {
    let mdp = '';
    let isChecked = false;
    let tableauxregroupe = [].concat(
        lowercase.checked ? tableauminuscule : [],
        uppercase.checked ? tableaumajuscule : [],
        numbers.checked ? tableaunumero : [],
        symbols.checked ? tableausymbole : []);

    // Vérifiez si au moins une case est cochée
    if (tableauxregroupe.length > 0) {
        isChecked = true;
    }

    // Affichez un message d'erreur si aucune case n'est cochée
    if (!isChecked) {
        let warning = document.getElementById('warning');
        warning.textContent = "Veuillez cocher au moins une case pour générer un mot de passe.";
        return;
    } else {
        warning.textContent = "";
    }

    let passwordLength = parseInt(document.getElementById('slider').value);

    // Change la couleur de la valeur de "display-password-length"
    let passwordLengthDisplay = document.getElementById('display-password-length');
    passwordLengthDisplay.style.color = passwordLength >= 14 ? "#24c266" : passwordLength >= 8 ? "orange" : "red";

    passwordLengthDisplay.textContent = passwordLength;

    for (i = 0; i < passwordLength; i++) {
        mdp += tableauxregroupe[Math.floor(Math.random() * tableauxregroupe.length)];
    }

    if (mdp.length < 8) {
        password.classList.add("weak");
        password.classList.remove("middle");
        password.classList.remove("strong");
    } else if (mdp.length < 14) {
        password.classList.add("middle");
        password.classList.remove("strong");
        password.classList.remove("weak");
    } else {
        password.classList.add("strong");
        password.classList.remove("middle");
        password.classList.remove("weak");
    }

    password.value = mdp;
    copyButton.innerHTML = "Copier"; // réinitialiser le texte du bouton
    copyButton.style.background = "#106575";
}

generate();

function copyPassword() {
    password.select();
    password.setSelectionRange(0, 99999);

    navigator.clipboard.writeText(password.value)
        .then(() => {
            copyButton.innerHTML = "Copié !";
            copyButton.style.background = "#24c266";

        })
        .catch((error) => {
            console.error("Erreur lors de la copie du mot de passe : ", error);
        });
}

copyButton.addEventListener("click", copyPassword);

let slider = document.getElementById('slider');
let thumb = document.querySelector("#thumbStyle");
let sliderColor = document.querySelector("#slider");

slider.addEventListener('input', function () {
    generate();
    let sliderValue = this.value;
    if (sliderValue >= 14) {
        sliderColor.style.background = "#24c26654";
        thumb.textContent = '#slider::-webkit-slider-thumb {border: none;height: 24px;width: 24px; border-radius: 25px; background: #24c266;cursor: pointer;-webkit-appearance: none;}'
    } else if (sliderValue < 14 && sliderValue >= 8) {
        sliderColor.style.background = "#ffa60040";
        thumb.textContent = '#slider::-webkit-slider-thumb {border: none;height: 24px;width: 24px; border-radius: 25px; background: #FFA500;cursor: pointer;-webkit-appearance: none;}'

    } else {
        sliderColor.style.background = "#ff000041";
        thumb.textContent = '#slider::-webkit-slider-thumb {border: none;height: 24px;width: 24px; border-radius: 25px; background: #e74c3c;cursor: pointer;-webkit-appearance: none;}'

    }
});

let generateButton = document.getElementById('generateBtn');

generateButton.addEventListener('click', function () {
    // Générer une couleur aléatoire
    let randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);

    // Changer la couleur du bouton
    generateButton.style.background = randomColor;
});