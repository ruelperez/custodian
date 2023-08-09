## Property Custodian

### Download and install the following tools:
- [XAMPP](https://www.apachefriends.org/download.html)
- IDE code editor such as
  [VS Code](https://code.visualstudio.com),
  [WebStorm](https://www.jetbrains.com/webstorm) or
  [Sublime Text](https://www.sublimetext.com).
- [Composer](https://getcomposer.org/download/)

### Installation

1. Clone or download this repository [custodian](https://github.com/ruelperez/custodian)
2. Create database name `costudian`
3. Import `costudian.sql` located at [database/costudian.sql](database/costudian.sql)
4. Open the cloned project in your code editor.
5. Open terminal and execute the following commands:

#### Install Backend dependencies:
    composer install
#### Create Environment File:
    cp .env.example .env
#### Generate Application Key:
    php artisan key:generate
#### Serve the Application:
    php artisan serve
### Production
### Login
- Open <http://127.0.0.1:8000> in your web browser.
- Username - admin
- Password - admin

### Technologies Used
#### Front-end
- [Laravel Livewire](https://laravel-livewire.com/)
- [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
- [Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/introduction/)
#### Back-end
- [Laravel](https://laravel.com/)
- [Laravel Livewire](https://laravel-livewire.com/)

