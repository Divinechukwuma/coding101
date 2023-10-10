let emailElement = document.querySelector('#email');
let messageElement = document.querySelector('#message')
console.log(emailElement);
let typeElement = document.querySelector('.type')
console.log(typeElement)
let submitButton = document.querySelector('#sumbit-button')
submitButton.addEventListener('click', function (e) {
    e.preventDefault();
    let emailValue = emailElement.value
    let messageValue = messageElement.value
    console.log('email: ', emailValue)
    console.log('message: ', messageValue)
    if (emailValue.includes ('@')) {
        alert('thank you for your message')
    }
    else {alert( 'that does not look like a valid email address, pls try again')}

})
const btn = document.querySelector('.btn');{
    document.querySelector('body').classList.add('.h1');
}
