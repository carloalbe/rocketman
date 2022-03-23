function open(){
  document.body.removeChild(document.getElementById('facetoface'));
  document.getElementsByTagName('nav')[0].setAttribute('style','display:flex');
  var song=document.createElement('audio');
  document.body.appendChild(song);
  song.src='materiale/usaNAtionalAnthem.mp3';
  song.setAttribute('autoplay','true');
  home();
}

function home(){
  document.getElementsByTagName('article')[0].setAttribute('style','display:none');
  document.getElementById('Trump').setAttribute('style','display:flex');
  document.getElementById('corea').setAttribute('style','display:flex');
  document.getElementById('ID').setAttribute('style','display:none');
  document.getElementById('history').setAttribute('style','display:none');
  document.getElementById('IDphoto').removeAttribute('src');
  document.getElementById('infoTrump').setAttribute('style','display:none');
  document.getElementById('infoKim').setAttribute('style','display:none');
  document.getElementById('corpoNC').setAttribute('id','corpoUSA');
  document.getElementById('infoPlayer').setAttribute('style','display:none');
  document.getElementById('classifica').setAttribute('style','display:none');
  document.getElementById('classific').setAttribute('style','display:none');
    }



function trump(){

  document.getElementsByTagName('article')[0].setAttribute('style','display:flex');
  document.getElementById('Trump').setAttribute('style','display:none');
  document.getElementById('corea').setAttribute('style','display:none');
  document.getElementById('ID').setAttribute('style','display:flex');
  document.getElementById('IDphoto').src='materiale/TrumpID.jpg';
  document.getElementById('history').setAttribute('style','display:flex');
  document.getElementById('infoPlayer').setAttribute('style','display:none');
  document.getElementById('infoKim').setAttribute('style','display:none');
  document.getElementById('infoTrump').setAttribute('style','display:flex');
  document.getElementById('trumpStory').setAttribute('style','display:block');
  document.getElementById('kimStory').setAttribute('style','display:none');
  document.getElementById('playerStory').setAttribute('style','display:none');
  document.getElementById('classifica').setAttribute('style','display:none');
  document.getElementById('classific').setAttribute('style','display:none');
  document.getElementById('corpoNC').setAttribute('id','corpoUSA');
}


function kim(){
    document.getElementById('corpoUSA').setAttribute('id','corpoNC');
  document.getElementsByTagName('article')[0].setAttribute('style','display:flex');
  document.getElementById('Trump').setAttribute('style','display:none');
  document.getElementById('corea').setAttribute('style','display:none');
  document.getElementById('ID').setAttribute('style','display:flex');
  document.getElementById('IDphoto').src='materiale/KimID.jpg';
  document.getElementById('history').setAttribute('style','display:flex');
  document.getElementById('infoPlayer').setAttribute('style','display:none');
  document.getElementById('infoKim').setAttribute('style','display:flex');
  document.getElementById('infoTrump').setAttribute('style','display:none');
  document.getElementById('trumpStory').setAttribute('style','display:none');
  document.getElementById('kimStory').setAttribute('style','display:block');
  document.getElementById('playerStory').setAttribute('style','display:none');
  document.getElementById('classifica').setAttribute('style','display:none');
  document.getElementById('classific').setAttribute('style','display:none');
}

function classifica(){
  document.getElementsByTagName('article')[0].setAttribute('style','display:flex');
  document.getElementById('Trump').setAttribute('style','display:none');
  document.getElementById('corea').setAttribute('style','display:none');
  document.getElementById('ID').setAttribute('style','display:flex');
  document.getElementById('IDphoto').src='materiale/noProfile.jpg';
  document.getElementById('history').setAttribute('style','display:none');
  document.getElementById('infoPlayer').setAttribute('style','display:flex');
  document.getElementById('infoKim').setAttribute('style','display:none');
  document.getElementById('infoTrump').setAttribute('style','display:none');
  document.getElementById('trumpStory').setAttribute('style','display:none');
  document.getElementById('kimStory').setAttribute('style','display:none');
  document.getElementById('playerStory').setAttribute('style','display:none');
  document.getElementById('classifica').setAttribute('style','display:flex');
  document.getElementById('classific').setAttribute('style','display:flex');
  document.getElementById('corpoNC').setAttribute('id','corpoUSA');
}

function player(){
  document.getElementsByTagName('article')[0].setAttribute('style','display:flex');
  document.getElementById('Trump').setAttribute('style','display:none');
  document.getElementById('corea').setAttribute('style','display:none');
  document.getElementById('ID').setAttribute('style','display:flex');
  document.getElementById('IDphoto').src='materiale/noProfile.jpg';
  document.getElementById('history').setAttribute('style','display:flex');
  document.getElementById('infoPlayer').setAttribute('style','display:flex');
  document.getElementById('infoKim').setAttribute('style','display:none');
  document.getElementById('infoTrump').setAttribute('style','display:none');
  document.getElementById('trumpStory').setAttribute('style','display:none');
  document.getElementById('kimStory').setAttribute('style','display:none');
  document.getElementById('playerStory').setAttribute('style','display:block');
  document.getElementById('classifica').setAttribute('style','display:none');
  document.getElementById('classific').setAttribute('style','display:none');
  document.getElementById('corpoNC').setAttribute('id','corpoUSA');
}

function onTrump(){

    document.getElementById('presidentTalk').removeAttribute('muted')
    document.getElementById('presidentTalk').play();
    docuemnt.getElementById('trump').style.height='55%';
    document.getElementById('trump').style.left='1%'

}
function outTrump(){
    document.getElementById('presidentTalk').pause();
    document.getElementById('trump').style.height='50%';
    document.getElementById(('trump')).style.left='3%'
}


function onKim(){
document.getElementById('soldiers').setAttribute('style','display:flex');

}

function outKim(){
  document.getElementById('soldiers').setAttribute('style','display:none');
}
