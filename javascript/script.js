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
let newPassword = document.querySelector(".change-password");
let openNav = document.querySelector('.fa-bars');
let closeNav = document.querySelector('.fa-close');
let uploadBtn = document.querySelector(".cloud");
let filesBtn = document.querySelector(".file");
let helpBtn = document.querySelector(".help");
let settingBtn = document.querySelector(".setting");
let messageBtn = document.querySelector(".message");
let uploadDiv = document.querySelector(".wrapper-div");
let uploadedDiv = document.querySelector(".uploaded-div");
let box = document.querySelectorAll(".box");
let boxe = document.querySelectorAll(".box2");
let helpDiv = document.querySelector(".help-div");
let helpDiv2 = document.querySelector(".help-div2");
let settingDiv = document.querySelector(".setting-div");
let table = document.getElementById("table");


fo.addEventListener("click", () =>{
    fileInput.click();
});
uploadDiv.addEventListener("click", () =>{
    document.getElementById('alert').textContent = "Please login || create an account first";
    document.getElementById('alert').style.top="10%";
});

fileInput.onchange = ({target}) =>{
        let file = target.files[0];//getting file and [0] this means is user has selected multiple files then get first one only
        if (file) {//is selected
            let fileName = file.name;//getting selected file name
            if (fileName.length >= 12) {// if filename is greater than or eqaul to 12 split the name and add ...
                let splitName = fileName.split('.');
                // fileName = splitName[0].substring(0, 12) + "... ." + splitName[1];
            }
            uploadFile(fileName);//calling uploadFile with fileName as an argument
        }
}

function uploadFile(name) {
    let xhr = new XMLHttpRequest();//creating new xml obj (AJAX)
    xhr.open("POST", "../html/uploads.php");//sending post request to a specified url/file
    xhr.upload.addEventListener("progress", ({loaded, total}) =>{
        let fileLoaded = Math.floor((loaded / total) * 100);//getting percentage of loaded file size
        let fileTotal = Math.floor(total / 1000);//getting file size in kb from bytes
        let fileSize;
        //if file size is less than 1024 than add only kb else covert size from kb into mb
        (fileTotal < 1024) ? fileSize = fileTotal + "kb" : fileSize = (loaded / (1024 * 1024)).toFixed(2) + "mb";
        let progressHTML = `<li class="row">
                <i class="fas fa-file-alt"></i>
                <div class="content">
                <div class="details">
                    <span class="name">${name} . uploading</span>
                    <span class="percent">${fileLoaded}%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress" style=" width: ${fileLoaded}%; height: 100%;background: #6990f2;border-radius: inherit; "></div>
                </div>
                </div>
            </li>`;
            uploadedArea.innerHTML = "";//remove if you want upload history
            progressArea.innerHTML = progressHTML;
            if (loaded == total) {
                progressArea.innerHTML = "";
        let uploadedHTML = ` <li class="row">
                <div class="content">
                <i class="fas fa-file-alt"></i>
                <div class="details">
                    <span class="name">${name} . uploaded</span>
                    <span class="size">${fileSize}</span>
                </div>
                </div>
                <i class="fas fa-check"></i>
            </li>`;
            uploadedArea.innerHTML = uploadedHTML;//remove if you want upload history
            // uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML)//add this if you want scoll history
            
            let addRow =`<tr class="table-datas">
            <td><?php echo $user_id ?></td>
            <td>${name}</td>
            <td>${fileSize}</td>
            <td><?php echo $fileType ?></td>
            <td><a href="" class="a">Download</a></td>
        </tr>`;
       // table.insertAdjacentHTML("afterend", addRow);
        }
    });
    let formData = new FormData(fo);//FormData is an object used to easily send form
    xhr.send(formData);//sending form data to php
    alert(JSON.parse(xhr.responseText));
    table.load();
}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//Switching Tabs
uploadBtn.onclick = () => {
    settingDiv.style.display="none";
    uploadDiv.style.display="block";
    uploadedDiv.style.display="none";
    helpDiv.style.display="none";
    helpDiv2.style.display="none";
    uploadBtn.style.borderLeft="2px solid var(--c2)";
    uploadBtn.style.background="var(--c4)";
    filesBtn.style.borderLeft="none";
    filesBtn.style.background="none";
    helpBtn.style.borderLeft="none";
    helpBtn.style.background="none";
    settingBtn.style.borderLeft="none";
    settingBtn.style.background="none";
    if (window.innerWidth <= 850) {
        newCenter.style.width="100%";
        innerDashboard.style.width="0%";
        newElement.style.width="100%";
        newPassword.style.display="block";
        openNav.style.display="block";
        closeNav.style.display="none"; 
    }
}
filesBtn.onclick = () => {
    settingDiv.style.display="none";
    uploadedDiv.style.display="";
    uploadDiv.style.display="none";
    helpDiv.style.display="none";
    helpDiv2.style.display="none";
    filesBtn.style.borderLeft="2px solid var(--c2)";
    filesBtn.style.background="var(--c4)";
    helpBtn.style.borderLeft="none";
    helpBtn.style.background="none";
    settingBtn.style.borderLeft="none";
    settingBtn.style.background="none";
    uploadBtn.style.borderLeft="none";
    uploadBtn.style.background="none";
    if (window.innerWidth <= 850) {
        newCenter.style.width="100%";
        innerDashboard.style.width="0%";
        newElement.style.width="100%";
        newPassword.style.display="block";
        openNav.style.display="block";
        closeNav.style.display="none"; 
    }
}
helpBtn.onclick = () => {
    settingDiv.style.display="none";
    uploadedDiv.style.display="none";
    uploadDiv.style.display="none";
    helpDiv.style.display="block";
    helpDiv2.style.display="none";
    helpBtn.style.borderLeft="2px solid var(--c2)";
    helpBtn.style.background="var(--c4)";
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
        newPassword.style.display="block";
        openNav.style.display="block";
        closeNav.style.display="none"; 
    }
}
settingBtn.onclick = () => {
    uploadedDiv.style.display="none";
    uploadDiv.style.display="none";
    helpDiv.style.display="none";
    settingDiv.style.display="flex";
    helpDiv2.style.display="none";
    newCenter.style.width="100%";
    settingBtn.style.borderLeft="2px solid var(--c2)";
    settingBtn.style.background="var(--c4)";
    uploadBtn.style.borderLeft="none";
    uploadBtn.style.background="none";
    filesBtn.style.borderLeft="none";
    filesBtn.style.background="none";
    helpBtn.style.borderLeft="none";
    helpBtn.style.background="none";
    if (window.innerWidth <= 850) {
        newCenter.style.width="100%";
        innerDashboard.style.width="0%";
        newElement.style.width="100%";
        newPassword.style.display="block";
        openNav.style.display="block";
        closeNav.style.display="none"; 
    }
    
}
messageBtn.onclick = () => {
    uploadedDiv.style.display="none";
    uploadDiv.style.display="none";
    helpDiv.style.display="none";
    settingDiv.style.display="none";
    helpDiv2.style.display="block";
    if (window.innerWidth <= 850) {
        newCenter.style.width="100%";
        innerDashboard.style.width="0%";
        newElement.style.width="100%";
        newPassword.style.display="block";
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
       newPassword.style.display="none";
       openNav.style.display="none";
       closeNav.style.display="block";
    }
closeNav.onclick = () => {
    newCenter.style.width="100%";
    innerDashboard.style.width="0%";
    newElement.style.width="100%";
    newPassword.style.display="block";
    openNav.style.display="block";
    closeNav.style.display="none";
}

uploadedDiv.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (uploadedDiv.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}