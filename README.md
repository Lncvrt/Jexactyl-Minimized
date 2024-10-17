# Jexactyl Minimized

Jexactyl, but for private & friend use.

## Installation

> **Caution**
> You MUST be using **Jexacyl v3.7.3**, to check, go to your Jexactyl panel and click the settings icon, it will display what verison you are on.

You can install the mod by doing these commands:
```
cd /var/www/jexactyl
rm -rf ./resources
curl -Lo panel.tar.gz https://github.com/Lncvrt/Jexactyl-Minimized/releases/latest/download/panel.tar.gz
tar -xzvf panel.tar.gz
yarn
yarn build:production
```
...and that's it! you've installed the minimized version of Jexacyl.