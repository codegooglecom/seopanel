## Steps to Upgrade Seo Panel ##


**Note:**  Before upgrade please take the **backup** of your current seo panel **database and code**.

1. Change the current seo panel directory name or move it to another place, e.g **seopanel to seopanel\_bak**

2. [Download](http://www.seopanel.in/download/) and Unzip the package.

3. Upload all the files contained in this folder (retaining the directory structure) to a web accessible directory on your server or hosting account.

4. Copy the contents of sample config file **config/sp-config-sample.php** to **config/sp-config.php** or remove **config /sp-config.php** and rename **config/sp-config-sample.php** to **config/sp-config.php**

5. Open up **config/sp-config.php** with a text editor like Notepad or similar editor.
Then modify the following sections with your server and database settings of previous version of seo panel.

```
# The web path or url to access seo panel through browser.
define('SP_WEBPATH', 'http://localhost/seopanel');

# DB settings - You can get this info from your web hosting provider.
# The name of the database for seo panel
define('DB_NAME', 'seopanel');

# DB database username
define('DB_USER', 'root');

# DB database password
define('DB_PASSWORD', '');

# DB hostname
define('DB_HOST', 'localhost');
```


6. Save the contents of file **config/sp-config.php**.

7. Change the permissions on the **tmp** directory to be writable by all (777 or -rwxrwxrwx within your FTP Client)

8. Using your web browser visit the location you placed Seo Panel with the addition of **install/upgrade.php**
> e.g. http://www.yourdomain.com/seopanel/install/upgrade.php

9. Follow the steps and fill out all the requested information.



**Note:**

a. Remove **install** directory of seo panel