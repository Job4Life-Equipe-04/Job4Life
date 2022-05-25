const allBandes = document.querySelectorAll(".band");
const Cursor = document.querySelector(".cursor");
const CompaniesSearch = document.getElementById("companies-search");
const AccountButton = document.getElementById("account-button");
const AccountMenu = document.querySelector(".space");
const closedMenu = document.querySelector(".closed");
const ColorMode = document.getElementById("color-site");
const Navbar = document.querySelector("nav");
const Navspan = document.querySelector(".nav-span");
const TLAnim = new TimelineMax();
const nav = gsap.timeline();

window.addEventListener("load", () => {
  $(".loading").fadeOut("slow");
});

function delay(n) {
  return new Promise((done) => {
    setTimeout(() => {
      done();
    }, n);
  });
}

barba.init({
  sync: true,
  transitions: [
    {
      async leave() {
        const done = this.async();
        TLAnim.to(allBandes, { height: "100%", stagger: 0.05 });
        await delay(1000);
        done();
      },
      enter() {
        TLAnim.to(allBandes, { height: "0%", stagger: 0.05 });
        document.querySelector("video").play();
      },
    },
  ],
});

document.addEventListener("mousemove", (e) => {
  Cursor.style.left = e.clientX - 10 + "px";
  Cursor.style.top = e.clientY - 10 + "px";
});

document.addEventListener("click", () => {
  Cursor.classList.add("expand");
  setTimeout(() => {
    Cursor.classList.remove("expand");
  }, 600);
});

nav.from("nav ul li", 2, {
  opacity: 0,
  y: 100,
  ease: "Bounce.easeOut",
  delay: 1,
  skewY: 9,
  stagger: {
    amount: 0.3,
  },
});

var lastScrollTop = 0;

window.addEventListener("scroll", () => {
  const { scrollTop } = document.documentElement;

  console.log(lastScrollTop);
  console.log(scrollTop);
  console.log(window.scrollY);

  if (scrollTop > lastScrollTop) {
    Navbar.classList.remove("scrollOrigin");
    Navbar.classList.remove("scrollTop");
    Navbar.classList.add("scrollDown");
  } else if (!(scrollTop > lastScrollTop)) {
    Navbar.classList.remove("scrollOrigin");
    Navbar.classList.remove("scrollDown");
    Navbar.classList.add("scrollTop");
  }
  if (window.scrollY === 0) {
    Navbar.classList.add("scrollOrigin");
    Navbar.classList.remove("scrollTop");
    Navbar.classList.remove("scrollDown");
  }
  lastScrollTop = scrollTop;


});

ColorMode.addEventListener("click", () => {
  ColorMode.classList.toggle("active");
  document.querySelector("body").classList.toggle("active");
  let InternshipOffer = document.querySelectorAll(".offer");
  for (let offer of InternshipOffer) {
    offer.classList.toggle("active");
  }
  document.querySelector(".search").classList.toggle("active");
  document.getElementById("scroll").classList.toggle("active");
  document.getElementById("icon-person").classList.toggle("darkIcon");
  let footerimg = document.querySelectorAll(".footer-img");
  for (let img of footerimg) {
    img.classList.toggle("footer-filter");
  }
});

const Boxe = document.querySelector(".box");

if (Boxe) {
  Boxe.addEventListener("click", (e) => {
    e.target.classList.toggle("boxeActive");
    document.querySelector("nav ul").classList.toggle("opennav");
  });
}

document.addEventListener("visibilitychange", () => {
  if (document.visibilityState === "hidden") {
    document.title = "Come back! 😥";
  } else {
    document.title = "Job4Life · Internships research agency";
  }
});

AccountButton.addEventListener("click", () => {
  if (Navspan.innerHTML == "Sign in") {
    $(".space").fadeIn("fast");
    $(".cont-space").fadeIn("fast");
    AccountMenu.style.display = "flex";
    document.querySelector("body").style.overflowY = "hidden";
  } else {
    document.querySelector(".login-menu").style.display = "flex";
  }
});

closedMenu.addEventListener("click", () => {
  $(".cont-space").fadeOut("fast");
  $(".space").fadeOut("fast");
  document.querySelector("body").style.overflowY = "auto";
});

$("a, button, .closed, #account-button").mouseenter(() => {
  $(".cursor").addClass("reduceCursor");
});

$("a, button, .closed, #account-button").mouseleave(() => {
  $(".cursor").removeClass("reduceCursor");
});

$("a").click(() => {
  AccountMenu.style.display = "none";
  $(".cont-space").fadeOut("slow");
});

if ("serviceWorker" in navigator) {
  window.addEventListener("load", () => {
    navigator.serviceWorker.register("../ServiceWorker.js").then(
      (registration) => {
        console.log(
          "ServiceWorker registration successful with scope: ",
          registration.scope
        );
      },
      (error) => {
        console.log("ServiceWorker registration failed: ", error);
      }
    );
  });
}

document.querySelector(".create-offer").addEventListener("click", () => {
  document.querySelector(".create-offer-cont").style.display = "flex";
});
