# breadcrumbs

This is a Laravel package that will build up a nice presentation of your current url, more known as "Breadcrumbs"

http://domain.com/admin/users/create-new-user will turn into this:

![Alt text](https://i.imgur.com/FUWTr8V.png?raw=true "Title")

# Installation

Install Breadcrumbs by running:
```
composer require empyrean/breadcrumbs
```
After that you will have to publish css files and BreadcrumbsServiceProvider by running:
```
php artisan vendor:publish (this will also add a vendor/breadcrumbs/breadcrumbs.css file to you public folder)
```
After this just include the link to the css file on any on page you want breadcrumbs to show up if you plan on using html provided by this package.

You will also need to have correct APP_NAME setup in your env file, in order for this package to work properly.
# Usage
You will be able to get your breadcrumbs in 3 different ways
```
Breadcrumb::buildHtml() - this method will return full html 

Breadcrumb::buildParsedPath()->get() - this will split current url by "/" and return an array in case you want to stylelize breadcrumbs on your own. 
```
You can change the format of your parsedPath by calling format() method and then provding a format type like so:
```
Breadcrumb::buildParsedPath()->format(new Collection)->get()
```
You can also request links to all pages by calling withLinks() method like so:
```
Breadcrumb::buildParsedPath()->format(new Collection)->withLinks()->get()
```

# Licence

MIT
