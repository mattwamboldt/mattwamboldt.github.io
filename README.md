# Portfolio

My portfolio is built with WordPress and this repo contains the custom theme created to support it.

## Why WordPress

The first obstacle was deciding on a framework. I was tempted to write something from scratch using NodeJS, or ASP.Net but decided to stick with WordPress. This will let me focus more on the projects I’ll be sharing and it's a better writing platform than I have time to build at the moment. To keep a decent amount of control and still learn something/show off my web dev skills, I’ll be building a full theme myself.

## Setup
If you want to use this theme or use this as a base to hack on here's the process I followed for this repo.

### Web Server / WordPress
Your first step will be to download and install a web server. I used [WAMPServer](https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/wampserver3.0.6_x64_apache2.4.23_mysql5.7.14_php5.6.25-7.0.10.exe/download) since I’m on Windows and the default installation is quick and clean. A virtual machine with Nginx or straight Apache could also work. You’ll have to adjust some steps and I won’t be covering that option.

Next download WordPress from [this link](https://wordpress.org/download/) and unzip into the web root of your server. For WAMP that’s **C:\wamp64\www**. Create a database and user for WordPress, which you should be able to figure out in PHPMyAdmin or using the command line. Then go to localhost in a web browser and follow the instructions for setting up WordPress.

***Note:*** If you run into trouble at this step there are great docs on the [WordPress Codex](https://codex.wordpress.org/Installing_WordPress#Famous_5-Minute_Installation). Also remember that as a programmer, Google is your friend. 

### Visual Studio Code
Visual Studio Code is a lightweight text editor in the vein of Atom or Sublime. I began using it for web development after starting at Modest Tree and will never look back. As time passes it’s become my default editor for most things, even C/C++. You can grab it [here](https://code.visualstudio.com/download).

Once installed you’ll want to grab the following extensions, which are also in the .vscode directory and will prompt automatically:

- [Debugger for Chrome](https://marketplace.visualstudio.com/items?itemName=msjsdiag.debugger-for-chrome)
- [Live Server](https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer)
- [PHP Debug](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug)
- [PHP IntelliSense](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-intellisense)
- [WordPress Snippet](https://marketplace.visualstudio.com/items?itemName=tungvn.wordpress-snippet)

VS Code should now be giving you syntax highlighting, auto-completion on WordPress functions and even a bit of IntelliSense for global PHP functions and variables.

***Important:*** Make sure to grab the Chrome extension that goes along with Live Server. Also install the Standalone version of [SASS](https://github.com/sass/dart-sass/releases). These two things will help later.

### Connecting to WordPress Install
To have the theme show up in your local WordPress install create a junction, or hard link, between the theme folder in the repo and a location in the themes directory of your install. For example:

`mklink /J C:\wamp64\www\wp-content\themes\<theme_name> <repo_location>\theme`

This lets us organize the repo and code surrounding the output theme files however we like instead of working straight out of the WordPress directories. A theme only requires a [style.css](https://developer.wordpress.org/themes/basics/main-stylesheet-style-css/), which houses the themes meta data, and an index.php file. You can now go into the admin panel for WordPress and change to the new theme.

For explanations of how to edit themes, check the [Codex articles](https://codex.wordpress.org/Theme_Development) on the subject.

### Hot Reloading
At this point you should be able to make changes to the theme files, reload the site at localhost and see it update, but reloading manually is for suckers.

The Live Server extensions we installed for VS Code and Chrome can now come into play. In VS Code’s status bar you should see a Go Live button. Once you’ve clicked that you’ll get a page listing your files, and any time you change a file in the directory that page will reload.

Open the chrome extension and enable it, setting the Live Server Address to the one you just launched and the Actual Server address to http://localhost/. Then go to your WordPress install at localhost and refresh the page. Now every time you change something and save, it will auto reload the browser.

I'd recommend using SASS in watch mode to manage CSS development. SASS makes working with CSS 1000 times better and in watch mode every time you change an scss file it’ll transpile, then Live Server will reload the page. There's a batch file included to start it up, or just run `sass --watch scss:theme/styles`