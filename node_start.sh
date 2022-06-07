#!/bin/sh

set -e

echo 'Installing deps'
cd public
rm -rf assets
rm -f index.html
cd ../interescuelas
npm install

echo 'Watching changes'
npm run build
