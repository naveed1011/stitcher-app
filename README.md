# 🧵 Stitcher — Tailor & Customer Connect App

> Final Year Project | Bachelor of Computer Science | Abdul Wali Khan University Mardan (AWKUM) | 2019–2023

---

## 📱 About the Project

**Stitcher** is a cross-platform mobile application designed to digitalize the tailor-customer relationship. It connects customers with nearby tailors using Google Maps, allowing customers to browse, select, and track their tailoring orders — all from their phone.

The project also includes a **web-based Admin Panel** for managing tailors, customers, orders, and expenses.

The project was built as a Final Year Project (FYP) at the Department of Computer Science, AWKUM SRH Campus Pabbi, under the supervision of **Dr. Jamal Ahmad**.

---

## 👥 Team Members

| Name | Registration No |
|------|----------------|
| Waqar Ahmad | AWKUM-19137439 |
| Muhammad Junaid | AWKUM-19128225 |
| Naveed Ahmad | AWKUM-19139006 |

---

## 🚀 Features

### 📱 Mobile App (Customer Side)
- 📍 **Google Maps Integration** — Locate nearby tailors on a live map
- 👔 **Tailor Selection** — Browse and choose tailors based on location and ratings
- 📏 **Measurements Module** — Store and manage customer measurements for:
  - Shalwar Qameez, Panjabi / Kurta, Lehenga, Skirts, Patyal and more
- 📦 **Order Tracking** — Track the progress of stitching orders in real time
- ⏰ **Deadline Reminders** — Get notified about order deadlines
- 🔔 **Order Completion Notifications** — Notified when order is ready
- 💰 **Payment & Dues Record** — Track payments and outstanding dues
- ⭐ **Ratings & Reviews** — Rate tailor experience after order completion
- 👤 **User Authentication** — Secure login and registration system

### 🖥️ Admin Panel (Web-based)
- 📊 **Dashboard** — Live counts of customers, tailors, orders and expenses
- ✂️ **Tailor Management** — Add, edit, approve, reject and delete tailors
- 👥 **Customer Management** — View, approve, reject and delete customers
- 📦 **Order Management** — View all orders with status tracking
- 💰 **Expenses Management** — Add, edit and delete expense records
- 🔐 **Secure Admin Login** — Session-based authentication

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Mobile Framework | Flutter |
| Mobile Language | Dart |
| Backend | PHP (MySQLi) |
| Admin Panel | HTML, CSS, JavaScript, Bootstrap 5 |
| Database | MySQL |
| Maps | Google Maps API |
| IDE | Android Studio, VS Code |
| Version Control | Git & GitHub |

---

## 📂 Project Structure

```
stitcher-app/
│
├── stitcheruser/                  # Flutter Mobile App (Customer Side)
│   └── stitcheruser/
│       ├── lib/                   # Main Dart source code
│       │   ├── main.dart          # App entry point
│       │   ├── Dashboard.dart
│       │   ├── Measurement.dart
│       │   ├── AddOrder.dart
│       │   ├── TailorList.dart
│       │   ├── TailorDetail.dart
│       │   ├── tailorTracker.dart
│       │   ├── Screens/           # Login, Signup, Welcome screens
│       │   ├── model/             # Data models
│       │   ├── ApiConfig/         # API connection configuration
│       │   └── widget/            # Reusable widgets
│       ├── assets/
│       │   ├── images/            # App images
│       │   └── icons/             # App icons
│       ├── screenshots/           # App screenshots
│       ├── android/               # Android specific files
│       └── ios/                   # iOS specific files
│
├── stitcher-admin/                # Web Admin Panel
│   ├── panel/                     # PHP Admin Panel Source Code
│   │   ├── login.php              # Admin login
│   │   ├── index.php              # Dashboard
│   │   ├── tailor-list.php        # Tailor management
│   │   ├── add-tailor.php         # Add/Edit tailor
│   │   ├── user-list.php          # Customer management
│   │   ├── order-list.php         # Order management
│   │   ├── expenses-list.php      # Expenses management
│   │   ├── add-expenses.php       # Add/Edit expenses
│   │   ├── api/                   # Flutter app API endpoints
│   │   │   ├── userLogin.php
│   │   │   ├── registerUser.php
│   │   │   ├── getTailorList.php
│   │   │   ├── getProfile.php
│   │   │   ├── tailorTracker.php
│   │   │   └── addOrder.php
│   │   ├── includes/              # Shared files
│   │   │   ├── db.php             # Database connection
│   │   │   ├── header.php         # Sidebar & header
│   │   │   ├── footer.php         # Footer
│   │   │   └── auth.php           # Auth check
│   │   └── database.sql           # MySQL database schema
│   └── screenshots/               # Admin panel screenshots
│
└── README.md
```

---

## 📸 Screenshots

### Admin Panel
> Screenshots available in `/stitcher-admin/screenshots/`

### Mobile App
> Screenshots available in `/stitcheruser/screenshots/`

---

## ⚙️ Getting Started

### Mobile App

#### Prerequisites
- [Flutter SDK](https://flutter.dev/docs/get-started/install)
- Android Studio or VS Code
- Android emulator or physical device

#### Installation
```bash
git clone https://github.com/naveed1011/stitcher-app.git
cd stitcher-app/stitcheruser/stitcheruser
flutter pub get
flutter run
```

### Admin Panel

#### Prerequisites
- XAMPP (Apache + MySQL) or any PHP hosting
- PHP 7.4+
- MySQL 5.7+

#### Installation
```bash
# 1. Copy panel folder to htdocs
cp -r stitcher-admin/panel /xampp/htdocs/stitcher-admin

# 2. Import database
# Open phpMyAdmin, create database 'stitcher_db', import database.sql

# 3. Open in browser
# http://localhost/stitcher-admin/login.php
```

**Default Admin Credentials:**
- Username: `admin`
- Password: `admin123`

> **Note:** Update `includes/db.php` with your hosting credentials before deploying.

---

## 🔌 API Endpoints

The Flutter app communicates with the PHP backend via:

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/api/userLogin.php` | POST | User login |
| `/api/registerUser.php` | POST | User registration |
| `/api/getTailorList.php` | POST | Fetch approved tailors |
| `/api/getProfile.php` | POST | Get user profile |
| `/api/tailorTracker.php` | POST | Track order status |
| `/api/addOrder.php` | POST | Place new order |

---

## 📄 Documentation

Full thesis and proposal documents are available in the `/stitcher-admin/` folder.

---

## 🎓 Academic Info

- **Degree:** Bachelor of Computer Science (BCS)
- **University:** Abdul Wali Khan University Mardan (AWKUM)
- **Campus:** SRH Campus Pabbi
- **Supervisor:** Dr. Jamal Ahmad, Assistant Professor
- **Session:** Fall 2019 – 2023

---

## 📝 License

This project was developed for academic purposes as a Final Year Project at AWKUM.

---

*Built with ❤️ by Waqar Ahmad, Muhammad Junaid & Naveed Ahmad*
