//criando 
let carrinho = [];

function ItemCarrinho (id, nome, preco){
    this.id = id;
    this.nome = nome;
    this.preco = preco;
};
//var i = 0;
var salvarDados = function({currentTarget}){
    //the power to transcend
    let lchPreco = currentTarget.closest('.card-body').querySelector('.hm-item-preco').innerHTML;
    let lchNome = currentTarget.closest('.card').querySelector('h5').innerHTML;
    let lchID = currentTarget.closest('.card').querySelector('#lchID').value;
    let novoItem = new ItemCarrinho(lchID,lchNome,lchPreco);
    carrinho.push(novoItem);
    console.log(carrinho);
    console.log(currentTarget.closest('.card').querySelector('#lchID').value)
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    currentTarget.remove();
}