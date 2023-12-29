# AE Centros
A simple plugin for show custom Post Type in https://actualidadeducativa.com/centros-educativos-privados

### What it does?
This project is designed to facilitate and speed up the production of WordPress plugins.
It depends on __grunt__ to create a fast and well organized working environment. It's super easy to use and to setup.

---

### Getting started
There are few steps to follow in order to start:
* Download the project to your WordPress plugins folder
+ Type `npm install && npm run start`
+ Build `npm run build`


Then you are ready to go!

---

### Structure
```
  |-- plugins',
      |-- Gruntfile.js',
      |-- README.md',
      |-- ae-centros.php',
      |-- package-lock.json',
      |-- package.json',
      |-- assets',
      |   |-- src',
      |       |-- js',
      |       |   |-- admin-script.js',
      |       |   |-- gridpack.js',
      |       |   |-- mapa.js',
      |       |   |-- user-script.js',
      |       |-- scss',
      |           |-- build.scss',
      |           |-- main',
      |           |   |-- admin-style.scss',
      |           |   |-- gridpack.scss',
      |           |   |-- mapa.scss',
      |           |   |-- user-style.scss',
      |           |-- partials',
      |               |-- media-queries.scss',
      |-- images',
      |   |-- acep.png',
      |   |-- escuelas.png',
      |-- include',
      |   |-- admin-centros-list.php',
      |   |-- init.php',
      |   |-- main-class.php',
      |   |-- shortcode-centros.php',
      |   |-- templates',
      |       |-- centros-archive.php',
      |       |-- centros_anunciantes.php',
      |       |-- centros_no_anunciantes.php',
      |-- languages',
          |-- AE-Centros.pot',

8 directories, 14 files
```

---

### How does it works?
All your plugin related files are located in `assets/src` folder.
While in watch mode all the files in `assets/src` folder and sub-folders will be compiled, uglified and saved in the `assets/dist` folder with the same name of the source file and following the same folder structure. Use `npm run build`

The plugin textdomain by default is the same that the package name, in this case **AE Centros**.
A `.pot` file named `{package-name}.pot` is automatically generated using _grunt-wp-i18n_ during the watch task or can be manually generated using: `npm run build`.

**Note:** remember to change the Text Domain in order to match your package name text domain, we suggest to use the same as the folder name.

So you don't forget to update the translation file after you finish your editing. (_something that happened a lot to me_)

Also the starter comes with jQuery automatically loaded and some starting scripts for both the admin and the user view.

---

### Development

Go inside the project folder and install his dependencies by typing:

```bash
npm install
```

Than you can start to write your changes using some npm scripts:

```bash
npm run start     # default task is to watch and rebuild on changes
npm run build     # build task will compile and rebuild everything
```
