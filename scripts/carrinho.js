//OBS:. Créditos ao meu amigo Pedro que me ajudou a melhorar


//----------------------//
//aqui é o jeito do Pedro para fazer o Total dinâmico
let carrinhoTabela = document.querySelector('#carrinho-tabela')
let linhasTabela = carrinhoTabela.querySelectorAll('tbody tr:not(:last-child)');
let total;
//iterando para extrair os valores
function carrinhoHandler(){
    carrinhoTabela = document.querySelector('#carrinho-tabela');
    linhasTabela = carrinhoTabela.querySelectorAll('tbody tr:not(:last-child)');
    total = 0;
    linhasTabela.forEach((el) => {
        // selecionando todos os inputs da tabela
        const qnt = el.querySelector('.carrinho-item-qnt').value;
        //selecionando todos os preços da tabela
        const valor = Number(el.querySelector('.carrinho-item-preco').innerText);
        total += valor * qnt;    
    });
    console.log(total);
    //total.innerHTML = soma;
    carrinhoTabela.querySelector('#tabela-total').innerHTML = total;
}

//event listener
carrinhoTabela.addEventListener('change', carrinhoHandler);


//funcao pra remover items

function deletarItem(event){
    console.log(event.currentTarget);
    const span = event.currentTarget;
    //??????????? um dia vai ser útil? talvez?
    const campos = document.querySelectorAll(".crt-item");
    //remove o pai...do pai, o que no caso é a tr inteira
    span.parentNode.parentNode.remove();
    carrinhoHandler();
}





