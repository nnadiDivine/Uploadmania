let navEl = document.getElementById('nav-el');
let barsEl = document.getElementById('bars-el');
let fileChosen = document.getElementById('file-chosen');
let uploadInput = document.getElementById('upload-input');
let loginEl = document.getElementById('login-el');
let regEl = document.getElementById('reg-el');
let logEl = document.getElementById('log-el');
let alerts = document.getElementById('alert');


// console.log(loginEl);

let c = 0;
barsEl.onclick = () => {
    c++;
    barsEl.classList.toggle('fa-times');
    if (c % 2 != 0) {
        navEl.style.transform="translateX(-80px)";
    } else {
        navEl.style.transform="translateX(5px)";
    }
}

uploadInput.addEventListener('change', function(){
    fileChosen.textContent = this.files[0].name
  })

  function switche() {
      regEl.style.display="flex";
      logEl.style.display="none";
  }
  function switche2() {
    logEl.style.display="flex";
    regEl.style.display="none";
}
console.log("yo");