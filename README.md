# 🎓 University Attendance System

## 📌 Overview
The **University Attendance System** is a web-based application designed to manage student attendance in universities using **geolocation technology**.  
Students can only register attendance when they are physically present within the allowed lecture or section area.

---

## 🎯 Problem Statement
Traditional attendance methods are time-consuming and easy to manipulate.  
This system provides an accurate, secure, and automated attendance solution.

---

## 🧠 How the System Works

### 🧑‍🎓 Student Side
1. Student logs into the system.
2. The main interface displays **4 main university groups**.
3. The student selects a group:
   - Closed group → access denied.
   - Open group → available lectures/sections are shown.
4. The student selects the active lecture or section.
5. The system checks the student’s **geolocation**:
   - Inside the allowed range → attendance recorded.
   - Outside the allowed range → attendance rejected.

---

### 👨‍🏫 Doctor / Admin Side
- Secure authentication system.
- Dashboard features:
  - Open / Close attendance sessions.
  - Set lecture geolocation range.
  - View registered students.
  - Manage student attendance data.

---

## 🗺️ Geolocation Logic
- Each lecture has:
  - Latitude & Longitude.
  - Allowed radius.
- Attendance is accepted only if the student is within the defined range.

---

## ✨ Features
- Location-based attendance system
- Group & section management
- Real-time attendance control
- Secure login & authentication
- Role-based access (Student / Doctor / Admin)

---

## 🛠️ Technologies Used
- **Backend:** PHP
- **Framework:** Laravel
- **Database:** MySQL
- **Frontend:** HTML, CSS
- **Geolocation:** Browser Geolocation API

---

## 👥 User Roles
| Role | Permissions |
|------|------------|
| Student | Register attendance |
| Doctor | Manage sessions & view attendance |
| Admin | Full system control |

---

## 🚀 Future Enhancements
- Mobile application support
- QR Code integration
- Attendance reports & analytics
- Notification system

---

## 👨‍💻 Developer
**Ahmed Yasser**  
Backend Developer (PHP & MySQL)  
Laravel Learner
