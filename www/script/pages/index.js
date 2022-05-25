let Offer = document.querySelectorAll(".offer");
let SearchInput = document.getElementById("companies-search");
let closerOfferDescNode = document.querySelectorAll(".closer");

let OfferValue = 0;
let OfferLength = Offer.length;

for (OfferValue = 0; OfferValue < 8; OfferValue++) {
  Offer[OfferValue].style.display = "flex";
}

SearchInput.addEventListener("input", (e) => {
  Offer.forEach((eachoffer) => {
    eachoffer.style.display = "none";
  });

  const SearchOffer = e.target.value.toLowerCase();

  if (SearchInput.value.length > 0) {
  } else {
  }

  const EachOffer = [...Offer];

  const filteredOffer = EachOffer.filter((el) => {
    if (el.childNodes[1].innerHTML.toLowerCase().includes(SearchOffer)) {
      el.style.display = "flex";
      SearchInput.style.border = "2px solid green";
    } else {
      SearchInput.style.border = "2px solid orange";
    }
  });
});

$(".like-count").mouseenter(() => {
  $(".cursor").addClass("reduceCursor");
});

$(".like-count").mouseleave(() => {
  $(".cursor").removeClass("reduceCursor");
});

document.querySelector(".closed-create").addEventListener("click", () => {
  document.querySelector(".form-create-offer").style.display = "none";
  document.querySelector("body").style.overflowY = "auto";
});

const offersButtons = document.querySelectorAll(".offer-button");
let eachOfferButton = Array.from(offersButtons);

let closerOfferDesc = Array.from(closerOfferDescNode);

let ContainerOffersDesc = Array.from(
  document.querySelectorAll(".cont-offer-descripton")
);

let OffersDesc = Array.from(document.querySelectorAll(".offer-description"));

for (let button = 0; button < eachOfferButton.length; button++) {
  eachOfferButton[button].addEventListener("click", () => {
    ContainerOffersDesc[button].style.display = "flex";
  });
  closerOfferDesc[button].addEventListener("click", () => {
    ContainerOffersDesc[button].style.display = "none";
  });
}

document.getElementById("filters-offers").addEventListener("click", () => {
  document.getElementById("filters-offers").style.display = "none";
  document.getElementById("filter-list").style.display = "none";
});

window.addEventListener("scroll", () => {
  const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
  if (clientHeight + scrollTop >= scrollHeight - 50) {
    document.querySelector(".offer-loader").style.display = "block";
    showData();
  }

  function showData() {
    if (OfferValue == Offer.length) {
      document.querySelector(".offer-loader").style.display = "none";
    } else {
      let val = 0;
      for (val = 0; val < 4; val++) {
        Offer[OfferValue].style.display = "flex";
        OfferValue++;
      }
    }
  }
});

if (document.querySelector(".create-offer")) {
  document.querySelector(".create-offer").addEventListener("click", () => {
    document.querySelector("body").style.overflowY = "hidden";
    document.querySelector(".form-create-offer").style.display = "flex";
  });
}
