var config = {
    apiKey: "AIzaSyD9qKKE_hLxlEzPUS5jRUAlsGuNVac1pn0",
    authDomain: "delei-225220.firebaseapp.com",
    databaseURL: "https://delei-225220.firebaseio.com",
    projectId: "delei-225220",
    storageBucket: "",
    messagingSenderId: "739405227401"
  };
  firebase.initializeApp(config);

  var database = firebase.database();

  $("#submit-btn1").on("click", function() {
    event.preventDefault();

    var nombre = $("#nombre-input").val().trim();
    var testimonio = $("#testimonio-input").val().trim();
    
    

    database.ref("/user").push({
        nombre: nombre,
        testimonio: testimonio,
        
        
        dateAdded: firebase.database.ServerValue.TIMESTAMP
      });

  })

  database.ref("/user").on("child_added", function(snapshot) {
    var sv = snapshot.val();
    console.log(sv);

        var newDiv = $("<div>");
        newDiv.addClass("row col-12 col-lg-12");
        var nombredb = $("<p>").text(sv.nombre);
            nombredb.attr("class", "col-4 col-lg-4 d-inline");
        var testimoniodb = $("<p>").text(sv.testimonio);
        testimoniodb.attr("class", "col-1 col-lg-1 d-inline");
        var convertDate = moment(sv.date).format("MMM Do YYYY");
        var datedb = $("<p>").text(convertDate);
        datedb.attr("class", "col-2 col-lg-2 d-inline");
        var months = moment().diff(moment(sv.date),"months");
        var monthsdb = $("<p>").text(months);
        monthsdb.attr("class", "col-1 col-lg-1 d-inline");
        
        
       
        
        
        newDiv.append(nombredb);
        newDiv.append(testimoniodb);
        newDiv.append(datedb);
        newDiv.append(monthsdb);
      
        console.log(newDiv);
        $("#employee-holder").append(newDiv);
        

        
})
 