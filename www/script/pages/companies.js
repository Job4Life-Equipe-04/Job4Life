let ContainerCompanyDescDesc = Array.from(
  document.querySelectorAll(".cont-company-descripton")
);

const CompaniesButtons = document.querySelectorAll(".company-button");

let eachOfferButton = Array.from(CompaniesButtons);
let closerOfferDesc = Array.from(document.querySelectorAll(".closer"));
let CompanDesc = Array.from(document.querySelectorAll(".offer-description"));

for (let button = 0; button < eachOfferButton.length; button++) {
  eachOfferButton[button].addEventListener("click", () => {
    ContainerCompanyDescDesc[button].style.display = "flex";
  });
  closerOfferDesc[button].addEventListener("click", () => {
    ContainerCompanyDescDesc[button].style.display = "none";
  });
}

document.getElementById("createcompany").addEventListener("click", () => {
  document.querySelector(".createcompany").style.display = "flex";
});
