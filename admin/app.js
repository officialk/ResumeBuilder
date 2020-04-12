var data;
/*
The Keys and Copy of the data stores so that new fields can be generated
*/
const keys = {
    "socials": {
        "icon": "",
        "link": ""
    },
    "skills": {
        "name": "",
        "icon": "",
        "description": ""
    },
    "education": {
        "name": "",
        "authority": "",
        "level": "",
        "years": "",
        "grade": ""
    },
    "experience": {
        "name": "",
        "place": "",
        "position": "",
        "years": "",
        "description": ""
    },
    "projects": {
        "name": "",
        "description": "",
        "link": "",
        "image": ""
    },
    "extras": {
        "name": "",
        "icon": "",
        "description": ""
    }
}

fetch("../data.json")
    .then(e => e.json())
    .then(e => {
        initVue(e);
        initMaterial();
    })

/*
@PARAM Null
send a request with the whole new and updated user Data to app.php file
which updates the data.json file with the new data
*/
const update = () => {
    let link = "../app.php?update=true&data=" +
        (encodeURI(
                JSON
                .stringify(data
                    .$data)
            )
            .replace(/\&/g, ">>")
            .replace(/\?/g, "<<")
        );
    fetch(link)
        .then(e => e.text())
        .then(e => {
            if (e == "done") {
                alert("Data Saved")
            } else {
                alert("Data Not Saved!!\n Please Try Again")
            }
        })
}
/*
@param field[string] this string represents the key in the user object
this creates an empty object with keys copied from keys variable
*/
const addField = (field) => {
    data.$data.user[field].push(keys[field])
    initMaterial()
}
/*
@param component[string] : the key used to represents the object in the main data
@param index[int] : the index used to represents the objects index that is to be deleted from the component
*/
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
    M.updateTextFields()
    $('.sidenav').sidenav();
    $('#mobile-demo').tabs();
    $('.tabs').tabs();
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
}

$(document).ready(e => {
    initMaterial()
})
