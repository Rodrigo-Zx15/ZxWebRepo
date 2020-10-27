const cartTable = document.querySelector('#carrinho-tabela');
const tableRows = cartTable.querySelectorAll('tbody tr:not(:last-child)');
let totalPrice;

function cartTableHandler() {
    totalPrice = 0;
    tableRows.forEach((el) => {
        const input = el.querySelector('.cart-element-input').value;
        const price = Number(el.querySelector('.cart-element-price').innerText);
        totalPrice += price * input;    
    });
    document.querySelector('#cart-total').innerHTML = totalPrice;
}
cartTable.addEventListener('change', cartTableHandler);

