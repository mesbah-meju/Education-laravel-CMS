# Education Laravel CMS

A comprehensive Content Management System (CMS) built with Laravel for educational institutions. This system provides a complete solution for managing schools, colleges, and educational organizations with features for student management, teacher management, class routines, exam results, notices, events, and more.

## 🚀 Features

### Frontend Features
- **Multiple Template Support**: Choose from School, College, or Modern templates
- **Responsive Design**: Mobile-friendly interface
- **Public Pages**:
  - Landing page with important notices and information
  - Head Master/Principal information
  - Teacher team showcase
  - Managing committee display
  - Student information
  - Class summaries
  - Admission information
  - Class routines and exam routines
  - Exam results
  - Notices and events
  - Image gallery with categories
  - Contact us page
  - Online class links

### Backend Features (Admin Dashboard)
- **Student Management**:
  - Add, edit, and manage students
  - Class and section management
  - Fee management
  - Student status control

- **Teacher Management**:
  - Teacher profiles and information
  - Designation management
  - Teacher status control

- **Committee Management**:
  - Managing committee member profiles
  - Committee status control

- **Content Management**:
  - Important notices
  - Regular notices
  - Events management
  - FAQ management
  - Official links
  - Important information links
  - File uploads and downloads

- **Academic Management**:
  - Class routines (upload and manage)
  - Exam routines (upload and manage)
  - Class results (upload and manage)

- **Gallery Management**:
  - Gallery categories
  - Image upload and management
  - Category-based image organization

- **Settings**:
  - Site settings (logo, name, contact info, social links)
  - SEO settings
  - Appearance settings (template selection)

- **Authentication**:
  - User registration and login
  - Password reset functionality
  - Email verification

## 🛠️ Technology Stack

- **Backend**: Laravel 12.x
- **Frontend**: Blade Templates, Bootstrap 5, Tailwind CSS 4
- **JavaScript**: Vite, Axios
- **Database**: MySQL/PostgreSQL/SQLite
- **PHP**: 8.2+

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js and NPM
- Database (MySQL, PostgreSQL, or SQLite)
- Web Server (Apache/Nginx) or PHP Built-in Server

## 🔧 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/mesbah-meju/Education-laravel-CMS.git
   cd Education-laravel-CMS
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure Database**
   Edit `.env` file and set your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run Migrations**
   ```bash
   php artisan migrate
   ```

7. **Build Assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

8. **Run Installation Wizard**
   Visit `http://your-domain.com/install` in your browser and follow the installation wizard.

## 🎯 Usage

### Accessing the Application

- **Frontend**: Visit your domain root URL
- **Admin Dashboard**: `/dashboard` (after login)
- **Installation**: `/install` (first time setup)

### Default Credentials

After installation, you'll be prompted to create an admin account during the setup process.

### Development

For development with hot reload:
```bash
composer run dev
```

This will start:
- Laravel development server
- Queue worker
- Log viewer (Pail)
- Vite dev server

## 📁 Project Structure

```
education-website/
├── app/
│   ├── Http/Controllers/    # Application controllers
│   ├── Models/               # Eloquent models
│   └── Helpers/              # Helper functions
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/             # Database seeders
├── resources/
│   ├── views/
│   │   ├── frontend/         # Frontend templates (school, college, modern)
│   │   └── backend/          # Admin dashboard views
│   ├── js/                   # JavaScript files
│   └── css/                  # Stylesheets
├── public/                   # Public assets
├── routes/                   # Application routes
└── storage/                   # Storage directory
```

## 🔐 Security

- Password hashing using bcrypt
- CSRF protection
- SQL injection prevention (Eloquent ORM)
- XSS protection
- Secure file uploads

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

**Mesbah Uddin Meju**

- 📧 Email: [uddin.mesbaah@gmail.com](mailto:uddin.mesbaah@gmail.com)
- 🌐 Website: [mesbahuddin.info](https://mesbahuddin.info)
- 💼 LinkedIn: [mesbah-uddin-meju](https://linkedin.com/in/mesbah-uddin-meju)
- 🐙 GitHub: [mesbah-meju](https://github.com/mesbah-meju)

## 🤝 Contributing

Contributions, issues, and feature requests are welcome! Feel free to check the [issues page](https://github.com/mesbah-meju/Education-laravel-CMS/issues).

## 🙏 Acknowledgments

- Laravel Framework
- Bootstrap
- Tailwind CSS
- All contributors and users of this project

---

⭐ If you find this project helpful, please consider giving it a star!
