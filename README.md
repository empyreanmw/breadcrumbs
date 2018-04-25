# breadcrumbs

This is a Laravel package that will build up a nice presentation of your current url, more known as "Breadcrumbs"

# Installation

Install Breadcrumbs by running:
```
composer require empyrean/breadcrumbs
```
If you want the stylezation that comes with this package, you need to run
```
After this just include the link to the css file on any on page you want breadcrumbs to show up.
php artisan vendor:publish (this will add a vendor/breadcrumbs/breadcrumbs.css file to you public folder). 
```
You will also need to have correct APP_NAME setup in your env file, in order for this package to work properly.
# Usage
You will be able to get your breadcrumbs in 3 different ways
```
Breadcrumb::buildHtml() - this method will return full html 
```
Breadcrumb::build() - this method will return unstylized version
```
Breadcrumb::arrayOfPages() - this method will return array of parsed path in case you want to build your own html

# Licence

MIT
