// DOM elements
const guideList = document.querySelector('.guides');
const SolappList = document.querySelector('.solapp');
const loggedOutLinks = document.querySelectorAll('.logged-out');
const loggedInLinks = document.querySelectorAll('.logged-in');
const accountDetails = document.querySelector('.account-details');
const adminItems = document.querySelectorAll('.admin');

const setupUI = (user) => {
  if (user) {
    if (user.admin) {
      adminItems.forEach(item => item.style.display = 'block');
    }
    
    // Client info goes in here
    // account info
    db.collection('users').doc(user.uid).get().then(doc => {
      const html = `
        <div>Logged in as ${user.email}</div>
        <div>${doc.data().bio}</div>
        <div class="pink-text">${user.admin ? 'Admin' : ''}</div>
      `;
      accountDetails.innerHTML = html;
    });



    // toggle user UI elements
    loggedInLinks.forEach(item => item.style.display = 'block');
    loggedOutLinks.forEach(item => item.style.display = 'none');
  } else {



    // clear account info
    accountDetails.innerHTML = '';


    // toggle user elements
    adminItems.forEach(item => item.style.display = 'none');
    loggedInLinks.forEach(item => item.style.display = 'none');
    loggedOutLinks.forEach(item => item.style.display = 'block');
  }
};

// setup guides
const setupGuides = (data) => {

  if (data.length) {
    let html = '';
    data.forEach(doc => {
      const guide = doc.data();
      const li = `
        <li>
          <div class="collapsible-header grey lighten-4"> ${guide.title} </div>
          <div class="collapsible-body white"> ${guide.content} </div>
        </li>
      `;
      html += li;
    });
    guideList.innerHTML = html
  } else {
    // Text on landing page
    guideList.innerHTML = '<h5 class="center-align">Bienvenidos a DELEI Iniciar session. </h5>'
    ;
  }
};


// Solicitud de apoyo
const setupSolapp = (data) => {

  if (data.length) {
    let html = '';
    data.forEach(doc => {
      const Solapp = doc.data();
      const li = `
        <li>
          <div class="collapsible-header grey lighten-4"> ${Solapp.title} </div>
          <div class="collapsible-body white"> ${Solappcontent} </div>
        </li>
      `;
      html += li;
    });
    SolappList.innerHTML = html
  } else {
    // Text on landing page
    SolappList.innerHTML = '<h5 class="center-align">Bienvenidos a DELEI Iniciar session. </h5>'
    ;
  }
};


 


// setup materialize components

document.addEventListener('DOMContentLoaded',function(){

var modals = document.querySelectorAll('.modal');
M.Modal.init(modals);

var items = document.querySelectorAll('.collapsable');
M.Collapsible.init(items);

});



// var instance = M.Carousel.init({
//   fullWidth: true
// });

// Or with jQuery

// $('.carousel.carousel-slider').carousel({
//   fullWidth: true
// });


$('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15 // Creates a dropdown of 15 years to control year
});

