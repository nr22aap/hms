HMS – Hospital Management System
HMS is a secure, full-stack Hospital Management System built with PHP and MySQL. Developed as a final-year individual project, it is designed to streamline hospital operations for administrators and doctors by managing patient records, pharmacy inventory, billing, and more.

 Features
 Role-Based Authentication (Admin, Doctor)
 Patient Record Management with CRUD operations
 Pharmacy and Inventory Tracking
 Financial Dashboard for billing and payments
 Real-Time Reporting with accurate record summaries
 Modular structure following MVC principles
 Form validation, error handling, and secure access control

🛠️ Technologies Used
Backend: PHP (procedural & modular)

Database: MySQL (optimized schema with constraints)

Frontend: HTML, CSS (Vanilla), Bootstrap

Tools: XAMPP, phpMyAdmin

Project Structure
pgsql
Copy
Edit
/admin         → Admin panel for managing records and users  
/doctor        → Doctor portal to access patient info and prescriptions  
/db            → Database connection and SQL setup  
/includes      → Reusable PHP components (header, footer, sidebar)  
/assets        → CSS and UI assets  
How to Run Locally
Clone the repository:

bash
Copy
Edit
git clone https://github.com/nr22aap/hms.git
Move the project folder to:

makefile
Copy
Edit
C:\xampp\htdocs\hms
Open XAMPP, start Apache and MySQL.

Import the database via phpMyAdmin (SQL file provided in /db folder if available).

Visit:

arduino
Copy
Edit
http://localhost/hms/

 Security Practices
Form validation on all input fields

Role-based access and session control

Structured folder access using includes

Secure database queries with enforced constraints
