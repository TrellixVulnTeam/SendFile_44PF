This project developed with Python3.65+ Django for Backend and Angular7.0 for Frontend

# Store Management System

### Features

- Inventory management
- Order management
- Customer Relationship management
- Staff Management

### Built with

> Django/Django Rest Framework/Angular

**General functionality:**

- Authenticate users via JWT (login/signup pages + logout button on settings page)
- CRU\* users (sign up & settings page - no deleting required)
- CRUD Inventory, Order, Customer, Staff
- Email invitation

# Getting started

## Frontend

Make sure you have the [Angular CLI](https://github.com/angular/angular-cli#installation) installed globally. We use [Yarn](https://yarnpkg.com) to manage the dependencies, so we strongly recommend you to use it. you can install it from [Here](https://yarnpkg.com/en/docs/install), then run `yarn install` to resolve all dependencies (might take a minute).

Run `ng serve` for a dev server. Navigate to `http://localhost:4200/`. The app will automatically reload if you change any of the source files.

Building the project

Run `ng build` to build the project. The build artifacts will be stored in the `dist/` directory. Use the `-prod` flag for a production build.

## Backend

python -m venv venv
python manage.py makemigrations
python manage.py migrate
python manage.py runserver
