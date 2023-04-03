window.onload = () => {
    const toggleEye = () => {
        document.querySelector("#open-eye").classList.toggle("d-none");
        document.querySelector("#closed-eye").classList.toggle("d-none");
    };

    const showPass = () => {
        const passwordInput = document.querySelector("#password");
        if (passwordInput.getAttribute("type") === "password")
            passwordInput.setAttribute("type", "text");
        else passwordInput.setAttribute("type", "password");
        toggleEye();
    };

    const eyeBox = document.querySelector(".eye-box");
    eyeBox.addEventListener("click", showPass);
};
