#!/bin/sh

set -e

echo 'Installing deps'
cd public
rm -rf assets
rm -f index.html
cd ../interescuelas
rm -r node_modules/
npm install

echo 'Watching changes'
npm run build
