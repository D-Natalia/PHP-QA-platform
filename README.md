# PHP-QA-platform
Simple PHP question and answer platform with user registration and autentification

## Installation and Running

Follow the steps below to install and run the project locally using XAMPP.

### Step 1 – Install XAMPP

Download and install XAMPP on your laptop.

---

### Step 2 – Download the Project from GitHub

Download the project by clicking **Code → Download ZIP**.

### Step 3 – Place the Project in the `htdocs` Folder

Extract the downloaded ZIP file and copy the `MyWebsite` folder to:

`C:\xampp\htdocs\`

The folder structure should be:

`C:\xampp\htdocs\MyWebsite\`

### Step 4 – Start Apache and MySQL

Open the **XAMPP Control Panel** and start:

* **Apache → Start**
* **MySQL → Start**

<img width="697" height="151" alt="xampp" src="https://github.com/user-attachments/assets/904be70d-a5a6-4d6d-81f2-521b4489400c" />

### Step 5 – Open the Project

Open your browser and go to:

`http://localhost/MyWebsite/`

### Step 6 – Configure the Database

Open phpMyAdmin:

`http://localhost/phpmyadmin`

//screenshot//

The required database file is located in the project folder on GitHub:

`user_login.sql`

In phpMyAdmin:

1. Go to **Import**.
2. Select the `user_login.sql` file.
3. Click **Import** to create the database and the required tables.

### Step 7 – Access the Login Page

The login page can be accessed at:

`http://localhost/MyWebsite/Frontend/login.php`

### Step 8 – Create an Account or Use the Test Account

You can create a new account by selecting **Register here**.

<img width="391" height="443" alt="register" src="https://github.com/user-attachments/assets/c9c1df35-ab70-49d2-b99c-9b998fb0b569" />

Alternatively, you can use the test account:

**Username:** `test`
**Password:** `test`

<img width="491" height="507" alt="login_test" src="https://github.com/user-attachments/assets/7c2fa990-468f-4a4e-9c85-e7427a28ff80" />

### Step 9 – Run the Quiz

After logging in, you can access the platform and start the quiz.

Choose the desired category and start answering the questions.
<img width="673" height="825" alt="quiz_home_page" src="https://github.com/user-attachments/assets/5e6c23e0-0977-4b83-8c80-0bf22d19e20d" />
<img width="415" height="503" alt="quiz_page" src="https://github.com/user-attachments/assets/0237c7fe-eba0-424a-96ac-964f840a75ba" />
<img width="569" height="751" alt="end_quiz" src="https://github.com/user-attachments/assets/14b072c4-139c-4fbc-90fa-5de10ab871d3" />




