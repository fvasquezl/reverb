<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Instrucciones para producción en VPS (Reverb y Queue)

### 1. Configuración del entorno
- Asegúrate de tener PHP, Composer y Node.js instalados.
- Configura tu archivo `.env` con los valores correctos para tu dominio y Reverb:
  ```env
  APP_URL=https://tudominio.com
  BROADCAST_CONNECTION=reverb
  REVERB_HOST=tudominio.com
  REVERB_PORT=8080
  REVERB_SCHEME=https
  QUEUE_CONNECTION=database
  ```

### 2. Instala dependencias
```bash
composer install
npm install && npm run build
```

### 3. Archivos de servicio systemd
Copia los archivos de ejemplo generados en `/home/fvasquezl/Code/Laravel/reverb/` a `/etc/systemd/system/`:
```bash
sudo cp /home/fvasquezl/Code/Laravel/reverb/laravel-queue.service /etc/systemd/system/
sudo cp /home/fvasquezl/Code/Laravel/reverb/laravel-reverb.service /etc/systemd/system/
```

### 4. Ajusta el usuario si es necesario
Edita los archivos y cambia `User=www-data` por el usuario correcto si tu VPS usa otro usuario para PHP.

### 5. Habilita y arranca los servicios
```bash
sudo systemctl daemon-reload
sudo systemctl enable laravel-queue
sudo systemctl enable laravel-reverb
sudo systemctl start laravel-queue
sudo systemctl start laravel-reverb
```

### 6. Verifica el estado
```bash
sudo systemctl status laravel-queue
sudo systemctl status laravel-reverb
```

### 7. Abre el puerto 8080 en el firewall
```bash
sudo ufw allow 8080
```

### 8. Consideraciones de seguridad
- Usa HTTPS para WebSockets en producción.
- Asegúrate de que tu dominio apunte correctamente al VPS.

### Notas para usuarios de Arch Linux
- Usa tu usuario real en los archivos de servicio systemd (por ejemplo, `User=tu_usuario`), no `www-data`.
- Verifica la ruta a PHP con `which php` y ajústala en `ExecStart` si es diferente.
- Para ver logs de los servicios usa:
  ```bash
  journalctl -u laravel-reverb -e
  journalctl -u laravel-queue -e
  ```
- El firewall puede ser `ufw`, `iptables` o `firewalld` según tu configuración. Ajusta el comando para abrir el puerto 8080 según corresponda.

---

Si tienes dudas sobre algún paso, revisa la documentación oficial de Laravel, Reverb o consulta con tu proveedor de VPS.

### Troubleshooting

- Si el servicio de queue no arranca, prueba correr el comando manualmente para verificar que todo esté bien:
  ```bash
  /usr/bin/php /home/fvasquezl/Code/Laravel/reverb/artisan reverb:start

  /usr/bin/php /home/fvasquezl/Code/Laravel/reverb/artisan queue:work
  ```
  Si funciona, asegúrate de que el archivo de servicio systemd use la misma ruta y usuario.


Idea: se deben agregar un campo al post para de activacion un checbox que ective y desactive
Este campo debe contar cuantas casas esta asignado el post, por ejemplo (Tijuana) entonces el siguiente activo puede ser (Rosarito) o (Rosarito Cuestablanca), pensar