// Opties
const SERVER_OPTIES = ["een hoorntje", "hoorn", "een hoorn", "bak", "bakje", "een bak", "een bakje"];
const MAX_BOLLETJES = 8;

// Prijzen
const LITER_IJS = 9.80;
const BOLLETJES = 0.95;
const HOORENTJES = 1.25;
const BAKJES = 0.75;

const SLAGROOM = 0.50;
const SPRINKELS = 0.30;
const CARAMEL_SAUS_HOORN = 0.60;
const CARAMEL_SAUS_BAKJE = 0.90;

const smakenKiez = ['vanille', 'chocolade', 'aardbei'];

const BTW = 9;

// Data van de klant
let bestelingZakelijke = {};
let gekozenSmaken = {
    'vanille': 0,
    'chocolade': 0,
    'aardbei': 0
};
let gekozenSaus = {};

let besteling = {
    'bolletjes': 0,
    'hoorentjes': 0,
    'bakjes': 0,
};

const rekeningText = '---------["Papi Gelato"]---------';
const voutMelding = 'Sorry, dat is geen optie die we aanbieden...';



function resetOrders() {
    besteling = { 'bolletjes': 0, 'hoorentjes': 0, 'bakjes': 0 };
    bestelingZakelijke = {};
    gekozenSmaken = { 'vanille': 0, 'chocolade': 0, 'aardbei': 0 };
    gekozenSaus = {};
}

function inputCheck(text, type, expected = null) {
    while (true) {
        if (type === 'number') {
            const input = prompt(text);
            const number = parseInt(input);
            if (!isNaN(number)) {
                return number;
            } else {
                alert("Voer een geldig getal in!");
            }
        } else if (type === 'string') {
            const input = prompt(text).toLowerCase();
            if (expected) {
                if (expected.includes(input)) {
                    return input;
                } else {
                    alert(voutMelding + `\nVoer een van de volgende opties in: ${expected.join(', ')}`);
                }
            } else {
                return input;
            }
        } else if (type === 'boolean') {
            const input = prompt(text).trim().toLowerCase();
            if (['true', '1', 'yes', 'y', 'ja', 'j'].includes(input)) {
                return true;
            } else if (['false', '0', 'no', 'n', 'nee'].includes(input)) {
                return false;
            } else {
                alert("Voer 'true' of 'false' in!");
            }
        } else {
            alert("Ongeldig type opgegeven!");
        }
    }
}

function clearScreen() {
    console.clear();
}

function particuliereKlant() {
    const antwoord = inputCheck('Bent u 1) een particuliere klant of 2) een zakelijke klant?', 'string', ['1', '2', 'particuliere klant', 'zakelijke klant']);
    return antwoord === '1' || antwoord === 'particuliere klant';
}

function formType(hoeveelheid, besteling) {
    const formType = inputCheck(`Wilt u deze ${hoeveelheid} bolletje(s) in een hoorntje of een bakje? `, 'string', SERVER_OPTIES);
    if (["een hoorntje", "hoorn", "een hoorn"].includes(formType)) {
        besteling['hoorentjes'] += 1;
        return "hoorntje";
    } else if (["bak", "bakje", "een bak", "een bakje"].includes(formType)) {
        besteling['bakjes'] += 1;
        return "bakje";
    }
}

function smakenKies(hoeveelheid, smakenKiez, gekozenSmaken) {
    for (let i = 1; i <= hoeveelheid; i++) {
        const smaak = inputCheck(
            `Welke smaak wilt u voor bolletje ${i}? (${smakenKiez.join(', ')})`,
            'string',
            smakenKiez
        ).toLowerCase();

        if (gekozenSmaken[smaak] !== undefined) {
            gekozenSmaken[smaak] += 1;
        } else {
            alert(`De smaak '${smaak}' is niet beschikbaar.`);
        }
    }
    return gekozenSmaken;
}

function saus(hoeveelheid, gekozenSaus, besteling) {
    const antwoord = inputCheck("Wilt u nog topping bij? (ja/nee): ", 'boolean');
    if (antwoord) {
        const topping = inputCheck(
            "Welke topping wilt u? \n- Caramel in bakje (€0.90) \n- Caramel in hoorntje (€0.60) \n- Sprinkels (€0.30 per bolletje)\n- Slagroom (€0.50)\n",
            'string',
            ['slagroom', 'caramel', 'sprinkels']
        );

        if (topping === 'caramel') {
            if (besteling['hoorentjes'] > 0) {
                gekozenSaus['caramel'] = CARAMEL_SAUS_HOORN;
            } else if (besteling['bakjes'] > 0) {
                gekozenSaus['caramel'] = CARAMEL_SAUS_BAKJE;
            } else {
                alert("Caramel kan alleen toegevoegd worden aan een hoorntje of een bakje.");
            }
        } else if (topping === 'sprinkels') {
            gekozenSaus['sprinkels'] = hoeveelheid * SPRINKELS;
        } else if (topping === 'slagroom') {
            gekozenSaus['slagroom'] = SLAGROOM;
        }
    }
    return gekozenSaus;
}

