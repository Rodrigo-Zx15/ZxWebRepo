//criando 
let carrinho = [];

function ItemCarrinho (id, nome, preco){
    this.id = id;
    this.nome = nome;
    this.preco = preco;
};
var i = 0;
var salvarDados = function({currentTarget}){
    //the power to transcend
    let lchPreco = currentTarget.closest('.card-body').querySelector('.hm-item-preco').innerHTML;
    let lchNome = currentTarget.closest('.card').querySelector('h5').innerHTML;
    i++;
    let novoItem = new ItemCarrinho(i,lchNome,lchPreco);
    carrinho.push(novoItem);
    console.log(carrinho);
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
}