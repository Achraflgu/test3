# 🏋️ MSPORT - E-Commerce Sports Platform

<div align="center">

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-15-316192?style=for-the-badge&logo=postgresql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Railway](https://img.shields.io/badge/Railway-0B0D0E?style=for-the-badge&logo=railway&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

**A full-featured e-commerce platform for sports equipment and nutrition**

[Live Demo](#) • [Documentation](deployment-guide.md) • [Report Bug](#) • [Request Feature](#)

</div>

---

## 📋 Table of Contents

- [About The Project](#about-the-project)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Screenshots](#screenshots)
- [Getting Started](#getting-started)
- [Deployment](#deployment)
- [Database Schema](#database-schema)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## 🎯 About The Project

MSPORT is a comprehensive e-commerce platform developed as a university final year project (PFE). It provides a complete online shopping experience for sports enthusiasts, featuring product catalogs, shopping cart, order management, blog system, and an admin dashboard.

### 🎓 Project Context
- **Type**: University Final Year Project (PFE)
- **Purpose**: Portfolio & Academic Demonstration
- **Year**: 2024-2025
- **Status**: Production Ready

---

## ✨ Features

### 🛍️ Customer Features
- **Product Catalog**
  - Browse products by category (Clothing, Footwear, Nutrition, Equipment, Accessories)
  - Advanced filtering (price, brand, size, color)
  - Product search functionality
  - Product reviews and ratings

- **Shopping Experience**
  - Shopping cart with real-time updates
  - Wishlist functionality
  - Coupon/discount system
  - Multiple payment methods
  - Multiple delivery options

- **User Account**
  - User registration and authentication
  - Profile management
  - Order history tracking
  - Address management

- **Blog & Content**
  - Fitness and nutrition blog
  - Blog comments and engagement
  - Newsletter subscription

### 👨‍💼 Admin Features
- **Dashboard**
  - Sales analytics and charts
  - Revenue tracking
  - Order statistics

- **Product Management**
  - Add/Edit/Delete products
  - Manage product categories
  - Manage brands
  - Stock management

- **Order Management**
  - View and update orders
  - Order status tracking
  - Invoice generation

- **Customer Management**
  - View customer information
  - Customer ratings and reviews

- **Marketing**
  - Coupon management
  - Newsletter management
  - Blog management
  - Slider/Banner management

---

## 🛠️ Tech Stack

### Frontend
- **HTML5/CSS3** - Semantic markup and styling
- **JavaScript** - Interactive functionality
- **Bootstrap** - Responsive design
- **jQuery** - DOM manipulation and AJAX

### Backend
- **PHP 8.2** - Server-side logic
- **PDO** - Database abstraction layer
- **PHPMailer** - Email functionality

### Database
- **PostgreSQL 15** (Neon.tech)
  - Previously MySQL/MariaDB (migrated)
  - Full ACID compliance
  - Complex relationships

### Deployment
- **Railway.app** - Hosting platform
- **Neon** - PostgreSQL database
- **Git** - Version control

### Libraries & Tools
- **Composer** - Dependency management
- **RevSlider** - Dynamic sliders
- **Chart.js** - Data visualization

---

## 📸 Screenshots

### Customer Interface
<!-- Add your screenshots here -->
```
Coming soon - Add screenshots of:
- Homepage
- Product catalog
- Product details
- Shopping cart
- Checkout process
```

### Admin Dashboard
<!-- Add your screenshots here -->
```
Coming soon - Add screenshots of:
- Dashboard analytics
- Product management
- Order management
```

---

## 🚀 Getting Started

### Prerequisites
- PHP 8.0 or higher
- PostgreSQL 12 or higher
- Composer (optional)
- Web server (Apache/Nginx) or PHP built-in server

### Local Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/msport.git
   cd msport
   ```

2. **Configure environment variables**
   ```bash
   cp env.example .env
   # Edit .env with your database credentials
   ```

3. **Import database**
   ```bash
   # Using psql
   psql -U your_user -d msport -f msport_postgres.sql
   ```

4. **Update database connection**
   ```bash
   # Replace db_connection.php with db_connection_postgres.php
   cp db_connection_postgres.php db_connection.php
   ```

5. **Start development server**
   ```bash
   php -S localhost:8000
   ```

6. **Access the application**
   - Frontend: `http://localhost:8000`
   - Admin: `http://localhost:8000/admin`
     - Email: `admin1@gmail.com`
     - Password: `123`

---

## 🌐 Deployment

This project is deployed on Railway with Neon PostgreSQL. See [deployment-guide.md](deployment-guide.md) for detailed instructions.

### Quick Deploy to Railway

[![Deploy on Railway](https://railway.app/button.svg)](https://railway.app/new)

### Environment Variables Required
```
DB_HOST=<neon-host>
DB_NAME=msport
DB_USER=<neon-user>
DB_PASSWORD=<neon-password>
DB_PORT=5432
```

---

## 🗄️ Database Schema

### Main Tables
- **customers** - User accounts and profiles
- **products** - Product catalog
- **productcategories** - Product categorization
- **brands** - Product brands
- **orders** - Customer orders
- **orderitems** - Order line items
- **cart** - Shopping cart
- **wishlist** - Customer wishlists
- **coupons** - Discount codes
- **blog** - Blog posts
- **admins** - Admin users

### Relationships
- Products → Categories (Many-to-One)
- Products → Brands (Many-to-One)
- Orders → Customers (Many-to-One)
- OrderItems → Orders (Many-to-One)
- OrderItems → Products (Many-to-One)

[View Full Schema Diagram](#)

---

## 📊 Database Migration (MySQL → PostgreSQL)

Key changes made during migration:
- `AUTO_INCREMENT` → `SERIAL`
- `TINYINT(1)` → `BOOLEAN`
- Engine specifications removed
- Character set declarations updated
- Index syntax adapted

---

## 🤝 Contributing

Contributions are welcome! This is a portfolio project, but improvements are appreciated.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📝 License

Distributed under the MIT License. See `LICENSE` for more information.

---

## 👤 Contact

**Your Name**
- Email: your.email@example.com
- LinkedIn: [Your LinkedIn](https://linkedin.com/in/yourprofile)
- GitHub: [@yourusername](https://github.com/yourusername)

**Project Link**: [https://github.com/yourusername/msport](https://github.com/yourusername/msport)

**Live Demo**: [https://msport.railway.app](https://your-deployment-url)

---

## 🙏 Acknowledgments

- University supervisors and professors
- Open source community
- [Railway](https://railway.app) for hosting
- [Neon](https://neon.tech) for database
- All contributors and supporters

---

<div align="center">

**Made with ❤️ for learning and growth**

⭐ Star this repo if you found it helpful!

</div>

