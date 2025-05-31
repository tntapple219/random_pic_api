# Random Image API 📸✨

This project provides two simple PHP APIs for fetching random images:

1.  **Local Random Image API:** Selects a random image from a local directory on your server.

2.  **Online Random Image API:** Reads a list of external image URLs from a text file and redirects to a random one.

---

## Project Structure 📂

Your project structure is now organized into `local` and `online` subdirectories:

```

random_pic_api/
├── local/                  # Contains the local image API and its image directory
│   ├── local_random_image.php
│   └── images/             # Local images for local_random_image.php
│       ├── image1.jpg
│       ├── image2.png
│       └── ...
└── online/                 # Contains the online image API and its URL list
    ├── images.txt          # List of external image URLs for online_random_image.php
    └── online_random_image.php

```

## Installation and Setup 🛠️

### Prerequisites

* A web server environment (e.g., XAMPP, WAMP, MAMP, or any PHP-enabled server).

* PHP 5.4 or higher.

### Step 1: Web Server Configuration

You have two main options for setting up your web server:

#### Option A: Standard Web Server Setup (without Virtual Host)

This is the simplest way to get started, placing your project directly into the web server's default document root.

1.  **Place Project Files:**
    Copy your entire `random_pic_api` folder (containing `local/` and `online/` subdirectories) directly into your web server's document root.
    * **For XAMPP:** Copy `random_pic_api` to `C:/xampp/htdocs/`.
    * **For WAMP/MAMP:** Copy to their respective `www` or `htdocs` folders.

2.  **Ensure Apache is Running:**
    In your XAMPP Control Panel (or equivalent), make sure the Apache module is running (Status should be green). If not, click `Start`.

#### Option B: Apache Virtual Host Setup (Recommended for Development)

This method allows you to keep your project files outside the default `htdocs` directory and access them via a custom domain (e.g., `randompic.localhost`).

1.  **Open `httpd-vhosts.conf`:**
    In the XAMPP Control Panel, click the `Config` button next to Apache, then select `httpd-vhosts.conf`. (If not directly listed, click the `Explorer` button next to Apache, then navigate to `apache/conf/extra/httpd-vhosts.conf`).

2.  **Add Virtual Host Configuration (Replace `C:/Users/tntap/OneDrive/文件/Git/random_pic_api` with your actual project root path):**
    Append the following to the end of the file:

    ```apache
    <VirtualHost *:80>
        DocumentRoot "C:/xampp/htdocs"
        ServerName localhost
    </VirtualHost>

    <VirtualHost *:80>
        DocumentRoot "C:/Users/tntap/OneDrive/文件/Git/random_pic_api"
        ServerName randompic.localhost
        <Directory "C:/Users/tntap/OneDrive/文件/Git/random_pic_api">
            Require all granted
            AllowOverride All
        </Directory>
    </VirtualHost>
    ```

3.  **Enable Virtual Host Inclusion:**
    Open `httpd.conf` (also via the Apache `Config` menu).
    Find and uncomment the line:

    ```apache
    #Include conf/extra/httpd-vhosts.conf
    ```

    Change it to:

    ```apache
    Include conf/extra/httpd-vhosts.conf
    ```

4.  **Modify Windows `hosts` file:**

    * Open Notepad **as an Administrator**.

    * Open the file `C:\Windows\System32\drivers\etc\hosts` (select "All Files" in the file type dropdown).

    * Add the following line at the bottom:

        ```
        127.0.0.1       randompic.localhost
        ```

    * Save the file.

5.  **Restart Apache Server:**
    In the XAMPP Control Panel, click `Stop` then `Start` for the Apache module.

### Step 2: Prepare Image Files/URLs

* **For Local Images (`local/images/`):**
    Place your `.jpg`, `.jpeg`, `.png`, `.gif`, `.webp` image files inside the `random_pic_api/local/images/` directory.

* **For External Image URLs (`online/images.txt`):**
    Open the `random_pic_api/online/images.txt` file. Each line should contain a complete external image URL. For example:

    ```
    [https://images.unsplash.com/photo-1549880338-65ddcdfd017b?w=800&h=600&fit=crop](https://images.unsplash.com/photo-1549880338-65ddcdfd017b?w=800&h=600&fit=crop)
    [https://cdn.pixabay.com/photo/2020/03/10/09/20/mountain-4919532_1280.jpg](https://cdn.pixabay.com/photo/2020/03/10/09/20/mountain-4919532_1280.jpg)
    [https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/800px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg](https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/800px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg)
    ```

    **Note:** Ensure these URLs are publicly accessible.

## How to Use the APIs 🚀

### 1. Local Random Image API

This API directly outputs a randomly selected image from the `local/images/` directory.

* **URL (Virtual Host Setup):** `http://randompic.localhost/local/local_random_image.php`
* **URL (Standard Setup):** `http://localhost/random_pic_api/local/local_random_image.php`

### 2. Online Random Image API

This API reads image URLs from `online/images.txt`, randomly selects one, and redirects the browser to that URL.

* **URL (Virtual Host Setup):** `http://randompic.localhost/online/online_random_image.php`
* **URL (Standard Setup):** `http://localhost/random_pic_api/online/online_random_image.php`

### Returning JSON Format (Optional)

If you prefer the API to return the image URL in JSON format (instead of directly displaying the image or redirecting), you can uncomment/modify the relevant lines in both `local_random_image.php` and `online_random_image.php`:

```php
// Replace (or add as an alternative)
// header('Location: ' . $randomImageUrl);
// exit();

// With:
header('Content-Type: application/json');
echo json_encode(['imageUrl' => $randomImageUrl]);
````

## Error Handling ⚠️

  * If image files or the image list file are not found, the API will return a 404 or 500 error with a JSON-formatted error message.

  * Ensure your file paths are correct and that the web server has read permissions for the directories and files.

## Contribution and Suggestions 🤝

Any suggestions or contributions to this project are welcome\! Feel free to open an Issue or submit a Pull Request.

## License 📄

This project is licensed under the MIT License. See the [LICENSE](https://www.google.com/search?q=LICENSE) file for details (if applicable).

