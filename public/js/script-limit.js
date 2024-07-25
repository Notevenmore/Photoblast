const maxChecked = 3;
const checkboxes = document.querySelectorAll(".checkbox-limit");

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
        const countChecked = document.querySelectorAll(
            ".checkbox-limit:checked"
        ).length;
        if (countChecked >= maxChecked) {
            checkboxes.forEach((cb) => {
                if (!cb.checked) {
                    cb.disabled = true;
                }
            });
        } else {
            checkboxes.forEach((cb) => {
                cb.disabled = false;
            });
        }
    });
});
