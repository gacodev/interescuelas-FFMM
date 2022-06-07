#!/bin/sh

set -e

echo 'Installing deps'
npm install

echo 'Watching changes'
npm run watch
