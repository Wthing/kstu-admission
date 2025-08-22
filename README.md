# Entrant Form 📄✨

Веб-платформа для онлайн-подачи заявлений в университет.  
Проект разработан на **Yii2 (PHP framework)** и интегрирован с **S3-хранилищем** для работы с файлами и с модулем **ЭЦП (KalkanCrypt)** для цифровой подписи документов.

---

## 🚀 Возможности

- 📝 Заполнение онлайн-заявления абитуриентом
- 📑 Генерация PDF-версии заявления (через **mPDF**)
- 🔏 Подпись документа с использованием **ЭЦП (KalkanCrypt)**
- ☁️ Хранение файлов в **S3-совместимом объектном хранилище**
- 👤 Регистрация, логин/логаут пользователей
- 🎨 Интерфейс с темами [Bootswatch (Morph – Neumorphic Layer)](https://bootswatch.com/morph/)

---

## 🛠️ Технологии

- **PHP 8.2 (FPM/CLI)**
- **Yii2 Framework**
- **MariaDB / MySQL**
- **Amazon S3 API совместимое хранилище**
- **mPDF** для генерации PDF
- **KalkanCrypt** для ЭЦП

---

## ⚙️ Установка

1. Клонировать репозиторий:
   ```bash
   git clone https://github.com/Wthing/entrant-form.git
   cd entrant-form

    Установить зависимости:

composer install

Настроить конфигурацию БД и компонентов в config/db.php и config/web.php.

Применить миграции:

php yii migrate

Настроить доступ к S3-хранилищу (см. config/params.php).

Настроить расширение kalkancrypt.so для PHP:

extension=kalkancrypt.so

Убедитесь, что модуль соответствует версии PHP.