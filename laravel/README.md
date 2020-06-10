# Werkstuk - Web Development 2 - Yousician
Promotie website voor de app Yousician.

## Installatie

1. Installeer de composer packages:
    ```
    composer install
    ```

2. Installeer de node packages:
    ```
    npm install
    ```

3. Maak een .env bestand en vul de juiste gegevens in op basis van .env.example.

4. Maak een nieuwe app key aan:
    ```
    php artisan key:generate
    ```

5. Genereer de styles:
    ```
    npm run dev
    ```

6. Genereer de database:
    ```
    php artisan migrate
    ```

7. Seed de database:
    ```
    php artisan db:seed
    ```

8. Link de storage (nodig voor het weergeven van afbeeldingen):
    ```
    php artisan storage:link
    ```

9. Start de server:
    ```
    php artisan serve
    ```

Gemaakt door Thomas Van de Velde.