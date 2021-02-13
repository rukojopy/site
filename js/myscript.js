let cartBody = document.getElementById('cart');
let inputCart = document.getElementById('cartFF');

window.addEventListener('click', (event) => {
  console.log('click');

  // клік на кнопку "Купити"
  if(event.target.classList.contains('button-buy')){
    console.log('клік на кнопку');
    addItems(event.target);
  }
 // удаление товара с корзины
  if(event.target.classList.contains('delete-items')){
    console.log('delete items from cart');
    deleteItems(event.target);
  }
});

function addItems(element){
  console.log('додавання товару');
  let li = document.createElement('li');
  li.innerHTML = element.dataset.img
               + element.dataset.name
               + element.dataset.price
               + '<div class="delete-items"> X </div>';
  cartBody.appendChild(li); 
  M.toast({html: 'Товар у кошику', classes: 'rounded'});                  
}


function deleteItems(element){
  console.log('deleteItems');
  console.log(element);
  element.parentNode.remove();
}
