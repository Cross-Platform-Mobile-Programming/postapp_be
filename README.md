# BackEnd PostApp

BackEnd PostApp is a backend application built with Laravel, designed for practicing backend REST API development in the Cross-Platform Mobile Programming course at Dipa Makassar University.

## Description

This project serves as the backend for the PostApp application. It utilizes the Laravel framework to provide RESTful APIs, authentication, and database management. The codebase is organized for maintainability and scalability, making it suitable for both learning and production environments.

## Getting Started

Follow these steps to clone and set up the project locally:

1. **Clone the repository:**

    ```bash
    git clone https://github.com/magusidris/postapp_be.git
    ```

2. **Navigate to the project directory:**

    ```bash
    cd postapp_be
    ```

3. **Install PHP dependencies:**

    ```bash
    composer install
    ```

4. **Copy the example environment file and configure your environment variables:**

    ```bash
    cp .env.example .env
    ```

5. **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

6. **Generate the storage links:**

    ```bash
    php artisan storage:link
    ```

7. **Run database migrations:**

    ```bash
    php artisan migrate
    ```

8. **Start the local development server:**
    ```bash
    php artisan serve
    ```

---

_Replace `magusidris` and `postapp_be` with your actual GitHub username and repository name._
