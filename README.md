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

Alternatively, you can use the test account:

**Username:** `test`
**Password:** `test`

//screenshot//

### Step 9 – Run the Quiz

After logging in, you can access the platform and start the quiz.

Choose the desired category and start answering the questions.
