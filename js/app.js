var app;
fetch("data.json")
    .then(e => e.json())
    .then(data => {
        initVue(data)
        initMaterial()
    })
/*
@param [Object]:this is the data object retrieved fo the data.json file and feed to the Vue component
this function initializes the Vue Object and its componencts with the data provided so that we can display stuff easily in the front end
*/
const initVue = data => {
    app = new Vue({
        el: "#app",
        data: {
            user: data.user,
        }
    })
}
/*
    @param null
    this function initializes all required material components
*/
const initMaterial = () => {
    $('.sidenav').sidenav();
    $('.tabs').tabs();
    $('#mobile-demo').tabs();
    $('.collapsible').collapsible();
    $('.carousel').carousel();
}
