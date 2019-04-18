Array.prototype.random = function() {
    return this[Math.floor(Math.random() * this.length)];
};

const input = document.getElementById("guess");
const submitBtn = document.getElementById("submitGuess");
const resetBtn = document.getElementById("reset");
const cheatBtn = document.getElementById("cheat");

let messages = {
    low: ["A little low on that one.", "Not quite there, aim higher", "A lowball there i tell you"],

    high: [
        "Shooting for the stars i see, you shot a little high",
        "Betting on high, too bad its not there",
        "Off the charts with that guess"
    ],

    correct: ["How do i compute this loss? Well done you win"],
    exceeded: ["Sorry buddy thats all your guesses, hit reset to try again"]
};

const apiPath = `${location.href}api.php`;

submitBtn.addEventListener("click", submitGuess);
input.addEventListener("keydown", ({ key }) => key == "Enter" && submitGuess());

async function submitGuess() {
    const guess = parseInt(input.value);

    if (isNaN(guess)) {
        return;
    }

    let response = await fetch(apiPath, {
        method: "POST",
        credentials: "same-origin",
        body: JSON.stringify({
            method: "makeGuess",
            guess
        })
    });

    if (!response.ok) {
        return alert(await response.clone().text());
    }

    let result = await response.json();

    if (result.exceeded) {
        return writeText(messages.exceeded.random());
    }

    if (result.correct) {
        return writeText(messages.correct.random());
    }

    let messagePile = result.low ? messages.low : messages.high;

    writeText(messagePile.random());
}

async function reset() {
    await fetch(apiPath, {
        method: "POST",
        credentials: "same-origin",
        body: JSON.stringify({
            method: "reset"
        })
    });
}

async function cheat() {
    return parseInt(
        await (await fetch(apiPath, {
            method: "POST",
            credentials: "same-origin",
            body: JSON.stringify({
                method: "getNumber"
            })
        })).text()
    );
}

function writeText(text) {
    let [outTitle, inTitle] = document.querySelectorAll("div.message-container h1");

    // Have mercy on this if statement ༼ つ ಥ_ಥ ༽つ
    if (outTitle.classList.contains("out")) {
        outTitle.classList.remove("out", "in");
        inTitle.classList.remove("out", "in");

        outTitle.classList.add("in");
        inTitle.classList.add("out");
    } else if (outTitle.classList.contains("in")) {
        outTitle.classList.remove("out", "in");
        inTitle.classList.remove("out", "in");

        outTitle.classList.add("out");
        inTitle.classList.add("in");
    } else {
        outTitle.classList.toggle("out");
        inTitle.classList.toggle("in");
    }

    let textElement = document.querySelector("h1.in") || inTitle;

    textElement.textContent = text;
}

resetBtn.addEventListener("click", async () => {
    await reset();

    writeText("All reset");
});

cheatBtn.addEventListener("click", async () => {
    let number = await cheat();

    writeText(`The number is ${number}. You cheater...`);
});
