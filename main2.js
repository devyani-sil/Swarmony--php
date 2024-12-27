const sign_up_btn = document.querySelector("#sign-up-btn");
const sign_in_btn = document.querySelector("#sign-in-btn"); // Define sign_in_btn
const c = document.querySelector(".c");

sign_up_btn.addEventListener("click", () => {
  c.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  c.classList.remove("sign-up-mode");
});
