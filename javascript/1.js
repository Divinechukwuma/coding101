$(document).ready(function () {
  /*const searchInput = $('#searchinput')
 //in jquery there is nothing like add eventlistener tmo elements directry only if u transform it to a dom element 
   searchInput.addEventListener('#searchbutton', (e)=>{
    const value =e.target.value
    console.log(value)
   })*/

   // Using jQuery to select the element with the ID 'searchinput'
const searchInput = $('#searchinput');
//whne using jquery addeventlistener in jquery just js  it should be used directly on the dom
// Adding an event listener for the 'input' event
searchInput.on('input', (e) => {
    const value = e.target.value;

});
function renderData(data, containers) {
    // Clear existing content
    $(`#${containers}`).empty();

    // Render each data item
    data.forEach(item => {
        const card = $('<div class="card">');
        const cardBody = $('<div class="card-body text-center">');
        const image = $(`<img src="${item.image}" alt="${item.name}" class="img-fluid card-image w-md-25 h-md-25">`);

        cardBody.append(image);
        card.append(cardBody);
        $(`#${containers}`).append(card);
    });
}

 // Sample data structure for menu items
const menuItems = [
    { name: 'Stake', image: 'img/stake.jpg' },
    { name: 'Salad', image: 'img/salad3.jpg' },
    { name: 'Cake', image: 'img/cake.jpg' },
    { name: 'pasta', image: 'img/pasta.jpg' },
    { name: 'pizza', image: 'img/pizza2.jpg' },
    { name: 'pancake', image: 'img/pancake2.jpg' },
];

// Sample data structure for chefs
const chefs = [
    { name: 'Chimobi Wisdom', image: 'img/chef5.jpg', description: 'Lorem ipsum...' },
    { name: 'Benjamin Joseph', image: 'img/chef2.jpg', description: 'Lorem ipsum...' },
    { name: 'anthonia ejim', image: 'img/chef6.jpg', description: 'Lorem ipsum...' },
    { name: 'kevin mayers', image: 'img/chef3.jpg', description: 'Lorem ipsum...' },
];

 //data structures of order
 const order = [
    {image:'img/delivery 2.jpg', h1:'YOU CAN STAY HOME, WE WILL COME TO YOU'}
 ]

 //data structures of reservation 
 const reservation = [
    {image:'img/table-setting.jpg', h1:'get your table today'}
 ]
 
 //data structure for location
 const location = [
    {image:'img/map.jpg', span:'main location'}
 ]
 const introduction = [
    { image:'img/day restaurant.jpg', description:'lorem ipsum'}
 ]
 
// Render menu items
renderData(menuItems, 'menu-content');

// Render chefs
renderData(chefs, 'chefs-content'); 

// Render order items
renderData(order, 'order-content');

// Render reservation
renderData(reservation, 'reservation-content');

// Render location 
renderData(location, 'location-content');

// Render introduction
renderData(introduction, 'introduction-content');

    // You can add similar initialization for other data, e.g., renderChefs(chefs);
});

$('#searchbutton').on('click', function () {
    const searchTerm = $('#searchinput').val().toLowerCase();

    // Filter menu items based on search term
    const filteredMenuItems= menuItems.filter(item => item.name.toLowerCase().includes(searchTerm));
     // Filter chefs based on search term
     const filteredChefs = chefs.filter(chef => chef.name.toLowerCase().includes(searchTerm));
    // Filter order based on search term
    const filteredOrder = order.filter(order => order.h1.toLowerCase().includes(searchTerm));
    // Filter location based on search term
    const filteredLocation = location.filter(location=> location.span.toLowerCase().includes(searchTerm));
    // Filter introduction based on search term
    const filteredIntroduction = introduction.filter(introduction => introduction.description.toLowerCase().includes(searchTerm));
    // Filter reservation based on search term
    const filteredReservation = reservation.filter(reservation => reservation.h1.toLowerCase().includes(searchTerm));

  // Combine the filtered results
  const combinedResults = [...filteredMenuItems, ...filteredChefs,...filteredOrder,...filteredLocation,...filteredIntroduction,...filteredReservation];

// Render the combined filtered data
containers[ 'menu-content','chef-content','order-content','reservation-content','location-content','introduction-content'];
renderData(combinedResults,containers)
});

    //this is too fetch data from json
    //fetch("https://jsonplaceholder.typicode.com/users")
      // .then(res => res.json())
       //.then(data => {})

    $('#select-loader').click(function (e) {
        $("button").prop('disabled', true);
        var duration = $("#duration").val();
        var option = $("#option").val();
        var color = $("#color").val();

        function checkProgress() {
            const progressValue = parseFloat($('#progress-bar').css('--progress-value'));

            if (progressValue === 100) {
                $('#progress-bar').hide();
                // You can perform any actions you need here.
            } else {
                // If it's not 100%, continue checking
                setTimeout(checkProgress, 100); // Poll every 100 milliseconds
            }
        }

        // Check if any field is empty
        if (!duration || !option || !color) {
            alert("Please fill in all fields");
        }

        switch (option) {
            case 'spinner':
                $('#spinner').css({
                    'display': 'block',
                    'color': $('#color').val()
                });
                setTimeout(() => {
                    $('#spinner').css('display', 'none');
                    $("button").prop('disabled', false);
                }, parseInt(duration));
                break;
            case 'header':
                $('#header').css({
                    'display': 'block',
                    'background-color': $('#color').val()
                });
                setTimeout(() => {
                    $('#header').css('display', 'none');
                    $("button").prop('disabled', false);
                }, parseInt(duration));
                break;
            case 'progress-bar':
                $('#progress-bar').css(
                    'display','block');
                const progressColor = `radial-gradient(closest-side, rgb(100, 0, 0) 79%, transparent 80% 100%),
                    conic-gradient(${color} calc(var(--progress-value) * 1%), white 0)`;

                $('#progress-bar').css('background', progressColor);

                checkProgress();
                break;
        }

        $("button").prop('disabled', false);
    })
