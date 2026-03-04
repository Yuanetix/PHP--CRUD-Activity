

## Database Setup

1. Create database in MySQL

```
CREATE DATABASE php_music_app;
```

2. Verify

```
SHOW DATABASES;
```

You should see:
`php_music_app`

3. Use the database

```
USE php_music_app;
```

4. Create `songs` table

```
CREATE TABLE songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    is_listened BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
);
```

Now, database is ready.
