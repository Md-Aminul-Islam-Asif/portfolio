# 💼 Personal Portfolio Website

A full-stack personal portfolio website built with **PHP, MySQL, Tailwind CSS, and DaisyUI**.  
This project includes authentication, admin dashboard, project management, and a modern responsive UI.

---

## 🚀 Live Demo
🔗 https://aminul-islam-asif.free.nf

---

## ✨ Features

### 🔐 Authentication
- Login & Logout system
- Session-based access control
- Forgot password & reset via email (PHPMailer)

### 📊 Admin Dashboard
- Add new projects dynamically
- Delete projects (protected projects cannot be deleted)
- Projects stored in MySQL database

### 🖼 Portfolio Pages
- Home (Hero section, quick links)
- About (Skills, education, resume & research download)
- Projects (Dynamic + static projects)
- Contact (Feedback form with email notification)

### 📄 Resume & Research
- Download CV (PDF)
- View Research Paper (PDF)

### 🎨 UI / UX
- Responsive design (Mobile, Tablet, Desktop)
- Tailwind CSS + DaisyUI
- Light / Dark mode toggle
- Clean and modern layout

---

## 🛠️ Tech Stack

**Frontend**
- HTML5
- Tailwind CSS
- DaisyUI
- JavaScript
- Font Awesome

**Backend**
- PHP (Procedural + Prepared Statements)
- MySQL (phpMyAdmin)
- PHPMailer (SMTP with Gmail)

---

## 🗄️ Database Structure

### `users` table
```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  reset_token VARCHAR(255),
  token_expire DATETIME
);
