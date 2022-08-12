#!/bin/sh
set -e
 
vendor/bin/phpunit
 
(git push) || true
 
git checkout main
git merge CICD_implemantation
 
git push origin production
 
git checkout CICD_implemantation