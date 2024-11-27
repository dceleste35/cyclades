# Installation
Méthode recommandée avec Laravel Herd

### Installer Laravel Herd

Télécharger Laravel Herd depuis https://herd.laravel.com
Installer et lancer Laravel Herd
Herd installera automatiquement PHP, Composer, et configurera votre environnement

### Vérifier le dossier racine de Herd
![image](https://github.com/user-attachments/assets/e975ee5a-2489-43aa-983a-d09493d6e581)

### Cloner le projet

```bash
cd /Herd
git clone https://github.com/dceleste35/cyclades.git
cd cyclades
```
### Installer NPM

### Installer les dépendances

```bash
composer install
npm install
```

### Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

### Créer la base de données et migrer

```bash
php artisan migrate --seed
```

### Compiler les assets

```bash
npm run build
```

### Lien

acceder au site avec 
http://cyclades.test
