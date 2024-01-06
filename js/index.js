const plus = document.querySelectorAll(".control.add");
const minus = document.querySelectorAll(".control.take");
const close = document.querySelectorAll(".control.close");
const sort = document.querySelectorAll(".sort");
const bckgr = document.getElementById("bckgr_image");

plus.forEach((el) => {
  el.addEventListener("click", (e) => {
    const id = +e.target.id.slice(3);
    window.location.href = `../views/main.php?i=edit&id=${id}&action=add`;
  });
});

minus.forEach((el) => {
  el.addEventListener("click", (e) => {
    const id = +e.target.id.slice(4);
    window.location.href = `../views/main.php?i=edit&id=${id}&action=take`;
  });
});

close.forEach((el) => {
  el.addEventListener("click", (e) => {
    const id = +e.target.id.slice(5);
    window.location.href = `../views/main.php?i=delete&id=${id}`;
  });
});

sort.forEach((el) => {
  el.addEventListener("click", (e) => {
    const sortBy = e.target.id;
    window.location.href = `../logic/sort.php?sortBy=${sortBy}`;
  });
});

if (bckgr) {
  const rnd = Math.floor(Math.random() * 3 + 1);
  bckgr.style.backgroundImage = `url('../assets/${rnd}.png')`;
}

const msg = document.querySelector("[data-removable]");

if (msg) {
  setTimeout((_) => {
    msg.remove();
  }, parseInt(msg.dataset.removeAfter) * 2000);
}
