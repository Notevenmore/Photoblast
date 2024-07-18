const template = document.querySelector(".template");
let isDown = false;
let startX;
let scrollLeft;

template.addEventListener("mousedown", (e) => {
    isDown = true;
    template.classList.add("active");
    startX = e.pageX - template.offsetLeft;
    scrollLeft = template.scrollLeft;
    console.log("Mouse down: startX =", startX, "scrollLeft =", scrollLeft);
});

template.addEventListener("mouseleave", () => {
    isDown = false;
    template.classList.remove("active");
    console.log("Mouse leave");
});

template.addEventListener("mouseup", () => {
    isDown = false;
    template.classList.remove("active");
    console.log("Mouse up");
});

template.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - template.offsetLeft;
    const walk = (x - startX) * 2;
    template.scrollLeft = scrollLeft - walk;
    console.log(
        "Mouse move: x =",
        x,
        "walk =",
        walk,
        "scrollLeft =",
        template.scrollLeft
    );
});
