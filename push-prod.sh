#!/bin/bash

cd ~/development/web/veloce

if [ ! -d "./dist" ]; then
  echo "Please generate dist/ folder by running grunt."
  exit
fi

rm -f dist.zip
zip -r dist.zip dist/
scp -i ~/.ssh/id_fsae dist.zip motorsports@webhost.engr.illinois.edu:~/public_html/
rm -f dist.zip

ssh -i ~/.ssh/id_fsae motorsports@webhost.engr.illinois.edu << 'EOF'

  cd ~/public_html/
  rm -rf *.php all.min.js style.css font/ img/ cgi-bin/

  unzip dist.zip
  rm -f dist.zip
  mv dist/* .
  rm -rf dist/
  chmod g-w *.php

  exit

EOF
