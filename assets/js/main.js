function main() {
  document.addEventListener("DOMContentLoaded", updateTime);
  setInterval(updateTime, 1000);
}

function updateTime() {
  let timeElement = document.getElementById("time");
  const now = new Date();
  let hours = now.getHours();
  let minutes = now.getMinutes();
  let seconds = now.getSeconds();
  const ampm = hours >= 12 ? "PM" : "AM";
  hours = hours % 12;
  hours = hours ? hours : 12;
  minutes = String(minutes).padStart(2, "0");
  seconds = String(seconds).padStart(2, "0");
  timeElement.textContent = `${hours}:${minutes}:${seconds} ${ampm}`;
}

main();
