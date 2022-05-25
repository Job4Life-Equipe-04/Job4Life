const assets = [
  "./",
  "./index.php",
  "./creation.php",
  "./contact.php",
  "./companies.php",
  "./students.php",
  "./manifest.json",
  "./style/index.css",
  "./back-end/error404/error404.html",
  "/back-end/error404/style/error.css",
  "/back-end/http-errors/http-login.php",
  "/back-end/server/mail/src/Exception.php",
  "/assets/images/bin.png",
  "/assets/images/facebook-logo.svg",
  "/assets/images/favicon.ico",
  "/assets/images/icon-192.png",
  "/assets/images/icon-512.png",
  "/assets/images/job4life.png",
  "/assets/images/linkedin-logo.svg",
  "/assets/images/login.jpg",
  "/assets/images/loupe.svg",
  "/assets/fonts/brandon-grotesque-light-58a8a4b38001d-webfont.woff2",
  "/assets/fonts/D-DIN-Bold.woff2",
  "/script/jquery-3.6.0.min.js",
  "/script/script.js",
  "/script/pages/index.js",
  "/script/pages/companies.js",
];

self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open("static").then((cache) => {
      return cache.addAll(assets);
    })
  );
});

self.addEventListener("fetch", function (event) {
  event.respondWith(
    caches.match(event.request).then((response) => {
      return response || fetch(event.request);
    })
  );
});
