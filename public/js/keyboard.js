const Keyboard = window.SimpleKeyboard.default;

const keyboard = new Keyboard({
    onChange: (input) => onChange(input),
    onKeyPress: (button) => onKeyPress(button),
});

function onChange(input) {
    document.querySelector(".input input").value = input;
}

function onKeyPress(button) {
    if (button === "{enter}") {
        const enter = document.querySelector("button");
        enter.click();
    }
}
