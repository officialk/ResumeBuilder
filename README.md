# Resume Builder

Resume Builder is a simple Web application which lets you create a resume website and also manage it without the hassles of databases and file management
on top of this you can also customize the look and feel of your site as you want. If you have a better design/idea go ahead and make changes and add a pull request cause this is an open-source project
## You can help too by
- Creation or Correction of
  - Language
  - Documentation
- Coding for
  - UI/UX changes
  - UI templates
  - Feature Improvements
  - Adding features
  - Security improvements
  - Efficiency
- Reporting or Suggesting
  - issues
  - features
- Sharing about us

## Installation

Simply git clone it into your workspace to begin working
```git
git clone https://github.com/officialk/ResumeBuilder.git
```

## Usage

#### Remember to change the password and username in app.php before using it on a live server

## File Structure
```
css/
----app.css #consists of all custom CSS codes
----material.css #materializecss framework
----icons.woff2 #material icons pack
js/
----app.js #consists of all logic for front end
----vue.js #vue framework
----jquery.js #JQuery framework
----material.js #JQuery framework
admin/
----index.php #main UI for the admin to make changes to data
----login.html #login page UI
----app.js #logic for the admin panel is stored here
index.html #front end UI for users to view
app.php #file used to handle the data manipulation and verification of admin
data.json #file used to store data
manifest.json #file used to store data about the application
```
## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update the tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)

## Updates
### V1
- [X] created the basic template(main index.html file)
- [X] initialized and setup vue.js,materializecss
- [X] created admin panel UI for easier data management
- [ ] manipulate data.json file using app.php
- [ ] convert to pwa
- [ ] custom user themes folder where anyone can add themes to be used by anyone
- [ ] changeable themes