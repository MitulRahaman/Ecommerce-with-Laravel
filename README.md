<p align-item="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# E-commerce

## Project Summary:

- Authenticate user and admin can update name, email and password and delete the account
- User can add product to the cart and checkout
- User can check the status of his own ordered product
- Admin users have some special access than normal user
- An admin can create, update, delete any product from the system.
- Admin can create, update, delete any category from the system.
- Admin give code, name, price and category for the product.
- catagory can be selected from another table called catagory.
- Admin can upload image for the product.
- Admin can add multiple catagory for a single product
- Admin can check the status of all ordered product and can change the status
- Products can be filtered by category
- Admin can manage other admin users

***use admin@gmail.com for registration to get full access

## Table Information

1. Users Attribute:
    - name (string) {required}
    - email (string) {required} {unique}
    - password (password) {required}

2. Products Attributes: 
    - code (number) {required}{unique}
    - name (string) {required}
    - price (number) {required}
    - category (array) {foreign key} {required}
    - photo (string) {required}
    - user_id {required, foreign key} 

3. Admins Attributes: 
    - name (string) {required}
    - email (string) {required}{unique}

4. Carts Attributes: 
    - name (string) {required}
    - email (string) {foreign key} {required} {unique}
    - productTitle (string) {required}
    - productQuantity (number) {required}
    - totalPrice (number) {required}

5. Categories Attributes: 
    - Name (string) {required} {unique}

6. Orders Attributes: 
    - orderedProduct (string) {required}
    - totalPrice (number) {required}
    - status (string) {required}
    - user_id {required, foreign key} 
    - user_email (string) {required} {unique}
