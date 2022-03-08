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

$("a, h2, p").on("mouseover", () => {
  $(".cursor").css({ transform: "scale(20)" });
});

$("a, h2, p").on("mouseleave", () => {
  $(".cursor").css({ transform: "scale(1)" });
});







let persons = [
  { name: 'Dlaniel', age: 50 },
  { name: 'Amir', age: 47 },
  { name: 'Phil', age: 24 },
  { name: 'Mari', age: 20 },
  { name: 'dlame', age: 50 },
  { name: 'dam', age: 50 }
];

const searchInput = document.getElementById('recherche');

searchInput.addEventListener('keyup', () => {
  const input = searchInput.value;
  const result =  persons.filter(item => item.name.toLocaleLowerCase().includes(input.toLocaleLowerCase()));
  let suggestion = '';
  
  result.forEach(resultItem => suggestion += `<div class="suggestion">${(resultItem.name)}</div>`
      )
      document.getElementById('test').innerHTML = suggestion;
});

