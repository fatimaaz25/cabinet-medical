# Cabinet Medical Management System

## Introduction

The Cabinet Medical Management System is a web-based application developed using the Laravel Framework. The main purpose of this project is to simplify the management of medical services, appointments, and user interactions within a medical cabinet.

The application provides a secure environment where users can register, log in, manage appointments, access available medical services, and update their personal information. The system also supports multilingual functionality, allowing users to switch between English and Arabic languages.

This project was developed as an academic project to demonstrate the use of modern web technologies and database management techniques.

---

# Project Objectives

The main objectives of this project are:

- Automate medical cabinet management tasks.
- Improve appointment scheduling processes.
- Facilitate communication between users and the medical cabinet.
- Provide a secure authentication system.
- Support multiple languages.
- Apply Laravel best practices in web development.
- Demonstrate CRUD operations using Laravel.
- Implement database relationships using Eloquent ORM.

---

# System Features

## User Authentication

The authentication module allows users to:

- Register a new account.
- Log in securely.
- Log out safely.
- Reset forgotten passwords.
- Manage their personal profile.

### Benefits

- Improved security.
- Personalized user experience.
- Protected application resources.

---

## Appointment Management

Users can perform the following operations:

- Create appointments.
- View existing appointments.
- Update appointment information.
- Cancel appointments.
- Access appointment history.

### Advantages

- Better organization of medical schedules.
- Reduced manual management.
- Improved efficiency.

---

## Service Management

The application provides service management features such as:

- Adding new medical services.
- Editing service details.
- Viewing service information.
- Removing outdated services.

### Examples of Services

- General Consultation
- Medical Check-up
- Follow-up Consultation
- Emergency Care
- Preventive Care

---

## Dashboard

After successful authentication, users are redirected to the dashboard.

The dashboard provides:

- Quick access to appointments.
- Quick access to services.
- User profile overview.
- Navigation shortcuts.

---

## Multilingual Support

The application supports:

- English Language
- Arabic Language

Users can switch languages dynamically through the interface.

### Benefits

- Better accessibility.
- Improved user experience.
- Support for diverse users.

---

# Technologies Used

## Backend Technologies

- PHP 8.2+
- Laravel Framework
- Laravel Breeze Authentication
- Eloquent ORM

## Frontend Technologies

- HTML5
- CSS3
- JavaScript
- Blade Templates

## Database

- MySQL

## Development Tools

- Composer
- Node.js
- NPM
- Vite
- Git
- GitHub

---

# System Architecture

The application follows the MVC architecture:

## Model

Responsible for database operations and business logic.

Examples:

- User Model
- Appointment Model
- Service Model

## View

Responsible for displaying information to users.

Examples:

- Login Page
- Registration Page
- Dashboard
- Appointment Pages

## Controller

Responsible for processing requests and connecting models with views.

Examples:

- AppointmentController
- ServiceController
- ProfileController

---

# Database Structure

The database contains several tables including:

## Users Table

Stores:

- User ID
- Name
- Email
- Password
- Timestamps

## Appointments Table

Stores:

- Appointment ID
- Appointment Date
- Appointment Time
- User ID
- Status

## Services Table

Stores:

- Service ID
- Service Name
- Description
- Price
- Creation Date

---

# Installation Guide

## Step 1: Clone Repository

```bash
git clone https://github.com/fatimaaz25/cabinet-medical.git
cd cabinet-medical
```

## Step 2: Install Dependencies

```bash
composer install
npm install
```

## Step 3: Configure Environment

```bash
cp .env.example .env
```

## Step 4: Generate Application Key

```bash
php artisan key:generate
```

## Step 5: Configure Database

Open the `.env` file and update:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cabinet_medical
DB_USERNAME=root
DB_PASSWORD=
```

## Step 6: Run Migrations

```bash
php artisan migrate
```

## Step 7: Start Application

```bash
php artisan serve
```

## Step 8: Run Frontend Assets

```bash
npm run dev
```

Open your browser and visit:

```text
http://127.0.0.1:8000
```

---

# Security Features

The application includes several security mechanisms:

- Authentication Middleware
- Authorization Checks
- Password Hashing
- CSRF Protection
- Input Validation
- Session Protection

These features help protect user data and application resources.

---

# Testing

The application was tested for:

- User Registration
- User Login
- User Logout
- Appointment Creation
- Appointment Update
- Appointment Deletion
- Service Management
- Language Switching

---

# Future Improvements

Future versions may include:

- Doctor Management Module
- Patient Records Management
- Medical Reports
- Email Notifications
- SMS Notifications
- Online Consultation
- Payment Integration
- Advanced Statistics Dashboard
- Mobile Application

---

# Challenges Encountered

During development, several challenges were encountered:

- Database design optimization.
- Authentication integration.
- Route protection.
- Language management.
- User interface organization.
- CRUD implementation.

These challenges were resolved using Laravel documentation and best development practices.

---

# Conclusion

The Cabinet Medical Management System successfully demonstrates the implementation of a complete Laravel web application. The project provides secure authentication, appointment management, service management, multilingual support, and a responsive user interface.

The application can serve as a foundation for more advanced healthcare management systems in the future.

---

# Author

Fatima Zohra azbito 
