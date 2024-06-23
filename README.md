# Prozzila - A Project and Task Management System

![Prozzila Logo](https://github.com/genetxf/prozzila/blob/main/images/prozilla_logo_motto%20n.svg)

![Build Status](https://img.shields.io/badge/build-passing-brightgreen)
![License](https://img.shields.io/badge/license-MIT-blue)

## Overview

**Prozzila** is a comprehensive Project and Task Management System designed to enhance collaboration and streamline project workflows. It offers features like user-specific task assignment, project timelines, real-time collaboration tools, and customizable task management.

## Features

### Admin
- Login/Logout
- Add and manage projects
- Add and manage tasks
- Assign tasks
- Manage Kanban board
- Add and manage user accounts

### User
- Login/Logout
- View project information
- Complete tasks
- View tasks on Kanban board

## Screenshots

### Dashboard
![Dashboard](https://github.com/genetxf/prozzila/assets/156448573/4cedbeab-20e1-46ca-9d6b-1b253f1f3692)

### Task Management
![Task Management](https://github.com/genetxf/prozzila/assets/156448573/f84fd35b-d155-40be-8ad4-d6e070af3f87)

### Kanban Board
![Kanban Board](https://github.com/genetxf/prozzila/assets/156448573/89da856d-3854-40d2-b6ef-bd4e11e12273)

## Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/genetxf/prozzila.git
    cd prozzila
    ```

2. **Setup local server:**
    - Install XAMPP or MAMP
    - Place the project in the `htdocs` directory for XAMPP or the `Sites` directory for MAMP

3. **Database configuration:**
    - Create a MySQL database named `prozzila`
    - Import the provided `prozzila.sql` file into the database

4. **Configure database connection:**
    - Update the database configuration in `database.php` with your database credentials

5. **Start local server:**
    - Start Apache and MySQL services from the XAMPP/MAMP control panel

## Usage

- **Admin Login:**
    - Navigate to `http://localhost/prozzila/admin/`
    - Use admin credentials to log in

- **User Login:**
    - Navigate to `http://localhost/prozzila/user/)`
    - Use user credentials to log in

- **Manage Projects and Tasks:**
    - Admins can create and assign tasks, manage projects, and use the Kanban board for task tracking

- **View and Complete Tasks:**
    - Users can view their assigned tasks on the Kanban board and update task statuses

## Tools and Technologies

- **Local Server:** XAMPP, MAMP
- **IDE:** PhpStorm
- **Front-end:** HTML, CSS, JavaScript, Bootstrap
- **Back-end:** PHP, MySQL
- **Browser:** Google Chrome

## Future Work

- **Mobile Application Integration:** Develop a mobile app for Prozzila to allow users to manage projects on the go.
- **Integration with External Services:** Add support for external collaborative and communication tools.
- **Advanced Analytics and Reporting:** Provide deeper insights through advanced reporting features.
- **AI and ML Integration:** Enhance functionalities with AI and ML algorithms.
- **International Collaboration:** Support multi-language features and international project standards.

## Contributors

- **Syed Foyez Uddin** - [GitHub](https://github.com/genetxf)
- **Mirza Alamin Hossen** - [GitHub](https://github.com/alaminmirza)

## References

1. Kerzner, H. Project Management: “A Systems Approach to Planning, Scheduling, and Controlling”, John Wiley & Sons. 2017.
2. Ralph Moseley, M. T. Savaliya, “Developing Web Applications”, Wiley India Pv. Ltd., 2011.
3. [IEEE Xplore: Project Management Systems](https://ieeexplore.ieee.org/document/4839866)
4. [IEEE Xplore: Task Management Systems](https://ieeexplore.ieee.org/document/5718942)
5. [IEEE Xplore: Collaboration Tools](https://ieeexplore.ieee.org/document/7380291)
6. [IEEE Xplore: Data Security in Project Management](https://ieeexplore.ieee.org/document/7764421)
7. [IEEE Xplore: Advanced Project Analytics](https://ieeexplore.ieee.org/document/8862073)

---

Feel free to contribute, report issues, or suggest features. Your feedback is valuable to us!
