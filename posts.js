const post = document.querySelector('#post');

fetch('http://localhost/hmw1/mostra_testo.php').then(onResponse).then(onJson);


function onResponse(response){


    return response.json();

}



function onJson(json){


    for(let i=0; i< json.length; i++){

        const data = {method: 'post', body: new FormData()}
        data.body.append("id", json[i].id);
        const contenitore = document.createElement('div');
        contenitore.setAttribute('id', json[i].idpost);
        const nomeut = document.createElement('span');
        fetch('http://localhost/hmw1/ricerca_utente.php', data).then(onResponse1).then(onJson1);
        const titolo = document.createElement('span');
        const foto = document.createElement('img');
        const descrizione = document.createElement('span');

        titolo.textContent = json[i].content.titolo;
        foto.src = json[i].content.immagine;
        descrizione.textContent = json[i].content.post;
         
        contenitore.appendChild(titolo);
        contenitore.appendChild(foto);
        contenitore.appendChild(descrizione);
        post.appendChild(contenitore);

      
 
       

    }

    fetch('http://localhost/hmw1/check_like.php').then(onResponseCheck).then(onJsonCheck);


}

function onResponseCheck(response){

    return response.json();


}

function onJsonCheck(json){

    console.log(json);

    for(let k=0; k < json.length; k++){/*2 indici del json*/
    for(let i=0; i< json[k].idpostutti ; i++){ /*tot post che conto passati nel json */

    if(json[k].messaggio === "Presente!"){

        console.log(json);
        const img = document.createElement('img');
        img.setAttribute('class','cuore');
        img.src = 'like.png';
        let id = json[k].id.toString(); // id post
        const imm = document.getElementById(id);
        console.log(imm);
        s = imm.querySelector('img.cuore');
        s.remove();
        s.classList.remove('selezionelike');
        console.log(imm);
        img.classList.add('selezionelike');
        imm.appendChild(img);


    }
}

}


}

function onResponse1(response){

    return response.json();


}

let z=0;

function onJson1(json){

    const username = document.createElement('span');
    const img = document.createElement('img');
    img.setAttribute('class','cuore');
    img.src = 'nolike.png';
    const imm = document.querySelectorAll('div#post div');

    username.textContent = 'Post di: '+ json.Username;

    imm[z].appendChild(username);
    imm[z].appendChild(img);
    imm[z].addEventListener('click', liker);
    


    z++;


}

function liker(event){



    c = event.currentTarget;

    imm = c.querySelector('div#post div img.cuore');


    if(imm.classList.contains('selezionelike')){

        imm.src = 'nolike.png';
        imm.classList.remove('selezionelike');

        console.log(event.currentTarget.id);

        const id = {method: 'post', body: new FormData()}
        id.body.append("id", event.currentTarget.id);
        
        fetch('http://localhost/hmw1/unlike_post.php', id);
        fetch('http://localhost/hmw1/nlikes.php', id).then(onResponseLike).then(onJsonLike);


    }else{

        console.log(imm);

        imm.src = 'like.png'; 
    
        imm.classList.add('selezionelike');

        console.log(event.currentTarget.id);

        const id = {method: 'post', body: new FormData()}
        id.body.append("id", event.currentTarget.id);

        fetch('http://localhost/hmw1/like_post.php', id);
        fetch('http://localhost/hmw1/nlikes.php', id).then(onResponseLike).then(onJsonLike);    

    
        console.log('Messo like!');

    }




}



function onResponseLike(response){

    console.log(response);
    return response.json();


}


function onJsonLike(json){ /*torna come risposta il numero di like dell'id del post */

    const divi = document.querySelectorAll('div#post div'); /*torna i 4post */

    

    for (let i = 0; i < divi.length; i++) {
        
        if(divi[i].id === json[0].idpost){ /*se l'id del post coincide con quello che ho cliccato e che ha fatto la fetch allora */

        console.log(divi[i]);

        if(!divi[i].querySelector('span.scrittalike')){

            if(divi[i].querySelector('img.cuore.selezionelike')){

                const nlike = document.createElement('span');
                
            
                    console.log(json);
        
                    nlike.setAttribute('class','scrittalike');
                
                    nlike.textContent = 'Numero di likes: '+ json[0].nlike.nlikes;
                
                    divi[i].appendChild(nlike);

            }else {

                const nlike = document.createElement('span');

                nlike.setAttribute('class','scrittalike');
                
                nlike.textContent = 'Numero di likes: '+ json[0].nlike.nlikes;

                sc = document.querySelector('span.scrittalike');

                if(sc){

                    divi[i].replaceChildren(nlike);
                    
                }else {

                    divi[i].appendChild(nlike);

                }
            
              

            }

        }else{

        if(!divi[i].querySelector('img.cuore.selezionelike')){

            const nlike = document.createElement('span');      

            nlike.textContent = 'Numero di likes: '+ json[0].nlike.nlikes;
                
            sc = document.querySelector('span.scrittalike');
            if(sc){

                sc.replaceChildren(nlike);
                
            }else {

                divi[i].appendChild(nlike);

            }
        

        }else{

         const t=  divi[i].querySelector('span.scrittalike');
     
         const nlike = document.createElement('span');


         console.log(t);
         nlike.textContent = 'Numero di likes: '+ json[0].nlike.nlikes;

         sc = document.querySelector('span.scrittalike');

         if(sc){

            divi[i].querySelector('span.scrittalike').replaceChildren(nlike);
             
         }else {

             divi[i].appendChild(nlike);

         }
                



        }
    }


        }




      }


}