// Particuliere klant
function bestelenParticuliereKlant(besteling, smakenKiez, gekozenSmaken, gekozenSaus) {
    while (true) {
        const hoeveelheid = inputCheck("Hoeveel bolletjes wilt u? ", 'number');

        if (hoeveelheid <= 0) {
            alert(voutMelding);
            continue;
        }

        if (hoeveelheid > MAX_BOLLETJES) {
            alert("Sorry, zulke grote bakken hebben we niet.");
            continue;
        }

        besteling['bolletjes'] += hoeveelheid;

        gekozenSmaken = smakenKies(hoeveelheid, smakenKiez, gekozenSmaken);

        if (hoeveelheid >= 1 && hoeveelheid <= 3) {
            const formTypeResult = formType(hoeveelheid, besteling);
            gekozenSaus = saus(hoeveelheid, gekozenSaus, besteling);
            alert(`Hier is uw ${formTypeResult} met ${hoeveelheid} bolletje(s).`);
            break;
        } else if (hoeveelheid >= 4 && hoeveelheid <= MAX_BOLLETJES) {
            alert(`Dan krijgt u van mij een bakje met ${hoeveelheid} bolletjes.`);
            besteling['bakjes'] += 1;
            gekozenSaus = saus(hoeveelheid, gekozenSaus, besteling);
            break;
        }
    }
}

function rekeningParticuliereKlant(besteling, gekozenSmaken, gekozenSaus) {
    clearScreen();
    const totaal = (
        besteling['bolletjes'] * BOLLETJES +
        besteling['hoorentjes'] * HOORENTJES +
        besteling['bakjes'] * BAKJES +
        Object.values(gekozenSaus).reduce((a, b) => a + b, 0)
    );

    console.log(rekeningText);
    console.log('_'.repeat(rekeningText.length));
    console.log('');

    for (const [smaak, aantal] of Object.entries(gekozenSmaken)) {
        if (aantal > 0) {
            const smaakStr = `${smaak.charAt(0).toUpperCase() + smaak.slice(1)} bolletje(s)`;
            const prijs = (aantal * BOLLETJES).toFixed(2);
            console.log(`${smaakStr.padEnd(20)} ${aantal.toString().padStart(2)} x €${BOLLETJES.toFixed(2).padStart(5)} = €${prijs.padStart(6)}`);
        }
    }

    if (besteling['hoorentjes'] > 0) {
        const hoornPrijs = (besteling['hoorentjes'] * HOORENTJES).toFixed(2);
        console.log(`Hoorntjes`.padEnd(20) + ` ${besteling['hoorentjes'].toString().padStart(2)} x €${HOORENTJES.toFixed(2).padStart(5)} = €${hoornPrijs.padStart(6)}`);
    }

    if (besteling['bakjes'] > 0) {
        const bakPrijs = (besteling['bakjes'] * BAKJES).toFixed(2);
        console.log(`Bakjes`.padEnd(20) + ` ${besteling['bakjes'].toString().padStart(2)} x €${BAKJES.toFixed(2).padStart(5)} = €${bakPrijs.padStart(6)}`);
    }

    for (const [topping, prijs] of Object.entries(gekozenSaus)) {
        console.log(`Topping`.padEnd(20) + ` = €${prijs.toFixed(2).padStart(6)}`);
    }

    console.log("                         ----+");
    console.log(`Totaal`.padEnd(20) + ` = €${totaal.toFixed(2).padStart(6)}`);
}

// Zakelijke klant
function bestelenZakelijkeKlant(bestelingZakelijke) {
    const smaak = inputCheck(`Welke smaak wilt u voor bolletje ${i}? (${smakenKiez.join(', ')})`,'string',smakenKiez).toLowerCase();
    const hoeveelheid = inputCheck('Hoeveel liters wilt u van deze smaak?', 'number');
    
    if (hoeveelheid > 0) {
        if (bestelingZakelijke[smaak]) {
            bestelingZakelijke[smaak] += hoeveelheid;
        } else {
            bestelingZakelijke[smaak] = hoeveelheid;
        }
    }
}

function rekeningZakelijke(bestelingZakelijke) {
    clearScreen();
    const totaal = Object.values(bestelingZakelijke).reduce((a, b) => a + b, 0) * LITER_IJS;
    const btw = (totaal - (totaal / (1 + BTW / 100))).toFixed(2);

    console.log(rekeningText);
    for (const [smaak, aantal] of Object.entries(bestelingZakelijke)) {
        const smaakStr = `L.${smaak.charAt(0).toUpperCase() + smaak.slice(1)}`;
        const prijs = (aantal * LITER_IJS).toFixed(2);
        console.log(`${smaakStr.padEnd(20)}${aantal.toString().padStart(5)} x €${LITER_IJS.toFixed(2).padStart(5)} = €${prijs.padStart(6)}`);
    }
    console.log("                         ----+");
    console.log(`Subtotaal`.padEnd(20) + ` = €${totaal.toFixed(2).padStart(6)}`);
    console.log(`BTW (${BTW}%)`.padEnd(20) + ` = €${btw.padStart(6)}`);
    console.log('-'.repeat(rekeningText.length));
}

// Hoofdprogramma
while (true) {
    clearScreen();
    console.log('Welkom bij Papi Gelato.');
    const antwoord = inputCheck('Bent u 1)particulier of 2)zakelijke klant?', 'string', ['1', '2']);

    if (antwoord === '1') {
        while (true) {
            bestelenParticuliereKlant(besteling, smakenKiez, gekozenSmaken, gekozenSaus);
            const antwoord = inputCheck('Wilt u nog iets bestellen?', 'boolean');
            if (!antwoord) {
                rekeningParticuliereKlant(besteling, gekozenSmaken, gekozenSaus);
                break;
            }
        }
    } else {
        while (true) {
            bestelenZakelijkeKlant(bestelingZakelijke);
            const antwoord = inputCheck('Wilt u nog iets bestellen?', 'boolean');
            if (!antwoord) {
                rekeningZakelijke(bestelingZakelijke);
                break;
            }
        }
    }

    console.log("Bedankt en tot ziens!");
    resetOrders();
    alert('Druk op Enter om door te gaan...');
}