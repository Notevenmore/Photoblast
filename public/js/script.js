function showInput() {
    document.querySelector(".text").style.display = "none";
    document.querySelector(".input").style.display = "flex";
    document.getElementById("form-input").focus();
}

document.addEventListener("click", function (event) {
    var formInputDiv = document.querySelector(".input");
    var codeInput = document.getElementById("form-input");
    var redeemText = document.querySelector(".text");

    if (
        !formInputDiv.contains(event.target) &&
        !redeemText.contains(event.target) &&
        codeInput.value.trim() == ""
    ) {
        formInputDiv.style.display = "none";
        redeemText.style.display = "flex";
    }
});
