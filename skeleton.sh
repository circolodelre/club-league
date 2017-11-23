#!/bin/bash

## Settings
ARTEFACT_REPO=https://github.com/circolodelre/club-league
SKELETON_REPO=https://github.com/javanile/slim-skeleton

## Initializations
git config credential.helper "cache --timeout=3600"

## Update artefact before sync skeleton
git remote set-url origin $ARTEFACT_REPO
git pull
git add .
git add *
git commit -m "Update artefact"
git push
mv .gitignore .gitignore.artefact

## Update skeleton
git remote set-url origin $SKELETON_REPO
cp .gitignore.skeleton .gitignore
git pull
git add .
git add *
git rm .idea/ -r --cached
git rm producer --cached
git commit -m "Update skeleton"
git push
rm .gitignore

## Refresh artefact after skeleton sync
mv .gitignore.artefact .gitignore
git remote set-url origin $ARTEFACT_REPO
git pull
git add .
git add *
git rm producer --cached
git rm skeleton.sh --cached
git rm .gitignore.skeleton --cached
git commit -m "Refresh artefact"
git push