//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//upload animation
const fo = document.querySelector("form");
let fileInput = document.querySelector(".file-input");
let fileInputs = document.getElementById('file');
let progressArea = document.querySelector(".progress-area");
let uploadedArea = document.querySelector(".uploaded-area");
let innerDashboard = document.querySelector(".inner-dashboard");
let newElement = document.querySelector(".elements");
let newCenter = document.querySelector(".center");
let uploadBtn = document.querySelector(".cloud");
let filesBtn = document.querySelector(".file");
let settingBtn = document.querySelector(".setting");
let addBtn = document.querySelector(".add");
let openNav = document.querySelector('.fa-bars');
let closeNav = document.querySelector('.fa-close');
let uploadDiv = document.querySelector(".wrapper-div");
let uploadedDiv = document.querySelector(".uploaded-div");
let box = document.querySelectorAll(".box");
let boxe = document.querySelectorAll(".box2");
let addDiv = document.querySelector(".add-staff");
let settingDiv = document.querySelector(".setting-div");
let table = document.getElementById("table");
fo.addEventListener("click", () =>{
    fileInput.click();
});
uploadDiv.addEventListener("click", () =>{
    document.getElementById('alert').textContent = "Please login || create an account first";
});


//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//Switching Tabs
uploadBtn.onclick = () => {
    settingDiv.style.display="none";
    uploadDiv.style.display="block";
    uploadedDiv.style.display="none";
    addDiv.style.display="none";
    uploadBtn.style.borderLeft="2px solid var(--c2)";
    uploadBtn.style.background="var(--c4)";
    filesBtn.style.borderLeft="none";
    filesBtn.style.background="none";
    addBtn.style.borderLeft="none";
    addBtn.style.background="none";
    settingBtn.style.borderLeft="none";
    settingBtn.style.background="none";
    if (window.innerWidth <= 850) {
        newCenter.style.width="100%";
        innerDashboard.style.width="0%";
        newElement.style.width="100%";
        openNav.style.display="block";
        closeNav.style.display="none"; 
    }
}
filesBtn.onclick = () => {
    settingDiv.style.display="none";
    uploadedDiv.style.display="";
    uploadDiv.style.display="none";
    addDiv.style.display="none";
    filesBtn.style.borderLeft="2px solid var(--c2)";
    filesBtn.style.background="var(--c4)";
    addBtn.style.borderLeft="none";
    addBtn.style.background="none";
    settingBtn.style.borderLeft="none";
    settingBtn.style.background="none";
    uploadBtn.style.borderLeft="none";
    uploadBtn.style.background="none";
    if (window.innerWidth <= 850) {
        newCenter.style.width="100%";
        innerDashboard.style.width="0%";
        newElement.style.width="100%";
        openNav.style.display="block";
        closeNav.style.display="none"; 
    }
}
addBtn.onclick = () => {
    settingDiv.style.display="none";
    uploadedDiv.style.display="none";
    uploadDiv.style.display="none";
    addDiv.style.display="block";
    addBtn.style.borderLeft="2px solid var(--c2)";
    addBtn.style.background="var(--c4)";
    settingBtn.style.borderLeft="none";
    settingBtn.style.background="none";
    uploadBtn.style.borderLeft="none";
    uploadBtn.style.background="none";
    filesBtn.style.borderLeft="none";
    filesBtn.style.background="none";
    if (window.innerWidth <= 850) {
        newCenter.style.width="100%";
        innerDashboard.style.width="0%";
        newElement.style.width="100%";
        openNav.style.display="block";
        closeNav.style.display="none"; 
    }
}
settingBtn.onclick = () => {
    uploadedDiv.style.display="none";
    uploadDiv.style.display="none";
    settingDiv.style.display="block";
    addDiv.style.display="none";
    settingBtn.style.borderLeft="2px solid var(--c2)";
    settingBtn.style.background="var(--c4)";
    uploadBtn.style.borderLeft="none";
    uploadBtn.style.background="none";
    filesBtn.style.borderLeft="none";
    filesBtn.style.background="none";
    addBtn.style.borderLeft="none";
    addBtn.style.background="none";
    if (window.innerWidth <= 850) {
        newCenter.style.width="100%";
        innerDashboard.style.width="0%";
        newElement.style.width="100%";
        openNav.style.display="block";
        closeNav.style.display="none"; 
    }
}
//modal
//get modal box
var modal = document.getElementById('simpleModal');
var modal2 = document.getElementById('simpleModal2');
var modal3 = document.getElementById('simpleModal3');
//get modal button
var modalBtn = document.getElementById('modalBtn');
var modalBtn2 = document.getElementById('modalBtn2');
var modalBtn3 = document.getElementById('modalBtn3');
//get close button
var closeBtn = document.getElementsByClassName('closeBtn')[0];
var closeBtn2 = document.getElementsByClassName('closeBtn2')[0];
var closeBtn3 = document.getElementsByClassName('closeBtn3')[0];
//listen for open click
modalBtn.addEventListener('click', openModal);
modalBtn2.addEventListener('click', openModal2);
modalBtn3.addEventListener('click', openModal3);
//listen for close click
closeBtn.addEventListener('click', closeModal);
closeBtn2.addEventListener('click', closeModal2);
closeBtn3.addEventListener('click', closeModal3);
//listen for outside close click
// window.addEventListener('click', outsideClick);
// fuction to open modal

function openModal() {
    modal.style.display="block";
}
function openModal2() {
    modal2.style.display="block";
}
function openModal3() {
    modal3.style.display="block";
}
function closeModal() {
    modal.style.display="none";
}
function closeModal2() {
    modal2.style.display="none";
}
function closeModal3() {
    modal3.style.display="none";
}
window.onclick = function(e) {
    if (e.target == modal) {
    modal.style.display="none";
    modal2.style.display="none";
    modal3.style.display="none";
        
    }
}

openNav.onclick = () => {
       newCenter.style.width="0%";
       innerDashboard.style.width="100%";
       newElement.style.width="50%";
       openNav.style.display="none";
       closeNav.style.display="block";
    }
closeNav.onclick = () => {
    newCenter.style.width="100%";
    innerDashboard.style.width="0%";
    newElement.style.width="100%";
    openNav.style.display="block";
    closeNav.style.display="none";
}
