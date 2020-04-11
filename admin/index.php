<?php
    session_start();
    if($_SESSION['user']!=$_REQUEST['user']){
        header("Location: login.html");
    }
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin</title>
    <meta name="author" content="Karthik Koppaka">
    <meta name="description" content="Karthik Koppaka Resume">
    <meta name="keywords" content="" />
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    <link rel="manifest" href="../manifest.json" />

    <link rel="stylesheet" href="../css/material.css">
    <link rel="stylesheet" href="../css/app.css">

    <script src="../js/vue.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/material.js"></script>
    <script src="app.js"></script>

</head>

<body>
    <div id="app">
        <header>
            <nav class="nav-extended theme">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo center">Admin</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger hide-on-med-and-up"><i class="material-icons">menu</i></a>
                </div>
                <div class="nav-content hide-on-small-only">
                    <ul class="tabs tabs-transparent tabs-fixed-width">
                        <li class="tab"><a href="#aboutme">About Me</a></li>
                        <li class="tab"><a href="#skills">Skills</a></li>
                        <li class="tab"><a href="#education">Education</a></li>
                        <li class="tab"><a href="#experience">Experience</a></li>
                        <li class="tab"><a href="#projects">Projects</a></li>
                        <li class="tab"><a href="#extras">Extras</a></li>
                    </ul>
                </div>
            </nav>

            <ul class="sidenav" id="mobile-demo">
                <li class="sidenav-close">
                    <a href="#">
                        <i class="material-icons">close</i>
                    </a>
                </li>
                <li class="tab sidenav-close">
                    <a href="#aboutme">
                        <i class="material-icons">face</i>
                        About Me
                    </a>
                </li>
                <li class="tab sidenav-close">
                    <a href="#skills">
                        <i class="material-icons">fitness_center</i>
                        Skills
                    </a>
                </li>
                <li class="tab sidenav-close">
                    <a href="#education">
                        <i class="material-icons">book</i>
                        Education
                    </a>
                </li>
                <li class="tab sidenav-close">
                    <a href="#experience">
                        <i class="material-icons">business_center</i>
                        Experience
                    </a>
                </li>
                <li class="tab sidenav-close">
                    <a href="#projects">
                        <i class="material-icons">dashboard</i>
                        Projects
                    </a>
                </li>
                <li class="tab sidenav-close">
                    <a href="#extras">
                        <i class="material-icons">more_vert</i>
                        Extras
                    </a>
                </li>
            </ul>
        </header>
        <main class="row container">
            <div id="aboutme">
                <h4 class="center">About Me</h4>
                <div class="input-field col s12 m6 l6">
                    <input type="text" v-model="user.name">
                    <label>User Name</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <input type="text" v-model="user.image">
                    <label>User Image</label>
                </div>
                <div class="input-field col s12 m12 l12">
                    <textarea class="materialize-textarea" v-model="user.description"></textarea>
                    <label>User description</label>
                </div>
                <b>
                    <center>Socials</center>
                </b>
                <div class="col s12 m12 l12" v-for="(soc,i) in user.socials">
                    <div class="input-field col s12 m5 l5">
                        <i class="material-icons prefix">link</i>
                        <input type="text" v-model="soc.link">
                        <label>Link For Social {{i+1}}</label>
                    </div>
                    <div class="input-field col s12 m5 l6">
                        <i class="material-icons prefix">image</i>
                        <input type="text" v-model="soc.icon">
                        <label>Icon For Social {{i+1}}</label>
                    </div>
                    <div class="input-field col s12 m2 l1 center">
                        <div class="btn-floating theme" v-bind:id="i" onclick="removeComponent('socials',this.id)"><i class="material-icons">delete</i></div>
                    </div>
                </div>
                <div class="col s12 m12 l12 center">
                    <div class="btn-floating theme" onclick="addField('socials')"><i class="material-icons">add</i></div>
                </div>
            </div>
            <div id="skills">
                <h4 class="center">
                    Skills
                    <div class="btn-floating theme" onclick="addField('skills')"><i class="material-icons">add</i></div>
                </h4>

                <div class="col s12 m12 l12 card-panel" v-for="(skill,i) in user.skills">
                    <br>
                    <div class="col s12 m6 l6 input-field">
                        <i class="material-icons prefix">info</i>
                        <input type="text" v-model="skill.name">
                        <label>Name</label>
                    </div>
                    <div class="col s12 m6 l6 input-field">
                        <i class="material-icons prefix">image</i>
                        <input type="text" v-model="skill.icon">
                        <label>Icon</label>
                    </div>
                    <div class="col s12 m12 l12 input-field">
                        <i class="material-icons prefix">description</i>
                        <textarea v-model="skill.description" class="materialize-textarea"></textarea>
                        <label>Description</label>
                    </div>
                    <div class="col s12 m12 l12 center">
                        <div class="btn-floating theme" v-bind:id="i" onclick="removeComponent('skills',this.id)"><i class="material-icons">delete</i></div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div id="education">
                <h4 class="center">
                    Education
                    <div class="btn-floating theme" onclick="addField('education')"><i class="material-icons">add</i></div>
                </h4>

                <div class="col s12 m12 l12 card-panel" v-for="(edu,i) in user.education">
                    <br>
                    <div class="col s12 m6 l6 input-field">
                        <i class="material-icons prefix">info</i>
                        <input type="text" v-model="edu.name">
                        <label>Name</label>
                    </div>
                    <div class="col s12 m6 l6 input-field">
                        <i class="material-icons prefix">domain</i>
                        <input type="text" v-model="edu.authority">
                        <label>Authority</label>
                    </div>
                    <div class="col s12 m4 l4 input-field">
                        <i class="material-icons prefix">insert_chart</i>
                        <input type="text" v-model="edu.level">
                        <label>Level/Standard</label>
                    </div>
                    <div class="col s12 m4 l4 input-field">
                        <i class="material-icons prefix">grade</i>
                        <input type="text" v-model="edu.grade">
                        <label>Grade</label>
                    </div>
                    <div class="col s12 m4 l4 input-field">
                        <i class="material-icons prefix">access_time</i>
                        <input type="text" v-model="edu.years">
                        <label>Years(From-to)</label>
                    </div>
                    <div class="col s12 m12 l12 center">
                        <div class="btn-floating theme" v-bind:id="i" onclick="removeComponent('education',this.id)"><i class="material-icons">delete</i></div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div id="experience">
                <h4 class="center">
                    Experience
                    <div class="btn-floating theme" onclick="addField('experience')"><i class="material-icons">add</i></div>
                </h4>

                <div class="col s12 m12 l12 card-panel" v-for="(exp,i) in user.experience">
                    <br>
                    <div class="col s12 m6 l6 input-field">
                        <i class="material-icons prefix">domain</i>
                        <input type="text" v-model="exp.name">
                        <label>Name</label>
                    </div>
                    <div class="col s12 m6 l6 input-field">
                        <i class="material-icons prefix">location_on</i>
                        <input type="text" v-model="exp.place">
                        <label>Location</label>
                    </div>
                    <div class="col s12 m6 l6 input-field">
                        <i class="material-icons prefix">insert_chart</i>
                        <input type="text" v-model="exp.position">
                        <label>Position</label>
                    </div>
                    <div class="col s12 m6 l6 input-field">
                        <i class="material-icons prefix">access_time</i>
                        <input type="text" v-model="exp.years">
                        <label>Years(From-to)</label>
                    </div>
                    <div class="col s12 m12 l12 input-field">
                        <i class="material-icons prefix">description</i>
                        <textarea v-model="exp.description" class="materialize-textarea"></textarea>
                        <label>Experience Description(share your thoughts or describe your responsibilities)</label>
                    </div>
                    <div class="col s12 m12 l12 center">
                        <div class="btn-floating theme" v-bind:id="i" onclick="removeComponent('experience',this.id)"><i class="material-icons">delete</i></div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div id="projects">
                <h4 class="center">
                    Projects
                    <div class="btn-floating theme" onclick="addField('projects')"><i class="material-icons">add</i></div>
                </h4>

                <div class="col s12 m12 l12 card-panel" v-for="(project,i) in user.projects">
                    <br>
                    <div class="col s12 m4 l4 input-field">
                        <i class="material-icons prefix">dashboard</i>
                        <input type="text" v-model="project.name">
                        <label>Name</label>
                    </div>
                    <div class="col s12 m4 l4 input-field">
                        <i class="material-icons prefix">link</i>
                        <input type="text" v-model="project.link">
                        <label>Location</label>
                    </div>
                    <div class="col s12 m4 l4 input-field">
                        <i class="material-icons prefix">image</i>
                        <input type="text" v-model="project.image">
                        <label>Image</label>
                    </div>
                    <div class="col s12 m12 l12 input-field">
                        <i class="material-icons prefix">description</i>
                        <textarea v-model="project.description" class="materialize-textarea"></textarea>
                        <label>Project Description(share your thoughts or describe your responsibilities)</label>
                    </div>
                    <div class="col s12 m12 l12 center">
                        <div class="btn-floating theme" v-bind:id="i" onclick="removeComponent('projects',this.id)"><i class="material-icons">delete</i></div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div id="extras">
                <h4 class="center">
                    Extras
                    <div class="btn-floating theme" onclick="addField('extras')"><i class="material-icons">add</i></div>
                </h4>

                <div class="col s12 m12 l12 card-panel" v-for="(exp,i) in user.extras">
                    <br>
                    <div class="col s12 m6 l6 input-field">
                        <i class="material-icons prefix">dashboard</i>
                        <input type="text" v-model="exp.name">
                        <label>Name</label>
                    </div>
                    <div class="col s12 m6 l6 input-field">
                        <i class="material-icons prefix">image</i>
                        <input type="text" v-model="exp.icon">
                        <label>Icon</label>
                    </div>
                    <div class="col s12 m12 l12 input-field">
                        <i class="material-icons prefix">description</i>
                        <textarea v-model="exp.description" class="materialize-textarea"></textarea>
                        <label>Description(share your thoughts or describe your responsibilities)</label>
                    </div>
                    <div class="col s12 m12 l12 center">
                        <div class="btn-floating theme" v-bind:id="i" onclick="removeComponent('extras',this.id)"><i class="material-icons">delete</i></div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="col s12 m12 l12 center">
                <div class="btn theme" onclick="update()"><i class="material-icons">update</i>Update</div>
            </div>
        </footer>
    </div>
</body>

</html>
