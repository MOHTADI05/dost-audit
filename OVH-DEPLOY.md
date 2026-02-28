# Deploy dost-audit to OVH (GitHub + SSH)

You're connected via SSH as `dostaux@ssh02.cluster100.gra.hosting.ovh.net`. Your web root is **`~/www`** (`/homez.2186/dostaux/www`).

---

## Deploy as static HTML/CSS/JS (no WordPress)

Use this if you want the site to run as a simple static site (index.html + styles.css + script.js + images).

### One-time deploy from GitHub

Run these commands in your SSH session:

```bash
# 1. Go to your home
cd ~

# 2. Clone the repo into a temp folder
git clone --depth 1 https://github.com/MOHTADI05/dost-audit.git dost-audit-temp

# 3. Copy static files into your web root
cp dost-audit-temp/index.html dost-audit-temp/styles.css dost-audit-temp/script.js ~/www/

# 4. Copy images folder (if it exists in the repo)
cp -r dost-audit-temp/images ~/www/ 2>/dev/null || true

# 5. Remove the temp clone
rm -rf dost-audit-temp
```

**Important:** Your `index.html` references an `images/` folder (logo.png, team photos, etc.). If that folder is **not** in your GitHub repo yet, add it locally and push:

```bash
# On your PC, in the project folder:
git add images
git commit -m "Add images for static site"
git push origin main
```

Then run the deploy steps above again on the server. If you prefer not to put images in Git, upload the `images` folder via FTP to `~/www/images/` (or create it and upload the files).

### Update the static site after changes

If you want to update from Git later without keeping a full clone in `~/www`:

```bash
cd ~
rm -rf dost-audit-temp 2>/dev/null
git clone --depth 1 https://github.com/MOHTADI05/dost-audit.git dost-audit-temp
cp dost-audit-temp/index.html dost-audit-temp/styles.css dost-audit-temp/script.js ~/www/
cp -r dost-audit-temp/images ~/www/ 2>/dev/null || true
rm -rf dost-audit-temp
```

Or keep a clone and pull (see “Update after first deploy” below, using `~/www` as the deploy path).

---

## 1. Find your web root on OVH

On OVH shared/pro hosting there is no `/www`. Run these in your SSH session:

```bash
# See where you are and what's in your home
pwd
ls -la
```

Typical OVH paths (try in order):

- **Performance/Pro hosting:** `~/web` or `~/www` or a folder with your domain name
- **Classic hosting:** sometimes `~/domains/yourdomain.com/public_html`

```bash
# Try (replace yourdomain.com with your real domain if needed)
cd ~/web
# or
cd ~/www
# or list to see folder names
ls -la ~
```

Use the folder that contains your site (e.g. `index.php`, `wp-config.php` for WordPress). That folder is your **web root**.

---

## 2. Deploy the WordPress theme only (recommended)

If you already have WordPress installed on OVH and only want to deploy the **dost-audit theme**:

1. Go to the themes directory on the server (from your home):

   ```bash
   cd ~/web/wp-content/themes
   # or: cd ~/www/wp-content/themes  (if your root is ~/www)
   ```

2. Clone your repo and copy the theme folder:

   ```bash
   git clone --depth 1 https://github.com/MOHTADI05/dost-audit.git dost-audit-temp
   cp -r dost-audit-temp/wordpress-theme ./dost-audit
   rm -rf dost-audit-temp
   ```

3. In WordPress admin: **Appearance → Themes** and activate **dost-audit**.

---

## 3. Deploy the whole site (full WordPress from repo)

If your repo is meant to be the whole site (not just the theme), clone into the web root:

```bash
cd ~/web   # or your real web root from step 1
git clone https://github.com/MOHTADI05/dost-audit.git .
```

Then configure `wp-config.php` (database, etc.) for OVH (see OVH control panel for DB credentials).

---

## 4. Update after first deploy (GitHub → OVH)

When you push to GitHub and want to update the server:

**If you deployed the theme to `~/web/wp-content/themes/dost-audit`:**

```bash
cd ~/web/wp-content/themes/dost-audit
git pull origin main
```

**If you deployed the full repo in the web root:**

```bash
cd ~/web
git pull origin main
```

---

## 5. If you get "Permission denied" or "Not a git repository"

- Make sure you're in the folder you cloned (e.g. `~/web` or `~/web/wp-content/themes/dost-audit`).
- If the site was first uploaded by FTP, there may be no git repo; in that case clone once (as in step 2 or 3) and use `git pull` from that folder next time.

---

## Quick reference

| Goal                     | Where to go on server              | Command |
|--------------------------|------------------------------------|--------|
| **Static HTML/CSS/JS**   | `~/www`                            | Clone repo to temp, copy `index.html`, `styles.css`, `script.js`, `images/` into `~/www` |
| Find web root            | Home                               | `pwd` then `ls -la ~` |
| Deploy theme only        | `~/web/wp-content/themes` (or ~/www/...) | Clone repo, copy `wordpress-theme` → `dost-audit` |
| Update after push        | Same folder as deploy              | `git pull origin main` or re-run static copy commands |

Replace `MOHTADI05/dost-audit` with your real GitHub repo if different.
