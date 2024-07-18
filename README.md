# Welcome to MegaMart

MegaMart is a fictional simple e-commerce platform where as an admin you can manage products. Here's how you can manage caching and testing within the system.

## Cache Setup

In your `.env` file, configure the cache settings:
CACHE_STORE=database
CACHE_PREFIX=
CACHE_DRIVER=database

After configuring the Cache Driver, follow these steps to test caching:
1. Clear Cache - Clear the cache using artisan command and run PHP Tinker in CLI.
php artisan cache:clear
php artisan tinker
2. Check Cache - In PHP Tinker, check if a product is cached:
$cacheKey = 'prodID-'; // insert the product ID you want to check
Cache::has($cacheKey); // this will display if it is true or false

## Automated Testing
MegaMart includes automated tests for product management located in `tests\Feature\ProductTesting.php`. 
To execute these tests, run: 
php artisan test

## Additional Instruction
In editing/updating the product, the admin will need to double click the textbox.

## System Details
* PHP Version: PHP 8.2.10
* Composer Version: 2.7.7

## MySQL Database
* Database File - `chenie-varela-coding-exam\megamart.sql`.
* Database Name = megamart 

## ANSWER TO FEATURE REQUEST

Q: The management requested a new feature where in the fictional e-commerce app must have a "featured products" section.
How would you go about implementing this feature in the backend?

A: To implement the "featured products" section in the backend, the first step involves modifying the database by adding an additional column to indicate whether a product is featured or not. Next, the backend API handling product fetching will be updated to accommodate this new feature and integrate it with the frontend. Additionally, on the admin side, admins will mark products as featured using a checkbox or toggle in the product management section. Finally, thorough testing will ensure that only products marked as featured are correctly displayed.
