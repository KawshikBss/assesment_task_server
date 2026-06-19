# Full Stack Assessment Task
---
## Server setup (Laravel)

### Installation

```bash
git clone https://github.com/KawshikBss/assesment_task_server.git
cd assesment_task_server
composer install
cp .env.example .env
```

#### Modify keystrings

```bash
php artisan migrate
php artisan key:generate
```

### Add mailtrap or mail smtp

### Run application
```bash
php artisan serve
```