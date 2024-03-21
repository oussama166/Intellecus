var ClickHOne = document.querySelector(".right-layer");
const Stat = document.querySelector(".start");

ClickHOne.addEventListener("click", () => {
  Stat.style.animationFillMode = "forwards";
  Stat.style.animationName = "Start";
  setTimeout(() => {
    window.location.href = "../proc/prog.php";
  }, 2000);
});
