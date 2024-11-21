<img src="./image.jpg" style="display:flex; justify-content: center;" />  

# Fully native web app!

## Contributors
<table>
    <tr>
        <td>Putranto Surya Wijanarko</td>
        <td>H1D023048</td>
        <td>putranto.wijanarko@mhs.unsoed.ac.id</td>
    </tr>
    <tr>
        <td>Nadzare Kafah Alfatiha</td>
        <td>H1D023014</td>
        <td>nadzare.alfatiha@mhs.unsoed.ac.id</td>
    </tr>
</table>

## Requirements
- PHP (8.1.10)
- MySQL (8.0.30)
- Apache (2.4.54)
- Composer
> This can be done using laragon as per v.6.0-220916

## What's in this?
[ ] Transfer Simulation  
[ ] Current Formation  
[ ] Current Player and Manager  
[ ] Leaderboards  
[ ] Merchandise  

## How To Run
Make sure that `composer` and `php executable` are installed, then :  
```bash
cd Public
composer dump-autoload
php -S localhost:8000
```

## Development
FrontEnd :
- Views/ (The directory for html stuffs)
- Views/* (Instead of about.php, it's about/index.php)
- Public/Assets (CSS, JS, IMG, etc)
- Public/ (Host there)

BackEnd :
- The rest