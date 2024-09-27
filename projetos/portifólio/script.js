function escrevendoLetra(){
    function ativaLetra(elemento){
        const arrTexto = elemento.innerHTML.split('');
        elemento.innerHTML = '';
        arrTexto.forEach((letra, i) => {
            setTimeout(()=>{
                elemento.innerHTML += letra;
            }, 100 * i)
        });
    }
    
    const titulo = document.querySelector('.digitando');
    ativaLetra(titulo);
}

const ativaMenu = document.querySelector('.fa-bars');

ativaMenu.addEventListener('click', ()=>{
    ativaMenu.classList.toggle('fa-x')
})

