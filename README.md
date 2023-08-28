<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Assignment

## Project Summary:

- Authenticate user can update name, email and password
- User can delete the account
- User can create, update, delete any product from the system.
- User can create, update, delete any category from the system.
- User can give code, name, price and category for the product.
- catagory can be selected from another table called catagory.
- User can upload image for the product.
- User can add multiple catagory for a single product

## Table Information

1. User Attribute:
    - Name (string) {required}
    - Email (string) {required}
    - Password (password) {required}

2. Product Attributes: 
    - Code (number) {required}
    - Name (string) {required}
    - Price (number) {required}
    - Category (array) {required}
    - Photo (string) {required}
    - user_id {required. foreign key} 

3. Category Attributes: 
    - Name (string) {required}