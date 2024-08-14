let msgF = document.querySelector(".validation-msgF");
let msgT = document.querySelector(".validation-msgT");
if (msgF.innerHTML || msgT.innerHTML) {
  msgF.style.display = "inline-block";
  msgT.style.display = "inline-block";

  setTimeout(() => {
    msgF.style.display = "none";
    msgT.style.display = "none";
  }, 3000);
}
else{
  msgF.style.display = "none";
  msgT.style.display = "none";
}
