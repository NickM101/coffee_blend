# ☕ CoffeeBlend

CoffeeBlend is a Laravel-based e-commerce platform for selling premium coffee blends. This README will guide you through the setup process and how to contribute to the project.

## 🚀 Getting Started

### Prerequisites
Ensure you have the following installed:
- **PHP 8.x**
- **Composer**
- **Laravel CLI**
- **MariaDB**
- **Node.js & npm**

## 📦 Clone the Repository

```bash  
git clone https://github.com/NickM101/coffee_blend.git
cd coffeeblend  
```

## 🔧 Setup
### 1. Install Dependencies

```bash
composer install  
npm install 
```

### 2. Set Up Environment

Copy .env.example to .env:

```bash
cp .env.example .env  
```
### 3. Generate Application Key

```bash
php artisan key:generate  
```
### 4. Database Setup

#### 1. Create the Database:
```sql
CREATE DATABASE coffeeblend; 
```

#### 2. Run Migrations:
```bash
php artisan migrate  
```

#### 3. Restore the Backup
```sql
mysql -u root -p coffeeblend < coffeeblend.sql  
```

### 5.  Start the Development Server
```bash
   php artisan serve  
   npm run dev
 ```

Now, visit http://127.0.0.1:8000 in your browser.

## 🤝 Contributing
Here's how you can help:

1. **Fork the Repository**
2. **Create a Feature Branch** (`git checkout -b feature/YourFeatureName`)
3. **Commit Changes** (`git commit -m 'Add some feature'`)
4. **Push to the Branch** (`git push origin feature/YourFeatureName`)
5. **Open a Pull Request**

## 📄 License
CoffeeBlend is open-source and licensed under the [MIT License](https://opensource.org/license/mit).

## 💬 Support
For questions or support, open an issue or email us at [ebs362920@gmail.com]().
