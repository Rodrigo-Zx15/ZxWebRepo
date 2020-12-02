//OBS:. Créditos ao meu amigo Pedro que me ajudou a melhorar
function limpar(){
    localStorage.removeItem('carrinho');
}

//----------------------//

//pegando carrinho da localStorage
const carrinho = JSON.parse(localStorage.getItem('carrinho'));


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
    total = total.toFixed(2);
    carrinhoTabela.querySelector('#tabela-total').innerHTML = total;
}

//event listener
carrinhoTabela.addEventListener('change', carrinhoHandler);

//eu honestamente nao faço ideia do que eu fiz aqui
//mas funciona!
//não Pedro, não funciona com foreach.
function updateCarrinho(tcarrinho, id){
    for (let index = 0; index < tcarrinho.length; index++) {
        const element = tcarrinho[index];
        if(element.id == id){
            console.log(element);
            tcarrinho.splice(index,1);
            
        }
    }
    console.log(tcarrinho);
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
}

//funcao pra remover items

function deletarItem({currentTarget}){
    console.log(event.currentTarget);
    //const span = event.currentTarget;
    //??????????? 
    const id = currentTarget.closest("tr").querySelector('.carrinho-item-id').value;
    //console.log(id);
    //remove o pai...do pai, o que no caso é a tr inteira
    currentTarget.parentNode.parentNode.remove();
    updateCarrinho(carrinho, id);
    carrinhoHandler();
}
//dinamicamente inserindo itens na tabela


console.log(carrinho);
carrinho.forEach(produto => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
        <td>
            <input type="hidden" class="carrinho-item-id" value="${produto.id}" name="item-id[]">
            <input type="number" min="1" max ="9" class="carrinho-item-qnt" value="1" name="item-qt[]">
        </td>
        <td>
            ${produto.nome}
        </td>
        <td>
           R$<span class="carrinho-item-preco"> ${produto.preco} </span>
        </td>
        <td>
            <span onclick="deletarItem(event)">
                <img src="../frontend/icons/002-red-x.svg" alt="deletar item"/>
            </span>
        </td>
    `;
    var table = document.querySelector('tbody');
    var tableTotal =  document.getElementById('crt-total');
    table.insertBefore(tr,tableTotal);

});
//deletando o carrinho após a compra ser efetuada

carrinhoHandler();



