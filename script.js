document.addEventListener("DOMContentLoaded", () =>{

        const buttons = document.querySelectorAll(".drop-btn button");

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            console.log("clicked")
            const dropdown = document.querySelector(".dropdown");
            dropdown.style.display =
                dropdown.style.display === "block" ? "none" : "block";
        });
    });
});