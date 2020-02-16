Admin panel for food. Simple CRUD. RESTapi level two in Richardson Maturity Model. Created for learning purposes.

Install guide:
1. clone repo
2. Set DATABASE_URL in env
3. Composer install
4. Enter php bin/console make:migration
5. Enter php bin/console doctrine:migrations:migrate
6. Enter php bin/console doctrine:fixtures:load
7. Enter php/bin run:server or symfony server:start
8. Open in browser: http://127.0.0.1:8000/admin/login
9. username: Admin
10. Password: password0
