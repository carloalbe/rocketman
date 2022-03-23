var lettera=0;
function loadpage(){
  window.setTimeout('Kimprofile()',1000);
  window.setTimeout('Trumpprofile()',5000);
  window.setTimeout('vs()',9000);
  window.setTimeout('open()',16000);
  var header=document.createElement('h1');
  header.setAttribute('style','color:white;font-size:30px;')
  document.getElementById('facetoface').appendChild(header);
  window.setInterval('title()',300);

}


function title(){
  if(lettera<10){
    document.getElementsByTagName('span')[lettera].setAttribute('style','color:white');
    lettera++;
  }
}

function Kimprofile(){
 var Kp = document.createElement('img');
 document.getElementById('facetoface').appendChild(Kp);
 Kp.setAttribute('style','position:fixed');
 Kp.style.left='0%';
 Kp.style.bottom='0%';
 Kp.style.height='70%';
 Kp.src='materiale/KimProfile.png';
}
function Trumpprofile(){
 var Tp = document.createElement('img');
 document.getElementById('facetoface').appendChild(Tp);
 Tp.setAttribute('style','position:fixed;right:0%;bottom:0%;height:70%;');
 Tp.src='materiale/TrumpProfile.png';

}
function vs(){
  var vs=document.createElement('img');
  document.getElementById('facetoface').appendChild(vs);
  vs.setAttribute('style','position:fixed');
  vs.style.left='40%';
  vs.style.bottom='20%';
  vs.style.width='20%'
  vs.src='materiale/vs.jpg';
}
