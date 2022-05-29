const bottone = document.querySelector('#bottone');
const contenitorepiatto = document.querySelector('#piatto');
const contenitorepiatto2 = document.querySelector('#piatto2');
bottone.addEventListener('click', generatore);
const bottone2 = document.querySelector('#bottone2');
bottone2.classList.add('hidden');
bottone2.addEventListener('click', generatore2);
let vett = [];
let variabile = false;
const interazione = document.querySelector('#interazione');
console.log(interazione);
interazione.classList.add('hidden');


function generatore(event){


    bottone.classList.add('hidden');

    rest_url ='http://localhost/hmw1/immagine_fetch.php';

    for(let i=0; i<10; i++){

      fetch(rest_url).then(onResponse).then(onJson1);

    }
    
    

}

function onResponse(response){

   
    return response.json();

}

function onJson1(json){


    const p = document.querySelector('#piatto');
    const contenitore = document.createElement('img');
    contenitore.src=json.image;
    contenitore.addEventListener('click',checkf);
    p.appendChild(contenitore);
    
    


    
 
 


}


function checkf(event){

  const image = event.currentTarget;
  const che = document.querySelectorAll('div#genp div#piatto img');
  console.log(che);



  for(let i=0; i<10 ; i++){

 
    if(variabile === false){

    image.classList.add('selezionato');
    bottone2.classList.remove('hidden');
    interazione.classList.remove('hidden');
    const bottone3 = document.querySelector('#bottone3');
    bottone3.addEventListener('click',invio);

  
    
   
    variabile = true;

    }




}

    
 
}



function generatore2(event){

  const pi = document.querySelectorAll('#piatto img');
  console.log(pi);
  const pi2 = document.querySelectorAll('#piatto2 img');
  console.log(pi2);



    if(pi[0] !== undefined){

      for (let i=0; i<10; i++){

        pi[i].parentNode.removeChild(pi[i]);

      }


    }else{


      for (let i=0; i<10; i++){

        pi2[i].parentNode.removeChild(pi2[i]);

      }

    }



  rest_url ='http://localhost/hmw1/immagine_fetch.php';

  for(let i=0; i<10; i++){

    fetch(rest_url).then(onResponse2).then(onJson2);

  }
  
}


function onResponse2(response){


 
  return response.json();

}

function onJson2(json){

  const p = document.querySelector('#piatto2');
  console.log('Punto che mi interessa'.p);
  const p1 = document.querySelector('#piatto');
  const contenitore2 = document.createElement('img');
  const contenitore3 = document.createElement('img');


  if(p!== undefined){

    contenitore2.src=json.image;
    p.appendChild(contenitore2);
    contenitore2.addEventListener('click',checkf2);
    variabile = true;


  }else {

    contenitore3.src=json.image;
    p1.appendChild(contenitore3);
    contenitore3.addEventListener('click',checkf);
    variabile = false;


  }

  
}

function checkf2(event){


  const image = event.currentTarget;
  const che = document.querySelectorAll('div#genp div#piatto img');


  for(let i=0; i<10 ; i++){

 
    if(variabile === true){

    image.classList.add('selezionato');
    bottone2.classList.remove('hidden');
    
 
    variabile = false;

    }




}
}

function invio(event){

  const immagine = document.querySelector('img.selezionato');
  const titolo = document.getElementById('titolo');
  console.log(titolo.value);
  const post = document.getElementById('tx');
  console.log(post.value);

  console.log(immagine);

  const form_data = {method: 'post', body: new FormData()}

  form_data.body.append("titolo", titolo.value);
  form_data.body.append("post", post.value);
  form_data.body.append("immagine", immagine.src);

  /*fetch("like_comm_inc.php?val=0"+"&idpost="+contenuto.id_post+"&iduser="+contenuto.id_user); */
  
  fetch('http://localhost/hmw1/inserimento_post.php', form_data).then(onResponse3).then(onJson3);

 

}

function onResponse3(response){

  console.log(response);
  return response.json();



}

function onJson3(json){


  const genp = document.getElementById('genp');
  genp.classList.add('hidden');
  window.location.href = 'http://localhost/hmw1/posts.php';



}


