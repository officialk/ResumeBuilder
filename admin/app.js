var data;
fetch("../data.json")
    .then(e => e.json())
    .then(e => {
        data = e
        initVue(e);
        initMaterial();
    })


const update = () => {
    //    let link = "../app.php?update=true&data=" + encodeURI(JSON.stringify(data.$data));
    console.log(data.$data.user)
    //    fetch(link, {
    //            method: "get",
    //        })
    //        .then(e => e.text())
    //        .then(e => console.log(JSON.parse(e)))
}

const addField = (field) => {
    let d = {}
    Object
        .keys(data
            .$data
            .user[field][0]
        )
        .forEach(key => {
            d[key] = ""
        })
    data.$data.user[field].push(d)
    initMaterial()
}

const removeComponent = (component, index) => {
    data.$data.user[component] = data.$data.user[component]
        .filter((comp, i) => {
            return i != index
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
    M.updateTextFields()
}

/*
@param [Object]:this is the data object retrieved fo the data.json file and feed to the Vue component
this function initializes the Vue Object and its componencts with the data provided so that we can display stuff easily in the front end
*/
const initVue = d => {
    data = new Vue({
        el: "#app",
        data: {
            user: d.user,
        }
    })
    initMaterial()
}

$(document).ready(e => {
    initMaterial()
})
