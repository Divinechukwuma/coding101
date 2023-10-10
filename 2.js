console.log('hello world')
const score = 30;
const name = 'divine';
const age = 10;
console.log(`my name is ${name} and i am ${age}`)


const s = 'technology,computer,it,code';


console.log(s.split(','));

//arrays

const fruits = ['apples', 'goat', 'monkey', 'bannana',];

fruits.push('strawberries');


fruits.unshift('orange')

console.log(fruits.indexOf('bannana'))


console.log(fruits);

const x = 20;
const y = 40;

if (x > 5 && y > 10) {
    console.log('x is more than 5 or y is more than 10 ');
}

const z = 10;

const color = 'green'

switch (color) {
    case 'red':
        console.log('color is red');
        break;
    case 'red':
        console.log('color is blue');
        break;
    default:
        console.log('color is not red or blue')
        break;
}

const addNums = num1 =>
    num1 + 5;

console.log(addNums(5));


//class
class Person {
    constructor(firstName, lastName, dob) {
        this.firstName = firstName;
        this.lastName = lastName;
        this.dob = new Date(dob);
    }
    getBirthYear = function () {
        return this.dob.getFullYear();
    }
    getFullName = function () {
        return `${this.firstName} ${this.lastName}`;
    }
}
//instantiate object

const person1 = new Person('john', 'doe', '4-3-1980');

const person2 = new Person('oge', 'ejim', '5-4-1180');

console.log(person2.getFullName());

console.log(person1);

const myForm = document.querySelector('#my-form');
const nameInput = document.querySelector('#name');
const emailInput = document.querySelector('#email');
const userList= document.querySelector('#user');
const msg= document.querySelector('.msg');

myForm.addEventListener('submit', onSubmit);
function onSubmit(e) {
    e.preventDefault();
if (nameInput.value=== ''|| emailInput.value===''){
msg.innerHTML = 'please enter all fields'
setTimeout(() => msg.remove(),3000);
}else{
    const li = document.createElement('li');
    li.appendChild(document.createTextNode(`${nameInput.value}:${emailInput.value}`));

    userList.appendChild(li);

    //clear fields
    nameInput.value = '';
    emailInput.value = '';
}

}




