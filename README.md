# FC Bayern Munchen Management App
![Static Badge](https://img.shields.io/badge/Main-Passing-blue?logo=github)
![Static Badge](https://img.shields.io/badge/Compose-Ready-blue?logo=docker)

<img src="./image.jpg" style="display:flex; justify-content: center; align-items: center;" height=400/ alt="Pinterest">  

## Contributors
<table>
    <tr>
        <td>Nadzare Kafah Alfatiha</td>
        <td>H1D023014</td>
        <td>nadzare.alfatiha@mhs.unsoed.ac.id</td><td>FrontEnd & UI/UX</td>
    </tr>
    <tr>
        <td>Putranto Surya Wijanarko</td>
        <td>H1D023048</td>
        <td>putranto.wijanarko@mhs.unsoed.ac.id</td><td>BackEnd</td>
    </tr>
</table>

## Requirements
- PHP (8.1.10)
- MySQL (8.0.30)
- Composer (Only for autoload)
- Apache
> This can be done using laragon as per v.6.0-220916

## What's in this?
- [x] Transfer Simulation (Transfer)
- [ ] Current Formation (Team)
- [x] Current Player and Manager (Team)
- [x] Leaderboards (Home)

## How To Run
Clone this repository
```bash
git clone https://github.com/Samestora/responsi-BM-7.git
cd responsi-BM-7
```

Rename the environment variable and edit it as much as you like
```bash
mv example.env .env
```
Make sure that `composer` and `php executable` are installed, then
```bash
cd Public
composer dump-autoload
php -S localhost:8000
```
alternatively make your apache document root points out exactly to Public/ and then go to your localhost and specified port

## Development
### FrontEnd :
- Views/ (The directory for html stuffs)
- Views/* (Instead of about.php, it's about/index.php)
- Public/Assets (CSS, JS, IMG, etc)
- Public/ (Host there)
- Shortcodes/ (Reusable component)

### BackEnd :
- Migrate/ (DB structure and data)
- Models/ (DB retrieved and sent data format)
- Db/ (DB PDO Connection)