# Task Manager

Task Manager is a web application built with Laravel, designed to help users organize and manage their tasks efficiently. Whether you're working on personal projects or collaborating with a team, Task Manager provides a simple and intuitive interface for tracking and prioritizing tasks.

## Features

- Create, edit, and delete tasks
- Assign priorities to tasks
- Organize tasks by projects
- User-friendly interface for seamless task management
- Responsive design for a great user experience on various devices

## Prerequisites

- PHP (>= 7.3)
- Composer
- MySQL  database

## Getting Started

1. **Setup the project:**

  - Unzip the project and copy the unzipped folder to your local server directory(htdocs for Xampp, Mamp. www for WampServer)
  - then cd to the test directory using the following command
    ```cli
      cd test
    ```

2. **Install Dependencies:**

    ```cli
    composer install
    ```

3. **Environment Configuration:**

    - Duplicate the `.env.example` file and rename it to `.env`.
    - Update the database connection settings in the `.env` file.

4. **Generate Application Key:**

    ```cli
    php artisan key:generate
    ```

5. **Database Migrations and Seeders:**

    ```cli
    php artisan migrate
    ```



6. **Serve the Application:**

    ```cli
    php artisan serve
    ```

    Access the application at [http://localhost:8000](http://localhost:8000).

