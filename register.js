const nome = document.getElementById('nome');
const cognome = document.getElementById('cognome');
const email = document.getElementById('email');
const pw = document.getElementById('pw');
const form = document.getElementById('form');
const body = document.querySelector('body');
const maschio = document.getElementById('m');
const femmina = document.getElementById('f');
const username = document.getElementById('username');
const title = document.querySelector('h1');
const merror = document.getElementById('errore');
const warninge = document.getElementById('warninge');
const divnom = document.getElementById('divnom');
const divrad = document.getElementById('divrad');
const divcognom = document.getElementById('divcogn');
const warningu = document.getElementById('warningu');

merror.classList.add('hidden');
email.addEventListener('blur', mailf);
username.addEventListener('blur', userf);

const a = document.querySelector('a');
a.classList.add('hidden');

if(form !== null){

    form.addEventListener('submit', val);
    

}else if(form == null){

    title.classList.add('hidden');
    a.classList.remove('hidden');

}
  
const n = document.createElement('span');
const c = document.createElement('span');
const cpicc = document.createElement('span');
const picc = document.createElement('span');
const e = document.createElement('span');
const elung = document.createElement('span');
const ef = document.createElement('span');
const ejs = document.createElement('span');
const u = document.createElement('span');
const ue = document.createElement('span');
const us = document.createElement('span');


function val(event){

    var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
   
    let messages = [];
    let err=[];


if(n.value == null || picc.value == null){

    if(nome.value == '' || nome.value == null){

        event.preventDefault();
        n.textContent='Nome richiesto!'
        divnom.appendChild(n);
        console.log('Nome richiesto!');
        err.push('errore nome');
        

    }

    if(nome.value.length < 3 && nome.value !== ''){

            event.preventDefault();
            n.textContent='';         
            picc.textContent='Nome troppo piccolo!'
            divnom.appendChild(picc);
            err.push('errore nome picc');
            
    
    } 

 

}

if(c.value == null || cpicc.value == null){ 

    
    if(cognome.value == '' || cognome.value == null){

        event.preventDefault();
        c.textContent='Cognome richiesto!'
        divcognom.appendChild(c);
        console.log('Cognome richiesto!');
        err.push('errore cognome');
        

    }

    if(cognome.value.length < 3 && cognome.value !== ''){

        event.preventDefault();
        c.textContent='';
        cpicc.textContent='Cognome troppo piccolo!'
        divcognom.appendChild(cpicc);
        err.push('errore cognome piccolo');
        

    } 
    

}

    


    if(maschio.checked == false && femmina.checked== false){

        messages.push('Genere richiesto!')
        console.log('genere richiestro');   

    }

   
   

    if(pw.value.match(decimal)){

        if (pw.value.length === 0){


            messages.push('Password Mancante!');
            console.log('Password Mancante!!');
 


        } 

        if (pw.value.length < 8){


            messages.push('La password deve essere almeno di 8 caratteri!');
            console.log('La password deve essere almeno di 8 caratteri!');
 


        }
    
        if (pw.value.length > 15){

      
            messages.push('La password è troppo lunga!');
            console.log('La password è troppo lunga!');
    

        }

    }else {

        messages.push('La password non rispetta i canoni, aggiungi maiuscole, numeri, caratteri speciali o controlla la lunghezza!!');


    }

    if(messages.length > 0  || err.length > 0){

        event.preventDefault();
        merror.textContent = messages.join(', ');
        merror.classList.remove('hidden');

    }

   


    
  
        
}


function mailf(event){

    const res = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(e.value == null){

        if(email.value.match(res)){
    
            if(email.value == '' || email.value == null){
    
                event.preventDefault();
                e.textContent='Email richiesta!'
                warninge.appendChild(e);
                console.log('email richiesto!');
                err.push('errore mail');
                
    
            }
    
            if(email.value.length > 40){
    
                event.preventDefault();
                e.textContent='';
                ejs.innerHTML='';
                elung.textContent='Mail Lunga!'
                warninge.appendChild(elung);
                err.push('errore mail grande');
    
    
    
            }
    
    
            const form_data = {method: 'post', body: new FormData(form), header:{"Access-Control-Allow-Origin" : "http://localhost:*", 
            "Access-Control-Allow-Credentials" : true }}
        
            fetch('http://localhost/hmw1/registrazione.php', form_data).then(onResponseR).then(onJsonR);
          
        
        
            function onResponseR(response){
            
                return response.json();
            
            }
            
            function onJsonR(json){
            
                console.log(json[1]);
                console.log(json[0]);
      
                ejs.textContent = json[0];
        
                if(json[1] === false){
    
                    event.preventDefault();
                    e.innerHTML='';
                    elung.innerHTML='';
                    warninge.appendChild(ejs);
                    err.push('errore json');
                    
            
                }else if(json[1] === true){

                    e.innerHTML='';
                    elung.innerHTML='';
                    warninge.appendChild(ejs);
    
                }
    
                
            }
    
        }else {
    
            event.preventDefault();
            e.innerHTML='';
            elung.innerHTML='';
            ejs.innerHTML='';
            ef.textContent='Formato mail non valido!'
            warninge.appendChild(ef);
            err.push('errore mail');
           
    
    
        }
    }



}

function userf(event){


    if(u.value == null){

        if(username.value == '' || username.value == null){
    
            event.preventDefault();
            u.textContent='Username richiesto!'
            warningu.appendChild(u);
            err.push('errore username');
    
    
            
    
        }else {
    
            const form_data = {method: 'post', body: new FormData(form), header:{"Access-Control-Allow-Origin" : "http://localhost:*", 
            "Access-Control-Allow-Credentials" : true }}
    
            fetch('http://localhost/hmw1/username.php', form_data).then(onResponseu).then(onJsonu);
          
        
        
            function onResponseu(response){
            
                return response.json();
            
            }
            
            function onJsonu(json){
            
                console.log(json[1]);
                console.log(json[0]);
      
                ue.textContent = json[0];
        
                if(json[1] === false){
        
                    event.preventDefault();
                    u.innerHTML='';
                    warningu.appendChild(ue);
                    err.push('errore mail json');
                    
            
                }else if(json[1] === true){
    
                    u.innerHTML='';
                    us.innerHTML='';
                    warningu.appendChild(ue);
    
                }
    
                
            }
    
    
    
        }
    
        if (username.value.length < 3 && username.value !== ''){
    
            event.preventDefault();
            u.innerHTML='';
            us.textContent='Username corto!'
            warningu.appendChild(us);
            err.push('errore username');
            
    
        }
    
    }


}