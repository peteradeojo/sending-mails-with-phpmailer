<!-- Write a complete README file for this project detailing installation of the repo and dependencies and configuration of the environment variables -->

# README

## Setup

Clone the repo

```bash
> git clone https://github.com/peteradeojo/sending-mails-with-php
```

Install dependencies

```bash
> composer install
```

Create a copy of your .env file and update the values with credentials from your SMTP Provider (usually your CPanel)

```bash
> cp .env.example .env
```
The new .env file should resemble this
  
```bash
# SMTP Configuration
SMTP_HOST=smtp.example.com
SMTP_PORT=587
SMTP_USERNAME=your-username
SMTP_PASSWORD=your-password
SMTP_ENCRYPTION=tls
```

## Usage

```bash
php -S localhost:8000 index.php
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.