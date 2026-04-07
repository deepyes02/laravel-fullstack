# Laravel Docker Setup (Apache-Based)

This project provides a professional, "WordPress-style" Docker environment for Laravel, with the application code isolated in a dedicated `src/` directory.

## 🚀 Quick Start

To set up the project:

1.  **Clone the repository**.
2.  **Start the containers**:

    ```bash
    docker-compose up -d --build
    ```

3.  **Manual Installation (Optional)**:
    If your `src/` directory is empty or missing, you can manually bootstrap a clean Laravel project by running:

    ```bash
    docker-compose run --rm composer create-project laravel/laravel ./
    ```

4.  **Access the application**:
    - **Web App**: [http://localhost](http://localhost)
    - **Database Admin (phpMyAdmin)**: [http://localhost:3000](http://localhost:3000)

> [!NOTE]
> Unlike the initial setup, this version assumes the `src/` directory already contains a Laravel application. If you are starting completely fresh, you would need to run `docker-compose run --rm composer create-project laravel/laravel src` once manually.

---

## 📁 Project Architecture

The project is organized to separate infrastructure from application code:

- **`src/`**: Contains the entire Laravel application.
- **`docker/`**: Contains the `Dockerfile` for the PHP-Apache environment.
- **`docker-compose.yml`**: The main orchestration file.

---

## 🛠️ Common Commands

You can run Artisan and Composer commands directly through Docker without needing PHP installed on your host machine.

### Artisan Commands

```bash
# Run migrations
docker-compose run --rm artisan migrate

# Clear cache
docker-compose run --rm artisan cache:clear
```

### Composer Commands

```bash
# Update dependencies
docker-compose run --rm composer update
```

---

## 🗄️ Database Information

The project uses a MySQL 8.0 container.

- **Host**: `db` (internal to Docker)
- **Internal Port**: `3306`
- **External Port (Host)**: `3307`
- **Database Name**: `laravel`
- **Username**: `laravel`
- **Password**: `password`
- **Root Password**: `root`

---
