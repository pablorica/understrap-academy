[![](https://camo.githubusercontent.com/f69fc0477aad3afb9994100971db6e13a2e13fcd21be13e7dd334d928713a55e/68747470733a2f2f756e64657273747261702e636f6d2f77702d636f6e74656e742f75706c6f6164732f323032322f30322f556e64657273747261705f4c6f676f5f436f6c6f722e737667)](https://camo.githubusercontent.com/f69fc0477aad3afb9994100971db6e13a2e13fcd21be13e7dd334d928713a55e/68747470733a2f2f756e64657273747261702e636f6d2f77702d636f6e74656e742f75706c6f6164732f323032322f30322f556e64657273747261705f4c6f676f5f436f6c6f722e737667)

#### See: [Official Demo](https://demos.understrap.com) | Read: [Official Docs Page](https://docs.understrap.com/)

# Understrap Child Starter Theme

Website: [understrap.com](https://understrap.com)

Parent Theme Project: [github.com/understrap/understrap](https://github.com/understrap/understrap)

Premium Child Themes: [understrap.com/child-themes/](https://understrap.com/child-themes/)

## About

Understrap is the renowned open-source WordPress starter theme that combines Underscores with Bootstrap. Trusted by more than 100,000 developers. This repo holds the **Child Starter Theme** for developers using the [Understrap Theme Framework](https://github.com/understrap/understrap).

## Documentation

Full documentation for this starter theme is available at [docs.understrap.com](https://docs.understrap.com).

## Questions

For support requests and bugs, we recommend browsing our issues [here (parent theme)](https://github.com/understrap/understrap/issues) and [here (child theme)](https://github.com/understrap/understrap-child/issues) and opening a new issue if necessary. For more broad discussion, like questions about the roadmap, visit our [discussion board](https://github.com/understrap/understrap/discussions).

## Basic Features

-   Combines Underscore’s PHP/JS files and Bootstrap’s HTML/CSS/JS.
-   Comes with Bootstrap v5 Sass source files and additional .scss files. Nicely sorted and ready to add your own variables and customize the Bootstrap variables.
-   Uses sass and postCSS to handle compiling all of the styles into one style sheet. The theme also includes rollup.js to handle javascript compilation and minification.
-   Uses a single minified CSS file for all the basic stuff.
-   [Font Awesome](http://fortawesome.github.io/Font-Awesome/) integration (v4.7.0)
-   Jetpack ready
-   WooCommerce support
-   Contact Form 7 support
-   Translation ready


## [NPM and the Build Process](https://docs.understrap.com/#/understrap-child/npm?id=npm-and-the-build-process)

Understrap uses [npm](https://www.npmjs.com/) as manager for dependency packages like Bootstrap and Underscores. And it uses tools like [rollup.js](https://www.rollupjs.org/) and [postCSS](https://postcss.org) as taskrunners to compile .scss code into .css, minify .js code, etc. The following chapter describes the usage and workflow.

### [Preparations: Install node.js](https://docs.understrap.com/#/understrap-child/npm?id=preparations-install-nodejs)

At first you need node.js installed on your computer globally. If you already done this before skip this section. If not: You have to install node.js (comes along with npm) before you can proceed. To install node.js visit the node.js website for the latest installer for your OS. Download and install it like any other program, too.

We also recommend using [NVM - Node Version Manager](https://github.com/nvm-sh/nvm) to keep closer control over your version of node.js and switch between versions.

### [Installing dependencies](https://docs.understrap.com/#/understrap-child/npm?id=installing-dependencies)

-   Make sure you have installed Node.js and Browser-Sync* (* optional, if you wanna use it) on your computer globally
-   Then open your terminal and browse to the location of your Understrap copy
-   Run: `npm install`

### [Running](https://docs.understrap.com/#/understrap-child/npm?id=running)

To work and compile your Sass files on the fly start:

```
npm run watch
```

Or, to run with Browser-Sync:

First change the browser-sync options to reflect your environment in the file `/src/build/browser-sync.config.js` in the beginning of the file:

```
module.exports = {
    "proxy": "localhost/", // Change here
    "notify": false,
    "files": ["./css/*.min.css", "./js/*.min.js", "./**/*.php"]
};
```

Replace `localhost/theme_test/` with the URL to your local WordPress test environment. For example if you run MAMP and your WordPress installation is placed in a htdocs subfolder called `/understrap` you have to add `localhost:8888/understrap`. Its the same URL you have to type in to see your local WordPress installation. Then run:

```
npm run watch-bs
```

## [Overriding Default Styles and Scripts](https://docs.understrap.com/#/understrap-child/npm?id=overriding-default-styles-and-scripts)

First we must run the watcher process which is responsible to track file changes and compile these changes to the final CSS file which in turn WordPress loads. From the terminal and while in project root directory type `npm run watch`. You might see something like this:

```
[nodemon] to restart at any time, enter `rs`
[nodemon] watching path(s): src/js/**/*
[nodemon] watching extensions: js
[nodemon] to restart at any time, enter `rs`
[nodemon] starting `npm-run-all js`
[nodemon] watching path(s): sass/**/*
[nodemon] watching extensions: scss
[nodemon] starting `npm-run-all css`
```

Leave the terminal open with the command running as is.

Add your own CSS styles to `/src/sass/theme/_child_theme.scss` or import your own files into `/src/sass/theme/_child-theme.scss`

To overwrite Bootstrap's or Understrap's base variables just add your own value to:`/src/sass/theme/_child_theme_variables.scss`

For example, the "$primary" variable is used by both Bootstrap and Understrap.

Add your own color like: `$primary: #ff6600;` in `/src/sass/theme/_child_theme_variables.scss` to overwrite it. This change will automatically apply to all elements that use the $primary variable.

By saving the file you should see in terminal something like the following:

```
[nodemon] restarting due to changes...
[nodemon] starting `npm-run-all css`
```

Reload the page and you should be able to see the new style applied.

It will be outputted into: `/css/child-theme.min.css` and `/css/child-theme.css`

So you have one clean CSS file at the end and just one request.

Add your own JS to `/src/js/custom-javascript.js` to have them bundled into `/js/child-theme.js`.

## [Dist Commands](https://docs.understrap.com/#/understrap-child/npm?id=dist-commands)

The child theme includes three commands for creating a distributable copy of your child theme.

### [dist](https://docs.understrap.com/#/understrap-child/npm?id=dist)

```
npm run dist
```

This command will run both the `css` and the `js` commands to create the final compiled and minified versions of your scripts and stylesheets. It will give the same final result as running those commands separately, or running `watch` and saving a file.

### [dist-build](https://docs.understrap.com/#/understrap-child/npm?id=dist-build)

```
npm run dist-build
```

This command creates a `/dist/` directory inside your child theme and populates it with a distributable version of your child theme. This version does not include any development files or features, such as the `package.json` and the entire `/src/` folder, meaning that another user wouldn't be able to modify and rebuild the stylesheets or javascript files.

By default, the `/dist/` is included in the .gitignore file and is not version controlled.

### [dist-clean](https://docs.understrap.com/#/understrap-child/npm?id=dist-clean)

```
npm run dist-clean
```

This command deletes the newly-created `/dist` directory.



## Understrap Academy

[Become an Understrap Expert.](https://www.understrapacademy.com) Presented by the team behind the Understrap Theme Framework, Understrap Academy is a collection of online courses that will help you speed up your development process, make your projects more profitable, and become an Understrap expert in record time.

## Bootstrap 5 (and Bootstrap 4) Support

This child theme uses Bootstrap 5 and requires [Understrap Parent Theme 1.1](https://wordpress.org/themes/understrap) or greater for best functionality. It does not create JS or CSS files that work with Bootstrap 4 markup. In fact, in the `functions.php` file, this child theme overrides the parent theme's customizer settings.

If you want to build a child theme with Bootstrap 4, please use [the 1.0.1 child theme release](https://github.com/understrap/understrap-child/releases/tag/v1.0.1) as it was the last version built to support Bootstrap 4.

## License

Copyright 2022 [Howard Development & Consulting, LLC](https://howarddc.com). Understrap is distributed under the terms of the GNU GPL version 2

[http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html](http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)

## Credits

-   Font Awesome: [https://fontawesome.com/v4.7/license/](https://fontawesome.com/v4.7/license/) (Font: SIL OFL 1.1, (S)CSS: MIT)
-   Bootstrap: [http://getbootstrap.com](http://getbootstrap.com) | [https://github.com/twbs/bootstrap/blob/master/LICENSE](https://github.com/twbs/bootstrap/blob/master/LICENSE) (MIT)
-   WP Bootstrap Navwalker by Edward McIntyre & William Patton: [https://github.com/wp-bootstrap/wp-bootstrap-navwalker](https://github.com/wp-bootstrap/wp-bootstrap-navwalker) (GNU GPLv3)