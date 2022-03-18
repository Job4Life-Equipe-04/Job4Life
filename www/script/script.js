const loading = document.querySelector(".loading");
const wipe = document.querySelector(".wipe-transition");
const allBandes = document.querySelectorAll(".bande");
const cursor = document.querySelector(".cursor");
const TLAnim = new TimelineMax();

window.addEventListener("load", () => {
  loading.classList.add("hidden");
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
      },
    },
  ],
});

document.addEventListener("mousemove", (e) => {
  cursor.style.left = e.pageX - 10 + "px";
  cursor.style.top = e.pageY - 10 + "px";
});

document.addEventListener("click", () => {
  cursor.classList.add("expand");
  setTimeout(() => {
    cursor.classList.remove("expand");
  }, 600);
});

document.addEventListener("visibilitychange", () => {
  if (document.visibilityState === "hidden") {
    document.title = "Come back! 😥";
  } else {
    document.title = "Job4Life - Agence de recherche de stages";
  }
});

$("a").mouseenter(function () {
  $(".cursor").addClass("reduceCursor");
});

$("a").mouseleave(function () {
  $(".cursor").removeClass("reduceCursor");
});
