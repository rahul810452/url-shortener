# URL Shortener - Laravel 12 Assignment

## Overview

This project is a multi-tenant URL Shortener application developed using Laravel 12 and MySQL.

The system allows:

* Super Admin to manage companies
* Super Admin to invite company admins
* Company Admins to invite team members
* Team members to access the platform
* Generate and manage short URLs
* Track URL click counts
* Role-based access control

---

# Technology Stack

| Technology                | Version    |
| ------------------------- | ---------- |
| PHP                       | 8.2.x      |
| Laravel                   | 12.x       |
| MySQL                     | 5.7+ / 8.x |
| Node.js                   | 19.2.x     |
| NPM                       | 9.x        |
| Tailwind CSS              | Latest     |
| Laravel Breeze            | Latest     |
| Spatie Laravel Permission | Latest     |

---

# Features

## Authentication

* Login
* Logout
* Password Hashing

## Company Management

Super Admin can:

* Create Company
* Edit Company
* View Companies

## Invitation System

Super Admin can:

* Invite Admin Users

Admin can:

* Invite Team Members

## User Registration

Users can:

* Accept Invitation
* Set Password
* Login

## Role Management

Implemented using Spatie Laravel Permission.

Roles:

* SuperAdmin
* Admin
* Member
* Sales
* Manager

## URL Shortener

* Generate Short URL
* Unique Short Code Generation
* URL Redirection
* Click Tracking
* Company-wise URL Management

---

# Project Workflow

## Super Admin

1. Login
2. Create Company
3. Invite Company Admin

## Admin

1. Accept Invitation
2. Login
3. Invite Members
4. Create Short URLs

## Member

1. Accept Invitation
2. Login
3. Access Platform

---

# Server Requirements

## PHP Extensions

Enable the following extensions:

* BCMath
* Ctype
* Fileinfo
* JSON
* Mbstring
* OpenSSL
* PDO
* PDO_MySQL
* Tokenizer
* XML

---

# Installation Guide

## Step 1: Clone Repository

```bash
git clone https://github.com/rahul810452/url-shortener.git

cd url-shortener
```

---

## Step 2: Install PHP Dependencies

```bash
composer install
```

---

## Step 3: Install Node Dependencies

```bash
npm install
```

---

## Step 4: Create Environment File

```bash
cp .env.example .env
```

Windows:

```bash
copy .env.example .env
```

---

## Step 5: Generate Application Key

```bash
php artisan key:generate
```

---

## Step 6: Configure Database

Update .env:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=url_shortener
DB_USERNAME=root
DB_PASSWORD=
```

Create database manually:

```sql
CREATE DATABASE url_shortener;
```

---

## Step 7: Configure Mail (SMTP)

### Gmail SMTP Setup

Enable:

* 2-Step Verification

Generate:

* Google App Password

Update .env:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=yourgmail@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=yourgmail@gmail.com
MAIL_FROM_NAME="URL Shortener"
```

Example:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=test@gmail.com
MAIL_PASSWORD=abcdefghijklmnop
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=test@gmail.com
MAIL_FROM_NAME="URL Shortener"
```

---

## Step 8: Run Migrations

```bash
php artisan migrate
```

---

## Step 9: Seed Initial Data

```bash
php artisan db:seed
```

This creates:

* Roles
* Super Admin User

---

## Step 10: Build Frontend Assets

Development:

```bash
npm run dev
```

Production:

```bash
npm run build
```

---

## Step 11: Clear Cache

```bash
php artisan optimize:clear
```

---

## Step 12: Start Application

```bash
php artisan serve
```

Application URL:

```text
http://127.0.0.1:8000
```

---

# Default Credentials

## Super Admin

Email:

```text
superadmin@example.com
```

Password:

```text
12345678
```

---

# Testing Workflow

## Company Creation

1. Login as Super Admin
2. Open Companies
3. Create Company

---

## Invite Admin

1. Open Companies
2. Click Invite Admin
3. Enter Email
4. Invitation Email Sent

---

## Admin Registration

1. Open Invitation Link
2. Set Password
3. Login

---

## Invite Member

1. Login as Admin
2. Open Team Members
3. Invite Member
4. Member Receives Email

---

## Member Registration

1. Open Invitation Link
2. Set Password
3. Login

---

## URL Shortener Testing

1. Login as Admin
2. Open Short URLs
3. Create URL

Example:

```text
https://google.com
```

Generated:

```text
http://localhost:8000/s/abc123xyz
```

Open URL:

* Redirects to Original URL
* Click Count Increases

---

# Database Tables

## companies

* id
* company_name
* company_email
* company_phone

## users

* id
* company_id
* name
* email
* password

## invitations

* id
* company_id
* email
* role
* token
* accepted

## short_urls

* id
* company_id
* user_id
* original_url
* short_code
* clicks

---

# Troubleshooting

## CSS Not Loading

Run:

```bash
npm install
npm run build
```

Clear cache:

```bash
php artisan optimize:clear
```

---

## Route Cache Issues

```bash
php artisan route:clear
php artisan config:clear
php artisan cache:clear
```

---

## Permission Issues

```bash
php artisan db:seed
```

Verify:

```sql
SELECT * FROM roles;
```

---

## SMTP Not Working

Check:

* Gmail App Password
* TLS Port 587
* MAIL_USERNAME
* MAIL_PASSWORD

Then run:

```bash
php artisan optimize:clear
```

---

# AI Usage Disclosure

The following AI tools were used during development:

* ChatGPT

Used for:

* Laravel architecture planning
* Database design guidance
* Eloquent relationship references
* Validation examples
* Permission implementation guidance

All business logic, integration, debugging, testing, and final implementation were completed manually.

---

# Author

Rahul Bansal

Laravel Developer
