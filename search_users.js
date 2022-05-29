const nome = document.getElementById('nome');
const cognome = document.getElementById('cognome');
const form = document.querySelector('form');
const formspo = document.getElementById('fsp');

console.log(form);
form.addEventListener('submit', search);
formspo.addEventListener('submit',findartist);

function search(event){

  if(nome.value === ''){

    alert('Nome mancante!');
    event.preventDefault();


  }

  if(cognome.value === ''){

    alert('Cognome mancante!');
    event.preventDefault();


  }

  const form_data = {method: 'post', body: new FormData(form), header:{"Access-Control-Allow-Origin" : "http://localhost:*", 
  "Access-Control-Allow-Credentials" : true }}
  
  fetch('http://localhost/hmw1/search.php', form_data).then(onResponse).then(onJson);
  event.preventDefault();

}



function onResponse(response){

  console.log(response.status);
  return response.json();


}

function onJson(json){

  console.log(json);


  for(let i=0; i< 6; i++){

    if(json[i] !== "Nessun utente presente!"){

    if(!document.querySelector('div#view span')) {

    const nome = document.createElement('span');

    const cognome = document.createElement('span');
  
    const email = document.createElement('span');

    const spazio = document.createElement('span');

    nome.textContent= json[i].Nome;
    cognome.textContent= json[i].Cognome;
    email.textContent= json[i].mail;
    spazio.textContent= '-----';
   
    view.appendChild(nome);
    view.appendChild(cognome);
    view.appendChild(email);
    view.appendChild(spazio);

    }else{
      
     

      console.log(i);

      const nome = document.createElement('span');

      const cognome = document.createElement('span');
    
      const email = document.createElement('span');
  
      const spazio = document.createElement('span');
  
      nome.textContent= json[i].Nome;
      cognome.textContent= json[i].Cognome;
      email.textContent= json[i].mail;
      spazio.textContent= '-----';
     
      view.appendChild(nome);
      view.appendChild(cognome);
      view.appendChild(email);
      view.appendChild(spazio);

    }

  }else{


    const testo = document.createElement('span');
    testo.textContent= json[0];
    
    view.appendChild(testo);

  }


  }




  





}

function findartist(event){


  event.preventDefault();
  const form_dataf = {method: 'post', body: new FormData(formspo), header:{"Access-Control-Allow-Origin" : "http://localhost:*", 
  "Access-Control-Allow-Credentials" : true }}

  
  fetch('http://localhost/hmw1/search_artist.php', form_dataf).then(onResponsespo).then(onJsonspo);

  function onResponsespo(response){

      console.log(response);

      return response.json();

  }

  function onJsonspo(json){

   console.log(json);
   const library = document.querySelector('#spotify');
   library.innerHTML = '';
   const results = json.artists.items;
   let nris = results.length;
   if(nris > 3)

    console.log('Superati i 3 risultati');

     nris = 3;
  
   for(let i=0; i<nris; i++)
   {
     const artist_data = results[i]
     const title = artist_data.name;
     const image = artist_data.images[i].url;
     const follow = results[i].followers.total;
     const genere = results[i].genres[0];
  
     const artist = document.createElement('div');
     artist.classList.add('artist');
     const img = document.createElement('img');
     img.src = image;
     const nome = document.createElement('span');
     nome.textContent = title;

     const followers = document.createElement('span');
     followers.textContent = 'Followers: ' + follow;

     const gen = document.createElement('span');
     gen.textContent = 'Genere Musicale: ' + genere;

     artist.appendChild(img);
     artist.appendChild(nome);
     artist.appendChild(followers);
     artist.appendChild(gen);
     library.appendChild(artist);
   }
    


  }


}
