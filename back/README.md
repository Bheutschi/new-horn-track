# HornTrack

---

## 🧰 Prérequis

- Docker

---

## 🚀 Lancer le projet

### 1. Cloner le dépôt

```bash
git clone git@github.com:jobtrek/horntrack.git
cd horntrack
```

### 2. Copier le fichier `.env`

```bash
cp .env.example .env
```

### 3. Installer les dépendances avec docker

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

### 4. Lancer Sail (en arrière-plan)

```bash
./vendor/bin/sail up -d
```

### 5. Générer la clé d'application

```bash
./vendor/bin/sail artisan key:generate
```

### 6. Lancer les migrations + seeders

```bash
./vendor/bin/sail artisan migrate --seed
```

---

## 🛠️ Commandes utiles

```bash
# Lancer Sail
./vendor/bin/sail up -d

# Arrêter Sail
./vendor/bin/sail down

# Accéder à un shell dans le conteneur
./vendor/bin/sail shell

# Rafraîchir les migrations + seed
./vendor/bin/sail artisan migrate:fresh --seed
```
