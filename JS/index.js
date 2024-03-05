var body = document.getElementById("sidebar");

function geser() {
  body.classList.add("active");
}

function tutup() {
  body.classList.remove("active")
}
document.addEventListener("DOMContentLoaded", function () {
  new TypeIt("#animasi", {
    speed: 100,
    loop: true,
  })
   .delete(40)
    .type("REKAYASA PERANGKAT LUNAK")
    .delete(24)
    .type("RPL Boys")
    .delete(5)
    .type(" Girl")
    .delete(8)
    .type("SMK PGRI 3 MALANG")
    .pause(5000)
    .go();
});
