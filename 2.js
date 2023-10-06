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


fruits.unshift('orange');


fruits.pop();

console.log(fruits.indexOf('bannana'))


console.log(fruits);

const person = {
    firstName: 'john',
    lastName: 'divine',
    age: 30,
    hobbies: ['dancing', 'gaming', 'watching movies'],
    address: {
        street: 'foxtrox street',
        city: 'abuja',
        state: 'abia',
    }
}

console.log(person.address.city)

const { firstName, lastName, address: { city } } = person;
console.log(city)

person.email = 'divine@gmail.com'
console.log(person)
const todos = [
    {
        id: 1,
        text: 'take  out the trash',
        iscompleted: true
    },
    {
        id: 2,
        text: 'make money',
        iscompleted: true
    },
    {
        id: 3,
        text: 'you are broke',
        iscompleted: false
    }
];
const todosJson = JSON.stringify(todos)
console.log(todosJson)

for (let i = 0; i <= 10; i++) {
    console.log(`for loop number:${i}`);
}
let i = 0;
while (i < 10) {
    console.log(`while loop Number:${i}`);
    i++
}
for (let todo of todos) {
    console.log(todo.id)
}

const todoisCompleted = todos.filter(function (todo) {
    return todo.iscompleted === true;
}).map(function (todo) {
    return todo.text;
})
console.log(todoisCompleted)


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

const  addNums= num1  =>
num1 +5;

console.log (addNums(5));
 
function Person  (firstName,lastName,dob){
    this.firstName =firstName;
    this.lastName =lastName;
    this.dob;
}

const person1 = new person ( 'john','divine','4-3-1980')
const person2 = new person ( 'mary','smith','3-6-1970')

console.log(person2)