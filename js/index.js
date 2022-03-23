function regform(){
  document.getElementsByTagName('article')[0].setAttribute('style','padding:1%;background-color:rgba(0,0,0,0.7);display:blocks');
  document.getElementsByTagName('aside')[0].setAttribute('style','display:none');
  document.getElementById("Trump").setAttribute('style','display:none');
  document.getElementById("corea").setAttribute('style','display:block');
  document.getElementById('corpoUSA').setAttribute('id','corpoNC');
}

function logform(){
  document.getElementsByTagName('article')[0].setAttribute('style','padding:1%;background-color:rgba(0,0,0,0.7);display:none');
  document.getElementsByTagName('aside')[0].setAttribute('style','padding:1%;background-color:rgba(0,0,0,0.7);display:block');
  document.getElementById("Trump").setAttribute('style','display:flex');
  document.getElementById("corea").setAttribute('style','display:none');
  document.getElementById('corpoNC').setAttribute('id','corpoUSA');
}
