//OBS:. Créditos ao meu amigo Pedro que me ajudou a melhorar
//esse código. Só traduzi pra PT-BR, mas irei commitar a versão dele
//no monorepo

//abaixo, o meu jeito de fazer o total dinâmico (excluí o meu listener),

// selecionando todos os inputs da tabela
const tabQuant = document.querySelectorAll('.carrinho-item-qnt');

//selecionando todos os preços da tabela
const tabValores = document.querySelectorAll('.carrinho-item-preco');

var i = 0;
let totalR = 0;

//iterando para extrair os valores
for(i = 0;i < tabQuant.length; i++){
    //soma = soma + (tabQuant[x] * tabValores[x]);
    let val = parseFloat(tabValores[i]['textContent']);
    let qnt = parseInt(tabQuant[i]['value']);
    totalR = totalR + (qnt*val);
}
document.querySelector('#tabela-total').innerHTML = totalR;

//----------------------//
//aqui é o jeito do Pedro para fazer o Total dinâmico
const carrinhoTabela = document.querySelector('#carrinho-tabela')
const linhasTabela = carrinhoTabela.querySelectorAll('tbody tr:not(:last-child)');
let total;
//iterando para extrair os valores
function carrinhoHandler(){
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
    document.querySelector('#tabela-total').innerHTML = total;
}

//event listener
carrinhoTabela.addEventListener('change', carrinhoHandler);








