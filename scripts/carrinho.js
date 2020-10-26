// selecionando todos os inputs da tabela
const tabQuant = document.querySelectorAll('#carrinho-tabela tbody tr td:first-child input');
//selecionando todos os preços da tabela
const tabValores = document.querySelectorAll('#carrinho-tabela tbody tr td:nth-child(3)');
var i = 0;
var total = 0;
//iterando para extrair os valores

for(i = 0; i<tabQuant.length; i++){
    //soma = soma + (tabQuant[x] * tabValores[x]);
    let val = parseFloat(tabValores[i]['textContent']);
    let qnt = parseInt(tabQuant[i]['value']);
    total = total + (qnt*val);
   
    

}
console.log(total);


//total.innerHTML = soma;
document.querySelector('#tabela-total').innerHTML = total;