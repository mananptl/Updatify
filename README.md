# Updatify

A modern PHP-based software and game update management system with upload, download, and version tracking functionality.

---

## Features

- Upload new software/game versions
- Manage updates dynamically using JSON
- Download latest software versions
- Responsive modern UI design
- Search functionality for versions
- Admin upload panel
- File upload handling system
- Version-wise update details display

---

## Technologies Used

- PHP
- HTML5
- CSS3
- JavaScript
- JSON

---

## Project Structure

Updatify/
│
├── index.php
├── prince.php
├── upload.php
├── upload_handler.php
├── updates.json
│
├── uploads/
│   └── installer files
│
└── README.md

---

## How It Works

1. Admin uploads a new software/game version.
2. File is stored in the uploads folder.
3. Update details are saved in updates.json.
4. Users can browse versions and download files.

---

## Main Modules

### User Side
- View available versions
- Read update details
- Download software/game installers
- Search versions instantly

### Admin Side
- Upload new versions
- Add update descriptions
- Upload installer files
- Manage update data automatically

---

## Installation

### Clone Repository

git clone https://github.com/your-username/Updatify.git

### Move Project to Server

Place project folder inside:

htdocs/ (XAMPP)

or

www/ (WAMP)

### Start Apache Server

Start Apache from XAMPP/WAMP.

### Open in Browser

http://localhost/Updatify

---

## Recommended .gitignore

uploads/
*.exe

---

## Future Improvements

- Admin authentication system
- Database integration (MySQL)
- File size validation
- User download analytics
- Dark/Light mode
- Cloud storage integration

---

## Developer

Manan Patel

---

## License

This project is developed for educational and portfolio purposes.
